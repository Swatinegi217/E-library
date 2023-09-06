<?php
include '../config/database.php';

// edit book
if (isset($_GET['id'])) {
  $edit_id = $_GET['id'];

  $edit_query = "SELECT * FROM bookdetail WHERE id = '$edit_id' ";
  $result = mysqli_query($con, $edit_query);
  $single_row = mysqli_fetch_array($result);
}

if (isset($_POST['submit'])) {
  $edit_id = $_GET['id'];


  $update_bookname = $_POST['bookname'];
  $update_authorname = $_POST['authorname'];
  $update_description = $_POST['description'];

  if ($_FILES['upload']['name'] != "") {
    $update_imgname = $_FILES['upload']['name'];
    $tempname = $_FILES['upload']['tmp_name'];
    move_uploaded_file($tempname, 'uploadimg/' . $update_imgname);
  } else {
    $update_imgname = $_POST['oldimg'];
  }

  $edit_query = "SELECT * FROM bookdetail WHERE id = '$edit_id' ";
  $result = mysqli_query($con, $edit_query);
  $single_row = mysqli_fetch_array($result);

  if ($single_row['bookname'] == $update_bookname && $single_row['authorname'] == $update_authorname && $single_row['description'] == $update_description && $single_row['uploadimgDB'] == $update_imgname) {
    echo "<script>alert('No changes have been made to the book details.')</script>";
  ?>
    <meta http-equiv="refresh" content="0; url = http://localhost:3000/pages/main.php" />
    <?php
  } else {
    $save_bookdetail = "UPDATE bookdetail SET bookname = '$update_bookname',authorname ='$update_authorname', description = '$update_description', uploadimgDB = '$update_imgname' WHERE id = '$edit_id' ";
    $run_bookdetail = mysqli_query($con, $save_bookdetail);

    if ($run_bookdetail) {
      echo "<script>alert('Book Updated Successfully')</script>";
    ?>
      <meta http-equiv="refresh" content="0; url = http://localhost:3000/pages/main.php" />
<?php
    }
  }
}
?>