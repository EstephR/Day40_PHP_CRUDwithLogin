<!-- File for the User to book rooms -->
<?php
session_start();
require_once "components/db_connect.php";

// if user will redirect to home
if (isset($_SESSION['user'])) {
  header("Location: home.php");
  exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$sql = "DELETE FROM users WHERE id = {$_GET["id"]}";

if(mysqli_query($connect, $sql) === true) {
    $class = "success";
    $message = "User has been successfully deleted!";
} else {
    $class = "danger";
    $message = "Something went wrong, please try again!" . $connect->error;
}

mysqli_close($connect);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete User</title>
        <?php require_once "components/bootstrap.php"?>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="mt-5 mb-3">
                <h1 class="p-3 text-light text-center">Delete User</h1>
            </div>
            
            <div class="alert alert-<?=$class?>" role="alert"> 
                <p><?=$message?></p>
                <a href="dashboard.php"><button class="btn btn-success" type='button'>Go Back</button></a>
            </div>
        </div>
    </body>
</html>