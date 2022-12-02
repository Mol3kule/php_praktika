<?php
    try {
        $connection = new PDO("mysql:host=localhost;dbname=php_job", "root", "");
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
?> 