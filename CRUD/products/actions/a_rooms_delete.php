<!-- File for the User to book rooms -->
<?php
session_start();
require_once "../../components/db_connect.php";

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
  header("Location: ../../dashboard.php");
  exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: ../../login.php");
  exit;
}


$fk_room_id = $_GET["id"];
$fk_user_id = $_SESSION["user"];
$room_status = "";
$sql_delete = "DELETE FROM `booking` WHERE fk_room_id = $fk_room_id AND fk_user_id = $fk_user_id";

if(mysqli_query($connect, $sql_delete) === true) {
    $class = "success";
    $message = "Your Room Reservation has successfully been deleted!";
    $room_status = "booked";
    // Update Room status
    $sql_rooms = "UPDATE rooms SET status='available' WHERE id = $fk_room_id";
    mysqli_query($connect, $sql_rooms);
} else {
    $class = "danger";
    $message = "Something went wrong, please try again!" . $connect->error;
    $room_status = "booked";
}

mysqli_close($connect);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Book Room</title>
        <?php require_once "../../components/bootstrap.php"?>
        <link rel="stylesheet" href="../../../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="mt-5 mb-3">
                <h1 class="p-3 text-light text-center">Cancel Room Booking</h1>
            </div>
            
            <div class="alert alert-<?=$class?>" role="alert"> 
                <p><?=$message?></p>
                <a href="../../home.php"><button class="btn btn-success" type='button'>Go Back</button></a>
            </div>
        </div>
    </body>
</html>