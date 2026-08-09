<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: userlogin.php");
    exit;
}
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

try {
    $post = getPost($pdo, $_POST['id']);
    
    if ($post['user_id'] == $_SESSION['user_id']) {
        deletePost($pdo, $_POST['id']);
    } else {
        die("Access Denied: You cannot delete someone else's post!");
    }
    
    header('location: posts.php');
} catch (PDOException $e) {
    echo "Error deleting post: " . $e->getMessage();
}
?>