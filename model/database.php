<?php
    //if you get errors, modify the host part of this string.
    $dsn = 'mysql:host=localhost;dbname=carebase';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>