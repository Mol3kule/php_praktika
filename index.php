<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Sandeliukas</title>
</head>

<body>
    <?php
    require('./components/database.php');
    ?>
    <div class="container">
        <!-- TOP NAVIGATION BAR -->
        <div class="top-nav-ct">
            <ul class="top-nav">
                <a class="nav-bar register" href="login/registration.php">Registruotis</a>
                <a class="nav-bar login" href="login/login.php">Prisijungti</a>
            </ul>
        </div>
        <hr>
        <div class="products-ct">
            Prekių katalogas
            <div id="product-list">
                <!-- GENERATE PRODUCTS -->
                <?php
                function ClearProducts()
                {
                    $doc = new DOMDocument();
                    $doc->validateOnParse = true;
                    if (isset($_GET['doc'])) {
                        $doc->getElementById('product-list')->nodeValue = null;
                    }
                }

                // PAGINATION
                if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                    $page_no = $_GET['page_no'];
                } else {
                    $page_no = 1;
                }

                $total_records_per_page = 10;
                $offset = ($page_no - 1) * $total_records_per_page;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;
                $adjacents = "2";

                $result_count = $connection->prepare("SELECT COUNT(*) AS total_records FROM `products`");
                $result_count->execute();
                $total_records = $result_count->fetchAll();
                foreach ($total_records as $record_count) {
                    $total_records = $record_count['total_records'];
                }
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total pages minus 1
                // END OF PAGINATION

                $statement = $connection->prepare("SELECT * FROM products LIMIT $offset, $total_records_per_page");
                $statement->execute();
                $result = $statement->fetchAll();

                foreach ($result as $row) {?>
                    <div class="product">
                        <img class="productImg" src="<?php echo $row["imageSrc"]; ?>" alt="Not Loaded">
                        <div class="product-name"><?php echo $row["product_name"]; ?></div>
                        <div class="product-quantity"><span style="color: red;">Sandelyje:</span> <?php echo $row["quantity"]; ?></div>
                    </div>
                <?php } ?>
            </div>
            <ul class="pagination">
                <li <?php if ($page_no <= 1) {
                        echo "class='disabled'";
                    } ?>>
                    <a <?php if ($page_no > 1) {
                            echo "href='?page_no=$previous_page'";
                        } ?>>&#8249&#8249 Previous</a>
                </li>

                <?php
                if ($total_no_of_pages <= 10) {
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                        }
                    }
                } elseif ($total_no_of_pages > 10) {
                    if ($page_no <= 4) {
                        for ($counter = 1; $counter < 8; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a>$counter</a></li>";
                            } else {
                                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                        }
                        echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                    } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                        echo "<li><a href='?page_no=1'>1</a></li>";
                        echo "<li><a href='?page_no=2'>2</a></li>";
                        echo "<li><a>...</a></li>";
                        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a>$counter</a></li>";
                            } else {
                                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                        }
                        echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                    } else {
                        echo "<li><a href='?page_no=1'>1</a></li>";
                        echo "<li><a href='?page_no=2'>2</a></li>";
                        echo "<li><a>...</a></li>";
                        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a>$counter</a></li>";
                            } else {
                                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                        }
                    }
                }
                ?>

                <li <?php if ($page_no >= $total_no_of_pages) {
                        echo "class='disabled'";
                    } ?>>
                    <a <?php if ($page_no < $total_no_of_pages) {
                         echo "href='?page_no=$next_page'";
                    } ?>>Next</a>
                </li>

                <?php if ($page_no < $total_no_of_pages) {
                    echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                } ?>
            </ul>
        </div>
    </div>
</body>

</html>