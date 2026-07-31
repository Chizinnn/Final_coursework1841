<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    deleteContact($pdo, $_POST['id']);
    
    header('location: contacts.php');
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>