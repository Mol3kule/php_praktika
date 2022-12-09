<?php

require '../handlers/database.php';
// require '../handlers/products_load.php';

$db = new Database();
$db->Open();

$ProductObj = $_GET["ProductObj"];
$ProductObj = $ProductObj["ProductObj"];
$category = $_GET["category"];
if($category == "") {
    $query = $db->connection->prepare("SELECT * FROM `products` LIMIT {$ProductObj['offset']}, {$ProductObj['total_records_per_page']}"); // prideti OFF
} else {
    $query = $db->connection->prepare("SELECT * FROM `products` WHERE `category` = '$category' LIMIT {$ProductObj['offset']}, {$ProductObj['total_records_per_page']}"); // prideti OFF
}
$query->execute();
$result = $query->fetchAll();
$html = "";
foreach($result as $row) {
    $html .= "
    <div class='product'>
        <img class='productImg' src={$row['imageSrc']} alt='Not Loaded'>
        <div class='product-name'>{$row['product_name']}</div>
        <div class='product-quantity'><span style='color: red;'>Aprašymas:</span> {$row['description']} </div>
    </div>";
}

echo json_encode(['products' => $html]);
