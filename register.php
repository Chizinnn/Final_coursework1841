<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        register($pdo, $username, $email, $hashed_password);
        
        header("Location: userlogin.php");
        exit;
    } catch (PDOException $e) {
        $output = "Registration error: " . $e->getMessage();
    }
} else {
    $title = "Register Account";
}

if (!isset($output)) {
    ob_start();
    include 'templates/register.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';
?>