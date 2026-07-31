<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    deleteUser($pdo, $_POST['id']);
    
    header('location: users.php');
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>