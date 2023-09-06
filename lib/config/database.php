<?php
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'library';


$con = mysqli_connect($server, $user, $password, $dbname);

if(!$con){
    echo 'connection fail';
}
?>
