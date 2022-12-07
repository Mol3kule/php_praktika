<?php
    class Database {
        public $connection;

        function Open() {
            try {
                if ($this->connection) return;
                $this->connection = new PDO("mysql:host=localhost;dbname=php_job", "root", "");
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        function Close() {
            try {
                if (!$this->connection) return;
                $this->connection = null;
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    }
?> 