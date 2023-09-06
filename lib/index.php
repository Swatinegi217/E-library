<?php
  session_start();
  $count = 0;
  ?>
<!-- html header -->
<?php include './helper/header.php' ?>

<?php include './helper/navbar.php' ?>
<style>
  .card {
    background-image: url('images/book icon.gif');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>

<div class="container mt-5 d-flex justify-content-center align-items-center">
    <div class="card" style="width: 50rem; height:30rem;">
      <div class="card-body text-center ">
        <h1>Welcome to E-Library</h1>
        <h2 class="card-text">Explore a vast collection of digital books and resources.</h2>
        <a href="./pages/login.php" class="btn btn-primary">Login</a>
        <a href="./pages/register.php" class="btn btn-primary">Register</a>
      </div>
    </div>
  </div>

<!---- footer ----->
<?php include './helper/footer.php' ?>
</body>

</html>