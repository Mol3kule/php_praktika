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
                    <a class="nav-bar myProducts" href="../components/myProducts.php">Mano Produktai</a>
                    <a class="nav-bar logout" href="components/logout.php">Atsijungti</a>
                <?php }?>
            </ul>
        </div>
        <hr>
        <div class="products-ct">
            <div id="form-tab">
                <form action="">
                    <input class="inputEdit" id="title" type="text" placeholder="Pavadinimas"><br>
                    <input id="imgUrl" class="inputEdit" type="text" placeholder="Nuotraukos URL"><br>
                    <input id="category" class="inputEdit" type="text" placeholder="Kategorija"><br>
                    <textarea id="description" class="inputEdit desc" cols="30" rows="10" placeholder="Aprašymas"></textarea><br>
                    <button id="addBtn" type="button" class="updateBtn update">Pridėti</button>
                    <button id="cancelBtn" type="button" class="updateBtn delete">Atšaukti</button>
                </form>
            </div>
            <script>
                
                $("#addBtn").on("click", function() {
                    var product_name = document.getElementById("title").value;
                    var imageSrc = document.getElementById("imgUrl").value;
                    var category = document.getElementById("category").value;
                    var description = document.getElementById("description").value;
                    if (product_name == "" || imageSrc == "" || category == "" || description == "") return;
                    $.ajax({
                        url: '../ajax/newProduct.ajax.php',
                        type: "GET",
                        dataType: "json",
                        data: {
                            product_name: product_name,
                            imageSrc: imageSrc,
                            category: category,
                            description: description
                        }
                    }).always(function(callback){
                        window.location.href = "../components/myProducts.php";
                    });
                });

                $("#cancelBtn").on("click", function() {
                    window.location.href = "../components/myProducts.php";
                });
            </script>
        </div>
    </div>
</body>
</html>