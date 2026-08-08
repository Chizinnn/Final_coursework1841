<?php
session_start();

include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT * FROM users WHERE user_email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['user_password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            
            header("Location: posts.php");
            exit;
        } else {
            $output = "<p style='color:red;'>Something wrong, Try Again</p>";
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