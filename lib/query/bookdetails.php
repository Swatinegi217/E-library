<?php

function get_all_books()
{
    include '../config/database.php';
    $query = "SELECT * FROM bookdetail";
    $result = mysqli_query($con, $query);
    $books = array();
    while ($row = mysqli_fetch_array($result)) {
        $books[] = $row;
    }
    return $books;
}