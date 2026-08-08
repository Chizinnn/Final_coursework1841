<?php
    if(session_status() === PHP_SESSION_NONE) { session_start(); }
    $pdo = new PDO('mysql:host=localhost; dbname=coursework_comp1841; charset=utf8mb4', 'root','');
