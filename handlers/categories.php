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

// if (isset($_POST["ctg"])) {
    // $category = $_POST["ctg"];

    // $test = new 

    // echo $category;
    // if(!empty($_POST['ctg'])) {
    // $filters = json_decode($_POST['ctg'], true);
    // var_dump($filters);
    // unset($filters);
    // }
// }