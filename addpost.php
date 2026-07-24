<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';
if(isset($_POST['content'])){
    try{
        $user_email = $_POST['user_email'] ?? '';
        $user_id = getorcreateuser($pdo, $_POST['username'], $user_email);
        insertPost($pdo, $_POST['title'], $_POST['content'], $_POST['image_path'], $user_id, $_POST['module_id']);
        header('location: posts.php');
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    $title = 'Add a new post';
    $modules = allModules($pdo);
    ob_start();
    include 'templates/addposts.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';