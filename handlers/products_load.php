<?php


function LoadProductsPaged($category) {
    require_once 'database.php';

    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $total_records_per_page = 10;
    $offset = ($page_no - 1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    $result_count = $connection->prepare("SELECT COUNT(*) AS total_records FROM `products` WHERE `category` = '$category'");
    $result_count->execute();
    $total_records = $result_count->fetchAll();
    foreach ($total_records as $record_count) { 
        $total_records = $record_count['total_records'];
    }
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total pages minus 1
    // END OF PAGINATION

    $statement = $connection->prepare("SELECT * FROM products LIMIT $offset, $total_records_per_page WHERE `category` = '$category'");
    $statement->execute();
    $result = $statement->fetchAll();
    // CIA TURI EITI RESULT FOREACH
    // -> 
    // END
}