<?php
    include '../config/database.php';
if (isset($_POST['submit'])) {

    
    $bookname = $_POST['bookname'];
    $authorname = $_POST['authorname'];
    $description = $_POST['description'];
    $totalbook = $_POST['totalbook'];

    $imgname = $_FILES['upload']['name'];
    $tempname = $_FILES['upload']['tmp_name'];
    move_uploaded_file($tempname, '../uploadimg/' . $imgname);

    $save_bookdetail = "INSERT INTO bookdetail (bookname,authorname,description,uploadimgDB,total_book) VALUES('$bookname','$authorname','$description','$imgname', '$totalbook')";
    $result = mysqli_query($con, $save_bookdetail);

    if ($result) {
        echo "<script>alert('book added successfully')</script>";
?>
        <meta http-equiv="refresh" content="0; url = http://localhost:3000/pages/main.php" />
<?php
    } elseif (!$result) {
        echo 'fail';
        header("location:addbook.php");
    }
}
