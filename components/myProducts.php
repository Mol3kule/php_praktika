<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/myProducts.css">
    <title>Mano Produktai</title>
</head>
<body>
    <div class="container">
        <div class="top-nav-ct">
            <ul class="top-nav">
                <?php
                    if (!isset($_COOKIE['UId'])) {
                        header("location: ./components/logout.php");
                ?>
                <?php } else {?>
                    <a class="nav-bar myProducts" href="../index.php">Pagrindinis</a>
                    <a class="nav-bar addNew" href="../index.php">Pridėti naują</a>
                    <a class="nav-bar logout" href="components/logout.php">Atsijungti</a>
                <?php }?>
            </ul>
        </div>
        <hr>
        <div class="products-ct">
            <script>
                $.ajax({
                    url: 'ajax/getUserProducts.ajax.php',
                    type: "GET",
                    dataType: "json",
                    // data: <php echo json_encode($testIds); ?>
                    data: {}
                }).always(function(callback){
                    $("#product-list").html(callback.products);
                });
            </script>
            <div id="product-list"></div>
        </div>
    </div>
</body>
</html>