<?php
include '../handlers/database.php';

$db = new Database();
$db->Open();

$ownerId = $_COOKIE['UId'];
$title = $_GET['product_name'];
$imgUrl = $_GET['imageSrc'];
$category = $_GET['category'];
$description = $_GET['description'];

$query = $db->connection->prepare("INSERT INTO `products` SET `ownerId` = '$ownerId', `product_name` = '$title', `imageSrc` = '$imgUrl', `category` = '$category', `description` = '$description'");
$query->execute();
$db->Close();
header("location: ../components/myProducts");
echo json_encode([]);