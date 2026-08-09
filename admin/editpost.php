<?php
require_once "login/check.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try {
    if (isset($_POST['content'])) {
        $image_path = $_POST['old_image_path']; 
        
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == UPLOAD_ERR_OK) {
            $upload_dir = '../images/';
            $image_name = time() . '_' . basename($_FILES['image_file']['name']);
            if (move_uploaded_file($_FILES['image_file']['tmp_name'], $upload_dir . $image_name)) {
                $image_path = $image_name;
            }
        }

        updatePost($pdo, $_POST['postid'], $_POST['title'], $_POST['content'], $image_path, $_POST['user_id'], $_POST['module_id']);
        header('location: posts.php');
        exit;
    } else {
        $post = getPost($pdo, $_GET['id']);
        $users= allUsers($pdo);
        $modules = allModules($pdo);
        $title = 'Edit Post';
        $isAdmin = true;
        ob_start();
        include '../templates/editpost.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Error editing post: ' . $e->getMessage();
}
include '../templates/adminlayout.html.php';
?>