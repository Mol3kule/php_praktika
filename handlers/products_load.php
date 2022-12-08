<?php

class LoadProducts {
    public $total_records_per_page, $offset, $previous_page, $next_page, $adjacents, $result_count, $total_records, $total_no_of_pages, $second_last, $statement, $paginationResult;

    function Load($category) {
        $db = new Database();
        $db->Open();

        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }
        $this->total_records_per_page = 10;
        $this->offset = ($page_no - 1) * $this->total_records_per_page;
        $this->previous_page = $page_no - 1;
        $this->next_page = $page_no + 1;
        $this->adjacents = "2";

        if ($category == '') {
            $this->result_count = $db->connection->prepare("SELECT COUNT(*) AS total_records FROM `products`");
        } else {
            $this->result_count = $db->connection->prepare("SELECT COUNT(*) AS total_records FROM `products` WHERE `category` = '$category'");
        }
        $this->result_count->execute();
        $this->total_records = $this->result_count->fetchAll();
        foreach ($this->total_records as $record_count) { 
            $total_records = $record_count['total_records'];
        }
        $this->total_no_of_pages = ceil($total_records / $this->total_records_per_page);
        $this->second_last = $this->total_no_of_pages - 1; // total pages minus 1

        if ($category == '') {
            $this->statement = $db->connection->prepare("SELECT * FROM products LIMIT $this->offset, $this->total_records_per_page");
        } else {
            $this->statement = $db->connection->prepare("SELECT * FROM products WHERE `category` = '$category' LIMIT $this->offset, $this->total_records_per_page");
        }
        $this->statement->execute();
        $this->paginationResult = $this->statement->fetchAll();

        $db->Close();
    }
}