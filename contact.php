<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: userlogin.php");
    exit;
}

try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    if (isset($_POST['message'])) {
        $title = "Contact Us";
        
        insertContact($pdo, $_SESSION['user_id'], $_POST['message']);
        
        $output = "<p style='color:#2bb673; font-weight:bold;'>Thanks for asking! We will contact you soon.</p>";
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