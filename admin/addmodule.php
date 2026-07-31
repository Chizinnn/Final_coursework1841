<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    if (isset($_POST['submit'])) {
        insertModule($pdo, $_POST['module_code'], $_POST['module_name']);
        header('location: modules.php');
        exit;
        
    } else {
        $title = 'Add a new Module';
        $isAdmin = true;

        ob_start();
        include '../templates/addmodule.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>

