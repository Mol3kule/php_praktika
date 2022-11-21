<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sandeliukas</title>
</head>
<body>
    <?php
        $connection = new PDO("mysql:host=localhost;dbname=php_job", "root", "");

        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        ?>
        <div class="container">
        <!-- TOP NAVIGATION BAR -->
        <div class="top-nav-ct">
            <ul class="top-nav">
                <li class="nav-bar register">Registruotis</li>
                <li class="nav-bar login">Prisijungti</li>
            </ul>
        </div>
        <hr>
        <div class="products-ct">
            Prekių katalogas
            <div id="product-list"> 
                <!-- GENERATE PRODUCTS -->
                <?php
                    $statement = $connection->prepare("SELECT * FROM products");
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row) {
                ?>
                <div class="product">
                    <img class="productImg" src="<?php echo $row["imageSrc"]; ?>" alt="Not Loaded">
                    <div class="product-name"><?php echo $row["product_name"]; ?></div>
                    <div class="product-quantity"><span style="color: red;">Sandelyje:</span> <?php echo $row["quantity"]; ?></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>