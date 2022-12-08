<?php
// var_dump($_GET);

$html = '';

$html .= '<div class="product">';
$html .= '<img class="productImg" src="<?php //echo $row["imageSrc"]; ?>" alt="Not Loaded">';
$html .= '<div class="product-name"><?php //echo $row["product_name"]; ?></div>';
$html .= '<div class="product-quantity"><span style="color: red;">Sandelyje:</span> <?php //echo $row["quantity"]; ?></div>';
$html .= '</div>';

echo json_encode(['html'=>$html]);