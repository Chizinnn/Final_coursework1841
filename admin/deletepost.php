<?php
require_once 'login/check.php';
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';
    deletePost($pdo, $_POST['id']);
    header('location: posts.php');
}catch(PDOException $e){
    $title = 'An error has occured';
    $output = 'Unable to delete post: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
