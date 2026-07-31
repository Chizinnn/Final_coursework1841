<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    deleteModule($pdo, $_POST['id']);
    
    header('location: modules.php');
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>