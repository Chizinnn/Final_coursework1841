<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: userlogin.php");
    exit;
}

include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

try {
    if (isset($_POST['content'])) {
        $post = getPost($pdo, $_POST['postid']);
        if ($post['user_id'] != $_SESSION['user_id']) die("Access Denied: You cannot edit someone else's post!");

        $image_path = $_POST['old_image_path']; 
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == UPLOAD_ERR_OK) {
            $upload_dir = 'images/';
            $image_name = time() . '_' . basename($_FILES['image_file']['name']);
            if (move_uploaded_file($_FILES['image_file']['tmp_name'], $upload_dir . $image_name)) {
                $image_path = $image_name;
            }
        }
        updatePost($pdo, $_POST['postid'], $_POST['title'], $_POST['content'], $image_path, $_SESSION['user_id'], $_POST['module_id']);
        header('location: posts.php');
        exit;
    } else {
        $post = getPost($pdo, $_GET['id']);
        if ($post['user_id'] != $_SESSION['user_id']) die("Access Denied: You cannot edit someone else's post!");

        $modules = allModules($pdo);
        $title = 'Edit My Post';
        ob_start();
        include 'templates/usereditpost.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error editing post: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>