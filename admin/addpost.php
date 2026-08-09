<?php
require_once "login/check.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';

try {
    if (isset($_POST['content'])) {
        $image_path = '';
        
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == UPLOAD_ERR_OK) {
            $upload_dir = '../images/';
            $image_name = time() . '_' . basename($_FILES['image_file']['name']);
            if (move_uploaded_file($_FILES['image_file']['tmp_name'], $upload_dir . $image_name)) {
                $image_path = $image_name;
            }
        }
        
        insertPost($pdo, $_POST['title'], $_POST['content'], $image_path, $_POST['user_id'], $_POST['module_id']);
        header('location: posts.php');
        exit;
    } else {
        $users = allUsers($pdo);
        $modules = allModules($pdo);
        $title = 'Add a new Post';
        $isAdmin = true;
        
        ob_start();
        include '../templates/addpostadmin.html.php'; 
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Error adding post: ' . $e->getMessage();
}
include '../templates/adminlayout.html.php';
?>