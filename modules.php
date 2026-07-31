<?php
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    $modules = allModules($pdo);
    $title = 'Available Modules';

    ob_start();
    include 'templates/usermodules.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>