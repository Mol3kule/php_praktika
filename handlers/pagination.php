<?php

class Pagination {
    function Load($ProductObj) { 
        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }
        ?>
        <ul class="pagination">
            <li <?php if ($page_no <= 1) {
                    echo "class='disabled'";
                } ?>>
                <a <?php if ($page_no > 1) {
                        echo "href='?page_no=$ProductObj->previous_page'";
                    } ?>>&#8249&#8249 Atgal</a>
            </li>

            <?php
            if ($ProductObj->total_no_of_pages <= 10) {
                for ($counter = 1; $counter <= $ProductObj->total_no_of_pages; $counter++) {
                    if ($counter == $page_no) {
                        echo "<li class='active'><a>$counter</a></li>";
                    } else {
                        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                    }
                }
            } elseif ($ProductObj->total_no_of_pages > 10) {
                if ($page_no <= 4) {
                    for ($counter = 1; $counter < 8; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                        }
                    }
                    echo "<li><a>...</a></li>";
                    echo "<li><a href='?page_no=$ProductObj->second_last'>$ProductObj->second_last</a></li>";
                    echo "<li><a href='?page_no=$ProductObj->total_no_of_pages'>$ProductObj->total_no_of_pages</a></li>";
                } elseif ($page_no > 4 && $page_no < $ProductObj->total_no_of_pages - 4) {
                    echo "<li><a href='?page_no=1'>1</a></li>";
                    echo "<li><a href='?page_no=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
                    for ($counter = $page_no - $ProductObj->adjacents; $counter <= $page_no + $ProductObj->adjacents; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                        }
                    }
                    echo "<li><a>...</a></li>";
                    echo "<li><a href='?page_no=$ProductObj->second_last'>$ProductObj->second_last</a></li>";
                    echo "<li><a href='?page_no=$ProductObj->total_no_of_pages'>$ProductObj->total_no_of_pages</a></li>";
                } else {
                    echo "<li><a href='?page_no=1'>1</a></li>";
                    echo "<li><a href='?page_no=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
                    for ($counter = $ProductObj->total_no_of_pages - 6; $counter <= $ProductObj->total_no_of_pages; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                        }
                    }
                }
            }
            ?>

            <li <?php if ($page_no >= $ProductObj->total_no_of_pages) {
                    echo "class='disabled'";
                } ?>>
                <a <?php if ($page_no < $ProductObj->total_no_of_pages) {
                        echo "href='?page_no=$ProductObj->next_page'";
                } ?>>Kitas</a>
            </li>

            <?php if ($page_no < $ProductObj->total_no_of_pages) {
                echo "<li><a href='?page_no=$ProductObj->total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
            } ?>
        </ul>
    <?php
    }
}