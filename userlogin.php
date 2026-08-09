<?php
session_start();

include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $user = getUserByEmail($pdo, $email);
        if ($user && password_verify($password, $user['user_password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            
            header("Location: posts.php");
            exit;
        } else {
            $output = "Something wrong, Try Again";
        }
    } catch (PDOException $e) {
        $output = "Error database: " . $e->getMessage();
    }
} else {
    $title = "Student Login";
}
ob_start();
if(isset($output)) echo $output; 
    include 'templates/userlogin.html.php';
    $output = ob_get_clean();

include 'templates/layout.html.php';
?>