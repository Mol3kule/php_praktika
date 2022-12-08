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
    global $gList;
    print_r($gList);
    // print_r($GLOBALS["gList"]);
}