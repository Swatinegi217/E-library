<?php
class BookDetailModel {
    public function getBookDetail($id) {
        include '../config/database.php';
        $query = "SELECT * FROM bookdetail WHERE id = '$id' ";
        $result = mysqli_query($con, $query);
        $book = mysqli_fetch_array($result);
        return $book;
    }
}