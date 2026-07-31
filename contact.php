<?php
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    if (isset($_POST['message'])) {
        $title = "Contact Us";
        
        insertContact($pdo, $_POST['name'], $_POST['email'], $_POST['message']);
        
        $message = $_POST['message'];
       
        $output = "Thanks for asking! Please wait.";
        
    } else {
        $title = "Contact Us";
        ob_start();
        include 'templates/mailform.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>