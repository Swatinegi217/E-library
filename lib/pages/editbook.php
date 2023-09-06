
<?php include '../config/database.php'; ?>
<!-- html header -->
<?php include '../helper/header.php'; ?>

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container">
    <a class="navbar-brand fw-medium fs-3 text-white" href="#">E-library <i class="fa fa-book-open-cover"></i></a>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

      <!-- Back button -->
      <a href="../pages/main.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i> back</a>
  </div>
</nav>

<!-- /tagline -->

<!-- controller -->
<?php include '../controller/editbookctrl.php'; ?>

<!-- main -->
<form action="" enctype="multipart/form-data" method="post">
  <div class="container">
    <div class="card">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-3">
          <div class="d-flex flex-column justify-content-center align-items-center">
            <label class="mb-1 fw-bold fs-5 text-capitalize bg-dark text-light text-center" style="width:350px">current book</label>
            <img src="../uploadimg/<?php echo  $single_row['uploadimgDB'] ?>" style="width:350px" class="img-fluid rounded-start">
            <input type="hidden" name="oldimg" value="<?php echo  $single_row['uploadimgDB'] ?>">
          </div>
        </div>


        <div class="text-capitalize col-12 col-sm-12 col-md-12 col-lg-6 p-3">
          <div class="justify-content-center align-items-center">
            <label class="mb-2 fw-bold">choose new book cover</label>
            <input class="form-control " type="file" name="upload" value="<?php echo $update_imgname['uploadimgDB']; ?>">

            <div class="mb-3">
              <label for="bookname" class="form-label fw-bold">Book Name</label>
              <input type="text" name="bookname" class="form-control" id="bookname" value="<?= $single_row['bookname']; ?>">
            </div>
            <div class="mb-3">
              <label for="authorname" class="form-label fw-bold">Author Name</label>
              <input type="text" name="authorname" class="form-control" id="authorname" value="<?= $single_row['authorname']; ?>">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label fw-bold">Description</label>
              <textarea name="description" class="form-control" cols="30" rows="10" id="description"><?= $single_row['description']; ?></textarea>
            </div>
            <div class="">
              <button type="submit" name="submit" class="btn btn-primary col-12">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>


<?php include '../helper/footer.php' ?>

</body>

</html>