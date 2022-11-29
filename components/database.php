<?php
    $connection = new PDO("mysql:host=localhost;dbname=php_job", "root", "");

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>