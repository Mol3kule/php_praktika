<?php

require '../handlers/database.php';

// require_once './handlers/pagination.php';
// $Pagination = new Pagination();
// $Pagination->Load($_GET["ProductObj"]);

$db = new Database();
$db->Open();

$category = $_GET["category"];
$query = $db->connection->prepare("SELECT * FROM `products` WHERE `category` = '$category' LIMIT 10"); // prideti OFF
$query->execute();
$result = $query->fetchAll();
$html = "";
foreach($result as $row) {
    $html .= "
    <div class='product'>
        <img class='productImg' src={$row['imageSrc']} alt='Not Loaded'>
        <div class='product-name'>{$row['product_name']}</div>
        <div class='product-quantity'><span style='color: red;'>Sandelyje:</span> {$row['quantity']} </div>
    </div>";
}

$Pagination = "";
if (isset($_GET['page_no']) && $_GET['page_no'] != '') {
    $page_no = $_GET['page_no'];
} else {
   $page_no = 1;
}

if ($page_no <= 1) {
    $Pagination .= "<li class='disabled'> </li>";
} if ($page_no > 1) {
    $Pagination .= "<li> <a href='?page_no=$ProductObj->previous_page'>&#8249&#8249 Atgal </a> </li>";
}


$Pagination .= "";


echo json_encode(['products' => $html, 'pagination' => $Pagination]);
