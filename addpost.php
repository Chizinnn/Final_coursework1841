<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';
if(isset($_POST['content'])){
    try{
        insertPost($pdo, $_POST['title'], $_POST['content'], $_POST['image_path'], 1, 1);
        header('location: posts.php');
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    $title = 'Add a new post';
    ob_start();
    include 'templates/addposts.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';