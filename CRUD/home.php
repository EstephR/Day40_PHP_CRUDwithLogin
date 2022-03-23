<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
  header("Location: dashboard.php");
  exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION["user"];

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);


//Get Data for Bookings already made by user
$sql = "SELECT * FROM rooms 
WHERE rooms.id IN (SELECT fk_room_id from booking WHERE fk_user_id = {$user_id})"; 
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0 ) {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $rows = "no results";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome - <?php echo $row['fname']; ?></title>
  <?php require_once 'components/bootstrap.php' ?>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-admin p-5 navbar-expand-lg navbar-dark bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="home.php">
            <img class="userImage img-thumbnail rounded-circle" src="../img/<?php echo $row['picture']; ?>" alt="<?php echo $row['fname']; ?>" width="80" height="80" class="d-inline-block align-text-top">
            <div class="text-white ms-3">Hi <?php echo $row['fname']; ?></div></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-5">
                <a class="nav-link" href="update_user.php?id=<?php echo $_SESSION['user'] ?>"><button class="btn btn-warning p-3">Update Profile</button></a>
                <a class="nav-link" href="rooms_available.php"><button class="btn btn-success p-3">Book a Room</button></a>
                <a class="nav-link" href="logout.php?logout"><button class="btn btn-outline-danger p-3">Log out</button></a>
            </div>
            </div>
        </div>
    </nav>
  <div class="container">
  <h1 class="p-3 text-light text-center mt-3 mb-3">Rooms already booked</h1>
    <table class='table table-striped'>
               <thead class='table-warning'>
                   <tr>
                        <th>Room No.</th>
                       <th>Size</th>
                       <th>Type</th>
                       <th>Price</th>
                       <th>Book</th>
                   </tr>
               </thead>
               <tbody>
                    <!-- Loop Data -->
                <?php 
                   if(is_array($rows)) {
                       foreach($rows as $row) {
                ?>
                    <tr>
                        <td><?=$row["id"]?></td>
                        <td><?=$row["size"] ?></td>
                        <td><?=$row["type"]?></td>
                        <td><?=$row["price"]?></td>
                        <td>
                            <a href="products/actions/a_rooms_delete.php?id=<?=$row["id"]?>"><button class='btn btn-outline-danger mb-2'>Delete Booking</button>
                        </td>
                   </tr>
                <?php 
                       }
                    } else {
                        echo $rows;
                    }
                ?>
                </tbody>
           </table>
</body>
</html>