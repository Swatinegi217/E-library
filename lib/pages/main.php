<?php

include '../config/database.php';
include '../helper/header.php';
include '../query/details.php';
?>

<!-- HTML content goes here -->

<!-- header section start -->
<header class="header">
    <div class="header-1">
        <a href="#" class="logo">
            <img src="../images/book icon.gif" alt="Library Logo" style="width: 40px; height: 40px; margin-right: 10px;">
            My Library
        </a>
        <?php include '../helper/search.php' ?>
        <div class="icons">
            <a href="./register.php" class="fa fa-user"></a>
            <a href="../pages/addbook.php" class="btn btn-primary">Add Book</a>
            <a href="../pages/logout.php" class="btn btn-primary">Log Out</a>
        </div>
    </div>
</header>
<!-- header section end -->

<div class="section-1">
    <div class="Section-1-text">
        <center>
            <h1>Welcome to My Library</h1>
            <p>You can find your books here.</p>
            <a href="#" class="btn">Explore Here <i class="fa fa-arrow-down" aria-hidden="true"></i></a>
            <p style="background-image: url('../images/backg.jpeg');"></p>
        </center>
    </div>
</div>

<?php include '../query/details.php' ?>

<div class="section-2">
    <h2>Featured Products</h2>
    <?php include '../controller/pagectrl.php' ?>
    <?php include '../helper/footer.php'; ?>
</div>

</body>
</html>
