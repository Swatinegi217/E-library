
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
<?php include '../query/bookdetails.php'; ?>

<!-- modal -->
<?php include '../controller/allbookctrl.php'; ?>

<!-- main -->
<div class="container">
    <div class="container">
        <table class="table table-bordered table-hover text-capitalize table-sm text-center">
            <tr class="table-dark">
                <th>S no.</th>
                <th>book id</th>
                <th>book name</th>
                <th>author name</th>
                <th>total books</th>
                <th>book image</th>
            </tr>
            <?php
                $a=1;
            foreach ($books as $book) {
            ?>
                <tr>
                    <td><?= $a; ?></td>
                    <td><?= $book['id']; ?></td>
                    <td><?= $book['bookname']; ?></td>
                    <td><?= $book['authorname']; ?></td>
                    <td><?= $book['total_book']; ?></td>
                    <td><img class="indeximg" src="../uploadimg/<?= $book['uploadimgDB']; ?>" style="width: 20px; height:30px;"></td>
                </tr>
            <?php
            $a++;
            }
            ?>
        </table>
    </div>
</div>



</body>

</html>