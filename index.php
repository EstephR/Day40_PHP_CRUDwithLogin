<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "CRUD/components/bootstrap.php"?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>MGM Grand Hotel - the best way to stay in Vienna</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-index navbar-expand-lg navbar-dark bg-light p-5" id="navindex">
  <div class="container-fluid">
  <a class="navbar-brand d-flex align-items-center nav-logo me-5" href="index.php" id="nav-text">
            <img src="img/logo.png" alt="" width="100" height="70" class="d-inline-block align-text-top nav-logo-img me-3">
            Hotel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-main-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Contact</a>
        </li>
        <li class="nav-item hide">
        <a class="navbar-brand d-flex align-items-center" href="CRUD/login.php">
            <img src="img/user.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
            </a>
        </li>
      </ul>
      <form class="d-flex hide2">
            <a class="navbar-brand d-flex align-items-center" href="CRUD/login.php">
            <img src="img/user.png" alt="" width="40" height="40" class="d-inline-block align-text-top">
            </a>
      </form>
    </div>
  </div>
</nav>

    <!-- Hero -->
    <div class="hero">
        <div class="hero-img-container">
          <img class="hero-img" src="img/hero-img.jpg">
        </div>
        <div class="hero-container d-flex justify-content-center">
            <div class="hero-text-container p-5 text-center text-light animate__animated animate__fadeInDown animate__slow">
            <h2 class="hero-headline">Welcome to</h2>
            <h2 class="hero-headline2">MGM Grand Hotel</h2>
            <div class="hero-text mt-4">Your best stay in Vienna</div>
        </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="main-footer text-light d-flex flex-column justify-content-center align-items-center">
        <div class="social-headline mb-3">See you on the Web</div>
        <div class="social-media d-flex justify-content-around">
            <img class="icon" src="img/facebook.png">
            <img class="icon" src="img/insta.png">
            <img class="icon" src="img/google.png">
        </div>
        <div class="footer-text mt-3">&copy; 2022 by Stephan Reindl, all rights reserved</div>

    </div>
    


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>