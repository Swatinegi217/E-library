

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

<!-- profile card -->
<form action="" method="post">
    <?php

    // modal
    include '../query/profileq.php';

    if ($row) {
    ?>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card rounded-0 col-lg-8">
                <div class="card-header rounded-0 bg-dark text-white">
                    <h1 class="text-center text-capitalize">Profile</h1>
                </div>
                <div class="row g-0">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-1 d-flex justify-content-center align-items-center">
                        <img src="../image/demo.jpg" style="width:200px" class="img-fluid rounded-0">
                    </div>

                    <div class="text-capitalize col-12 col-sm-12 col-md-6 col-lg-6 mt-3 justify-content-center align-items-center">
                        <div class="d-flex flex-row flex-wrap">
                            <h1 class="card-text text-capitalize"><?php echo $row['username']; ?></h1>
                        </div>
                        <div class="d-flex flex-row flex-wrap mt-2 text-success">
                            <h7 class="card-text"><?php echo $row['email']; ?></h7>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</form>

</body>
</html>

 