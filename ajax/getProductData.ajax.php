<?php

require '../handlers/database.php';

$db = new Database();
$db->Open();


$id = $_GET['id'];
$query = $db->connection->prepare("SELECT * FROM `products` WHERE `id` = $id");
$query->execute();
$result = $query->fetchAll();

$db->Close();

echo json_encode(['ProductData' => $result]);