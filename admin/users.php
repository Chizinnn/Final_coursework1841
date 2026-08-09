<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';
    $users = allUsers($pdo);

    $title = 'Manage Users';
    $isAdmin = true;

    ob_start();
    include '../templates/users.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/adminlayout.html.php';
?>