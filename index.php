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
    <div class="container">
        <!-- TOP NAVIGATION BAR -->
        <div class="top-nav-ct">
            <ul class="top-nav">
                <?php
                    if (!isset($_COOKIE['UId'])) {
                ?>
                    <a class="nav-bar register" href="components/registration.php">Registruotis</a>
                    <a class="nav-bar login" href="components/login.php">Prisijungti</a>
                <?php } else {?>
                    <a class="nav-bar logout" href="components/logout.php">Atsijungti</a>
                <?php }?>
            </ul>
        </div>
        <hr>
        <div class="products-ct">
            Prekių katalogas
            <?php
            // require_once './GlobalsList.php';
            require_once './handlers/products_load.php';
            require_once './handlers/categories.php';

            $Categories = new Categories();
            $Categories->Load(); ?>
            <form id="category-list" action="" method="POST">
                <?php foreach($Categories->result as $row) { ?>
                    <input type="submit" name="ctg" class="category" value='<?php echo $row["category"]; ?>'>
                <?php } ?>
            </form>
            <div id="product-list">
                <!-- GENERATE PRODUCTS -->
                <?php
                $ProductObj = new LoadProducts();
                $ProductObj->Load("Shoes");

                include './GlobalsList.php';
                global $gList;
                $gList["ProductObj"] = $ProductObj;


                // print_r($gList["ProductObj"]);
                foreach ($ProductObj->paginationResult as $row) {?>
                    <div class="product">
                        <img class="productImg" src="<?php echo $row["imageSrc"]; ?>" alt="Not Loaded">
                        <div class="product-name"><?php echo $row["product_name"]; ?></div>
                        <div class="product-quantity"><span style="color: red;">Sandelyje:</span> <?php echo $row["quantity"]; ?></div>
                    </div>
                <?php } ?>
            </div>
            <?php
                require_once './handlers/pagination.php';
                $Pagination = new Pagination();
                $Pagination->Load($ProductObj)
            ?>
        </div>
    </div>
</body>

</html>