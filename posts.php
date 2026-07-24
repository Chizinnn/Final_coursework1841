<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    $posts = allPosts($pdo);
    $title = 'Post list';
    $totalPosts = totalPosts($pdo);

    ob_start();
    include 'templates/posts.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database Error:' . $e->getMessage();
}
include 'templates/layout.html.php';