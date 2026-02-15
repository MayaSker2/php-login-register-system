<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'users_db';
    $conn = new mysqli($host, $user, $password, $database);
    
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }
?>