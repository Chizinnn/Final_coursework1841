<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if (isset($_POST['submit'])) {
        insertUser($pdo, $_POST['username'], $_POST['email']);
        
        header('location: users.php');
        exit;
    } else {
        $title = 'Add a new User';
        $isAdmin = true;

        ob_start();
        include '../templates/adduser.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>