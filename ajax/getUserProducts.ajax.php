<?php
include '../handlers/database.php';

$db = new Database();
$db->Open();

$userId = $_COOKIE["UId"];

$query = $db->connection->prepare("SELECT * FROM `products` WHERE `ownerId` = $userId");
$query->execute();
$result = $query->fetchAll();

$html = "";
foreach($result as $row) {
    $html .= "
    <div class='product' data-id='{$row['id']}'>
        <img class='productImg' src={$row['imageSrc']} alt='Not Loaded'>
        <div class='product-name'>{$row['product_name']}</div>
        <div class='product-quantity'><span style='color: red;'>Aprašymas:</span> {$row['description']} </div>
    </div>";
}

$db->Close();

echo json_encode(['products' => $html]);