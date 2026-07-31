<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if (isset($_POST['submit'])) {
        updateUser($pdo, $_POST['user_id'], $_POST['username'], $_POST['email']);
        
        header('location: users.php');
        exit;
    } else {
        $user = getUser($pdo, $_GET['id']);

        $title = 'Edit User';
        $isAdmin = true;

        ob_start();
        include '../templates/edituser.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>