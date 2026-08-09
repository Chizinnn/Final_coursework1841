<?php
require_once 'login/check.php';
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';
    deletePost($pdo, $_POST['id']);
    header('location: posts.php');
}catch(PDOException $e){
    $title = 'An error has occured';
    $output = 'Unable to Delete Post: ' . $e->getMessage();
}
include '../templates/adminlayout.html.php';
