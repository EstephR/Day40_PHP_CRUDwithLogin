<?php
session_start();
require_once 'components/db_connect.php';

// it will never let you open index (login) page if session is set
if (isset($_SESSION['user']) != "") {
  header("Location: home.php");
  exit;
}
if (isset($_SESSION['adm']) != "") {
  header("Location: dashboard.php"); // redirects to home.php
}

$error = false;
$email = $password = $emailError = $passError = '';

if (isset($_POST['btn-login'])) {

  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  if (empty($email)) {
      $error = true;
      $emailError = "Please enter your email address.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = true;
      $emailError = "Please enter valid email address.";
  }

  if (empty($pass)) {
      $error = true;
      $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {

      $password = hash('sha256', $pass); // password hashing

      $sql = "SELECT id, fname, password, status FROM users WHERE email = '$email'";
      $result = mysqli_query($connect, $sql);
      $row = mysqli_fetch_assoc($result);
      $count = mysqli_num_rows($result);
      if ($count == 1 && $row['password'] == $password) {
          if ($row['status'] == 'adm') {
              $_SESSION['adm'] = $row['id'];
              header("Location: dashboard.php");
          } else {
              $_SESSION['user'] = $row['id'];
              header("Location: home.php");
          }
      } else {
          $errMSG = "Incorrect Credentials, Try again...";
      }
  }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Registration System</title>
  <?php require_once 'components/bootstrap.php' ?>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container">
      <form class="w-75" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
          <div class="d-flex flex-column align-items-center">
            <h1 class="p-3 text-light text-center mt-3 mb-3">Login</h1>
            <img class="backend-img mb-5" src="../img/logo.png">
        </div>
          <?php
          if (isset($errMSG)) {
              echo $errMSG;
          }
          ?>

          <div class="d-flex flex-column align-items-center">
          <input type="email" autocomplete="off" name="email" class="form-control mb-2 w-50 center" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
          <span class="text-danger"><?php echo $emailError; ?></span>

          <input type="password" name="pass" class="form-control mb-2 w-50" placeholder="Your Password" maxlength="15" />
          <span class="text-danger"><?php echo $passError; ?></span>
          </div>
          <div class="d-flex flex-column align-items-center">
          <button class="btn btn-block btn-warning mb-3 w-25" type="submit" name="btn-login">Sign In</button>
          <a href="register.php">Not registered yet? Click here</a>
        </div>
         
      </form>
  </div>
</body>
</html>