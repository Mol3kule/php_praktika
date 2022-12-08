<?php
require_once './handlers/database.php';
// require_once './GlobalsList.php';
include './GlobalsList.php';

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

if (isset($_POST["ctg"])) {
    $category = $_POST["ctg"];
    if(!empty($_POST['filter'])) {
    $filters = json_decode($_POST['filter'], true);
    var_dump($filters);
    unset($filters);
    }
}