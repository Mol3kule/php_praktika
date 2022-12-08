<?php

require '../handlers/database.php';

// if (isset($_POST["ctg"])) {
    // $category = $_POST["ctg"];
    $db = new Database();
    $db->Open();

    $toFetchIds = $_GET['test'];

    $results = [];

    foreach($toFetchIds as $id) {
        $query = $db->connection->prepare("SELECT * FROM `products` WHERE `id` = $id");
        $query->execute();
        $result = $query->fetch();
        array_push($results, $result);
    }
    $html = '';
    foreach($results as $row) {
    
        $html .= "
        <div class='product'>
            <img class='productImg' src={$row['imageSrc']} alt='Not Loaded'>
            <div class='product-name'>{$row['product_name']}</div>
            <div class='product-quantity'><span style='color: red;'>Sandelyje:</span> {$row['quantity']} </div>
        </div>";
    }
    
    echo json_encode(['html' => $html]);
// }
