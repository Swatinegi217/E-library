
<?php include '../config/database.php'; ?>
<?php include '../helper/header.php'; ?>


<?php include '../controller/addbookctrl.php'; ?>

<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand fw-medium fs-3 text-white" href="#">E-library <i class="fa fa-book-open-cover"></i></a>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

            <!-- Back button -->
            <a href="../pages/main.php" class="btn bg-light text-dark fw-bold" role="button" name="submit" type="submit"><i class="fa fa-chevron-left"></i> back</a>
    </div>
</nav>

<form action="" enctype="multipart/form-data" method="post">
    <div class="container mt-5 ">
        <div class="card rounded-0 form-container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="justify-content-center align-items-center p-3">
                        <div class="mb-3 ">
                            <label class="fw-bold" for="bookname">Book Name</label>
                            <input type="text" class="form-control rounded-0 text-capitalize" id="bookname" name="bookname" required>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold" for="authorname">Author Name</label>
                            <input type="text" class="form-control rounded-0 text-capitalize" id="authorname" name="authorname" required>
                        </div>
                       
                        <div class="mb-3">
                            <label class="fw-bold" for="authorname">Number of books</label>
                            <input type="number" class="form-control rounded-0" id="totalbook" name="totalbook" min="0" max="2" required>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold mb-2" class="fw-bold" for="upload">Upload Image</label>
                            <input type="file" class="form-control rounded-0" id="upload" name="upload" required>
                        </div>
                       
                    </div>
                </div>

                <div class="text-capitalize col-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="justify-content-center align-items-center p-3">
                    <div class="mb-3">
                            <label class="fw-bold" for="description">Description</label>
                            <textarea class="form-control rounded-0" id="description" name="description" cols="30" rows="8" required></textarea>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center align-items-center">
                            <div class="card-body px-0 mt-1">
                                <button type="submit" class="btn btn-primary form-control rounded-0" name="submit">Add a Book</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>