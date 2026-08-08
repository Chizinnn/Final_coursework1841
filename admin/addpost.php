<?php
require_once "login/check.php";
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if(isset($_POST['content'])){
        $image_path= '';
        if(isset($_FILES['image']) && $_FILES['image']['error'] ==0){
            $filename = basename($_FILES['image']['name']);
            $targetfilepath = "../images/" .$filename;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetfilepath)){
                $image_path = $filename;
            }
        }
        insertPost($pdo, $_POST['title'], $_POST['content'], $image_path, $_POST['user_id'], $_POST['module_id']);
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