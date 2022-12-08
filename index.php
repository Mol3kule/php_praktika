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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
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
            <!-- Prekių katalogas -->
            <?php include './products.functions.php';
            require_once './handlers/products_load.php';
            require_once './handlers/categories.php';
            $ProductObj = new LoadProducts();
            $ProductObj->Load("Shoes");

            $filters = [];
            $Categories = new Categories();
            $Categories->Load();
                   
            $ids = [];
            foreach($ProductObj->paginationResult as $result) {
                $ids[] .= $result['id'];
            }
            $testIds = ["test" => $ids];

            foreach($Categories->result as $category) {
                array_push($filters, $category);
            }?>
            <form id="category-list" action="" method="POST">
                <?php foreach($filters as $filter) {?>
                    <input type="submit" name="ctg" class="category" onclick="LoadProducts();" value='<?php echo $filter["category"];?>'>
                <?php }?>
            </form>

            <div id="product-list">
                <!-- GENERATE PRODUCTS -->
                <script>
                    function LoadProducts() {
                        $.ajax({
                            url: 'ajax/getProductList.ajax.php',
                            type: "GET",
                            dataType: "json",
                            data: <?php echo json_encode($testIds); ?>
                        }).always(function(callback){
                            $("#product-list").append(callback.html);
                        });
                    }
                </script>
            </div>
            <?php
                require_once './handlers/pagination.php';
                $Pagination = new Pagination();
                $Pagination->Load($ProductObj);
            ?>
        </div>
    </div>
</body>
</html>