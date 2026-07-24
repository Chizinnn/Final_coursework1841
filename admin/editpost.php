<?php
require_once "login/check.php";
include '../includes/DatabaseConnection.php';
include '../includes/DatabaseFunctions.php';
try {
    if (isset($_POST['content'])) {
        updatePost($pdo, $_POST['postid'], $_POST['title'], $_POST['content'], $_POST['image_path']);
        header('location: posts.php');
    } else {
        $post = getPost($pdo, $_GET['id']);
        $title = 'Edit Post';
        ob_start();
        include '../templates/editpost.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Error editing post: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
