<?php
require_once "login/check.php";
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if(isset($_POST['content'])){
        insertPost($pdo, $_POST['title'], $_POST['content'], $_POST['image_path'], $_POST['user_id'], $_POST['module_id']);
        header('location: posts.php');
        exit;
    } else {
        $users = allUsers($pdo);
        $modules = allModules($pdo);

        $title = 'Add a new Post';
        ob_start();
        include '../templates/addpostadmin.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>