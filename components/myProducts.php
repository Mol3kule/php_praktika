<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/myProducts.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>Mano Produktai</title>
</head>
<body>
    <div class="container">
        <div class="top-nav-ct">
            <ul id="top-nav" class="top-nav">
                <?php
                    if (!isset($_COOKIE['UId'])) {
                        header("location: ./components/logout.php");
                ?>
                <?php } else {?>
                    <a class="nav-bar myProducts" href="../index.php">Pagrindinis</a>
                    <a class="nav-bar addNew" href="./newProduct.php">Pridėti naują</a>
                    <a class="nav-bar logout" href="./logout.php">Atsijungti</a>
                <?php }?>
            </ul>
        </div>
        <hr>
        <div class="products-ct">
            <script>
                $.ajax({
                    url: '../ajax/getUserProducts.ajax.php',
                    type: "GET",
                    dataType: "json",
                    data: {}
                }).always(function(callback){
                    $("#product-list").html(callback.products);

                    $(".product").on("click", function(e) {
                        let id = e.currentTarget.dataset.id;
                        $.ajax({
                            url: '../ajax/getProductData.ajax.php',
                            type: "GET",
                            dataType: "json",
                            data: {"id": id}
                        }).always(function(cb){
                            var topNav = document.getElementById('top-nav');
                            var productList = document.getElementById('product-list');
                            var formTab = document.getElementById('form-tab');
                            productList.style.display = 'none';
                            var ProductData = cb.ProductData[0];
                            document.getElementById('title').value = ProductData.product_name;
                            document.getElementById('imgUrl').value = ProductData.imageSrc;
                            document.getElementById('category').value = ProductData.category;
                            document.getElementById('description').value = ProductData.description;
                            
                            formTab.style.display = 'block';

                            $("#saveBtn").on("click", function() {
                                formTab.style.display = 'none';
                                productList.style.display = 'grid';
                                $.ajax({
                                    url: '../ajax/updateProductData.ajax.php',
                                    type: "GET",
                                    dataType: "json",
                                    data: {
                                        id: id, 
                                        title: document.getElementById('title').value, 
                                        imgUrl: document.getElementById('imgUrl').value,
                                        category: document.getElementById('category').value,
                                        description: document.getElementById('description').value
                                    }
                                }).always(function(cb){
                                    location.reload();
                                });
                            });

                            $("#deleteBtn").on("click", function() {
                                $.ajax({
                                    url: '../ajax/deleteProduct.ajax.php',
                                    type: "GET",
                                    dataType: "json",
                                    data: {id: id}
                                }).always(function(cb){
                                    location.reload();
                                });
                            });
                        });
                    });
                });
            </script>
            <div id="form-tab" style="display: none;">
                <form action="">
                    <input class="inputEdit" id="title" type="text" placeholder="Pavadinimas"><br>
                    <input id="imgUrl" class="inputEdit" type="text" placeholder="Nuotraukos URL"><br>
                    <input id="category" class="inputEdit" type="text" placeholder="Kategorija"><br>
                    <textarea id="description" class="inputEdit desc" cols="30" rows="10" placeholder="Aprašymas"></textarea><br>
                    <button id="saveBtn" type="button" class="updateBtn update">Atnaujinti</button>
                    <button id="deleteBtn" type="button" class="updateBtn delete">Pašalinti</button>
                </form>
            </div>
            <div id="product-list"></div>
        </div>
    </div>
</body>
</html>