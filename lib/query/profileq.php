<?php
include '../config/database.php';

$data = $_SESSION['user_data'];
$email = $data['1'];

$query = "SELECT * FROM users WHERE email = '$email' ";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);