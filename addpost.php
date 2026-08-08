<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit;
}
if(isset($_POST['content'])){
    try{
        $image_path= '';

        if (isset($_FILES['image']) && $_FILES['image']['error']== 0){
            $filename=basename($_FILES['image']['name']);

            $targetFilePath = "images/" . $filename;
            if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)){
                $image_path = $filename;
            }
        }

        $user_id = $_SESSION['user_id'];
        insertPost($pdo, $_POST['title'], $_POST['content'], $image_path, $user_id, $_POST['module_id']);
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