<?php
include '../handlers/database.php';

$db = new Database();
$db->Open();

$id = $_GET['id'];
$title = $_GET['title'];
$imgUrl = $_GET['imgUrl'];
$category = $_GET['category'];
$description = $_GET['description'];

$query = $db->connection->prepare("UPDATE `products` SET `product_name` = '$title', `imageSrc` = '$imgUrl', `category` = '$category', `description` = '$description' WHERE `id` = '$id'");
$query->execute();
$db->Close();
echo json_encode([]);