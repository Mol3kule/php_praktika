<?php

$ProductObj = $_GET["ProductObj"];
$ProductObj = $ProductObj["ProductObj"];

$PaginationHTML = "";

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}


$PaginationHTML .= "<li ";
if ($page_no <= 1) {
    $PaginationHTML .= "class='disabled'>{$page_no}";
}
if ($page_no > 1) {
    $PaginationHTML .= "<a href='?page_no={$ProductObj['previous_page']}'>&#8249&#8249 Atgal</a>";
}
$PaginationHTML .= "</li>";

if ($ProductObj['total_no_of_pages'] <= 10) {
    for ($counter = 1; $counter <= $ProductObj['total_no_of_pages']; $counter++) {
        if ($counter == $page_no) {
            $PaginationHTML .= "<li class='active'><a>{$counter}</a></li>";
        } else {
            $PaginationHTML .= "<li><a href='?page_no={$counter}'>{$counter}</a></li>";
        }
    }
} elseif ($ProductObj['total_no_of_pages'] > 10) {
    if ($page_no <= 4) {
        for ($counter = 1; $counter < 8; $counter++) {
            if ($counter == $page_no) {
                $PaginationHTML .= "<li class='active'><a>{$counter}</a></li>";
            } else {
                $PaginationHTML .= "<li><a href='?page_no={$counter}'>{$counter}</a></li>";
            }
        }
        $PaginationHTML .= "<li><a>...</a></li>";
        $PaginationHTML .= "<li><a href='?page_no={$ProductObj['second_last']}'>{$ProductObj['second_last']}</a></li>";
        $PaginationHTML .= "<li><a href='?page_no={$ProductObj['total_no_of_pages']}'>{$ProductObj['total_no_of_pages']}</a></li>";
    } elseif ($page_no > 4 && $page_no < $ProductObj['total_no_of_pages'] - 4) {
        $PaginationHTML .= "<li><a href='?page_no=1'>1</a></li>";
        $PaginationHTML .= "<li><a href='?page_no=2'>2</a></li>";
        $PaginationHTML .= "<li><a>...</a></li>";
        for ($counter = $page_no - $ProductObj['adjacents']; $counter <= $page_no + $ProductObj['adjacents']; $counter++) {
            if ($counter == $page_no) {
                $PaginationHTML .= "<li class='active'><a>$counter</a></li>";
            } else {
                $PaginationHTML .= "<li><a href='?page_no=$counter'>$counter</a></li>";
            }
        }
        $PaginationHTML .= "<li><a>...</a></li>";
        $PaginationHTML .= "<li><a href='?page_no={$ProductObj['second_last']}'>{$ProductObj['second_last']}</a></li>";
        $PaginationHTML .= "<li><a href='?page_no={$ProductObj['total_no_of_pages']}'>{$ProductObj['total_no_of_pages']}</a></li>";
    } else {
        $PaginationHTML .= "<li><a href='?page_no=1'>1</a></li>";
        $PaginationHTML .= "<li><a href='?page_no=2'>2</a></li>";
        $PaginationHTML .= "<li><a>...</a></li>";
        for ($counter = $ProductObj['total_no_of_pages'] - 6; $counter <= $ProductObj['total_no_of_pages']; $counter++) {
            if ($counter == $page_no) {
                $PaginationHTML .= "<li class='active'><a>$counter</a></li>";
            } else {
                $PaginationHTML .= "<li><a href='?page_no=$counter'>$counter</a></li>";
            }
        }
    }
}

if ($page_no <= $ProductObj['total_no_of_pages']) {
    $PaginationHTML .= "<li ";
    if ($page_no >= $ProductObj['total_no_of_pages']) {
        $PaginationHTML .= "class='disabled'>";
    }
    if ($page_no < $ProductObj['total_no_of_pages']) {
        $PaginationHTML .= "<a href='?page_no={$ProductObj['next_page']}'>Kitas</a>";
    }
    $PaginationHTML .= "</li>";
}

if ($page_no < $ProductObj['total_no_of_pages']) {
    $PaginationHTML .= "<li><a href='?page_no={$ProductObj['total_no_of_pages']}'>Paskutinis &rsaquo;&rsaquo;</a></li>";
}

echo json_encode(["pagination" => $PaginationHTML]);