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
                    function ClearProducts() {
                        $doc = new DOMDocument();
                        $doc->validateOnParse = true;
                        if (isset($_GET['doc'])) {
                            $doc->getElementById('product-list')->nodeValue = null;
                        }
                    }

                    // PAGINATION
                    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                    }
                    
                    $total_records_per_page = 10;
                    $offset = ($page_no-1) * $total_records_per_page;
                    $previous_page = $page_no - 1;
                    $next_page = $page_no + 1;
                    $adjacents = "2";

                    $result_count = $connection->prepare("SELECT COUNT(*) AS total_records FROM `products`" );
                    $result_count->execute();
                    $total_records = $result_count->fetchAll();
                    $total_records = $total_records['total_records'];
                    print_r($total_records);
                    $total_no_of_pages = ceil($total_records / $total_records_per_page);
                    $second_last = $total_no_of_pages - 1; // total pages minus 1
                    // END OF PAGINATION

                    $statement = $connection->prepare("SELECT * FROM products LIMIT $offset, $total_records_per_page");
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
                <ul class="pagination">
                    <?php if($page_no > 1){
                    echo "<a href='?page_no=1'>First Page</a>";
                    } ?>
                        
                    <?php if($page_no <= 1){ echo "class='disabled'"; } ?>
                    <a <?php if($page_no > 1){
                    echo "href='?page_no=$previous_page'";
                    } ?>>Previous</a>
                        
                    <?php if($page_no >= $total_no_of_pages){
                    echo "class='disabled'";
                    } ?>
                    <a <?php if($page_no < $total_no_of_pages) {
                    echo "href='?page_no=$next_page'";
                    } ?>>Next</a>

                    <?php if($page_no < $total_no_of_pages){
                    echo "<a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a>";
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>