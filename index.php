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
                    <a class="nav-bar myProducts" href="components/myProducts.php">Mano Produktai</a>
                    <a class="nav-bar logout" href="components/logout.php">Atsijungti</a>
                <?php }?>
            </ul>
        </div>
        <hr>
        <div class="products-ct">
            Produktai
            <!-- Prekių katalogas -->
            <?php include './products.functions.php';
            require_once './handlers/products_load.php';
            require_once './handlers/categories.php';
            $ProductObj = new LoadProducts();
            $ProductObj->Load("Shoes");

            $filters = [];
            $Categories = new Categories();
            $Categories->Load();

            $TestObj = ['ProductObj' => $ProductObj];

            foreach($Categories->result as $category) {
                array_push($filters, $category);
            }?>
            <form id="category-list" action="" method="POST">
                <?php foreach($filters as $filter) {?>
                    <input type="button" name="ctg" class="category" value='<?php echo $filter["category"];?>'>
                <?php }?>
            </form>

            <div id="product-list">
                <!-- GENERATE PRODUCTS -->
                <script>
                    let autoLoaded = false;
                    if (!autoLoaded) {
                        $.ajax({
                            url: 'ajax/getProductList.ajax.php',
                            type: "GET",
                            dataType: "json",
                            // data: <php echo json_encode($testIds); ?>
                            data: {"category": "", "ProductObj": <?php echo json_encode($TestObj); ?>}
                        }).always(function(callback){
                            $("#product-list").html(callback.products);
                        });

                        $.ajax({
                            url: 'ajax/getProductPages.ajax.php',
                            type: 'GET',
                            dataType: 'JSON',
                            data: {"ProductObj": <?php echo json_encode($TestObj); ?>}
                        }).always(function(cb) {
                            $("#pagination-tab").html(cb.pagination);
                        });
                        autoLoaded = true;
                    }
                    $('.category').on('click', function(element) {
                        $.ajax({
                            url: 'ajax/getProductList.ajax.php',
                            type: "GET",
                            dataType: "json",
                            // data: <php echo json_encode($testIds); ?>
                            data: {"category": element.target.value, "ProductObj": <?php echo json_encode($TestObj); ?>}
                        }).always(function(callback){
                            $("#product-list").html(callback.products);
                        });

                        $.ajax({
                            url: 'ajax/getProductPages.ajax.php',
                            type: 'GET',
                            dataType: 'JSON',
                            data: {"ProductObj": <?php echo json_encode($TestObj); ?>}
                        }).always(function(cb) {
                            $("#pagination-tab").html(cb.pagination);
                        });
                    });
                </script>
            </div>
            <ul id="pagination-tab" class="pagination"></ul>
        </div>
    </div>
</body>
</html>