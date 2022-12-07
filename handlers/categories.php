<?php
require './handlers/database.php';

class Categories {
    public $result;
    function Load() {
        $db = new Database();
        $db->Open();

        $query = $db->connection->prepare("SELECT * FROM `categories`");
        $query->execute();
        $this->result = $query->fetchAll();

        $db->Close();
    }
}

if (isset($_POST["category"])) {
    // echo $_POST["category"];
}