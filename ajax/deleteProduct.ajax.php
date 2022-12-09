<?php
include '../handlers/database.php';

$db = new Database();
$db->Open();

// $ownerId = $_COOKIE['UId'];
$id = $_GET['id'];
$title = $_GET['product_name'];
$imgUrl = $_GET['imageSrc'];
$category = $_GET['category'];
$description = $_GET['description'];

$query = $db->connection->prepare("DELETE FROM `products` WHERE `id` = '$id'");
$query->execute();
$db->Close();
header("location: ../components/myProducts");
echo json_encode([]);