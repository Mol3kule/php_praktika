<?php

require '../handlers/database.php';
// var_dump($_GET['test']);


if (isset($_POST["ctg"])) {
    $category = $_POST["ctg"];
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

    // print_r($results);
}

$html = '';
foreach($results as $row) {
    $html .= '<div class="product">';
    $html .= '<img class="productImg" src="<?php echo $row["imageSrc"]; ?>" alt="Not Loaded">';
    $html .= '<div class="product-name"><?php echo $row["product_name"]; ?></div>';
    $html .= '<div class="product-quantity"><span style="color: red;">Sandelyje:</span> <?php echo $row["quantity"]; ?></div>';
    $html .= '</div>';
}

echo json_encode(['html' => $html]);