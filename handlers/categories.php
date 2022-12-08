<?php
require_once './handlers/database.php';

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