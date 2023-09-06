<?php 

include '../config/database.php' ;

$sql = "SELECT * FROM bookdetail";
$searchBook = isset($_GET['search-book']) ? $_GET['search-book'] : '';
if (!empty($searchBook)) {
    $sql .= " WHERE bookname = '$searchBook'";
}

$result = $con->query($sql);

?>