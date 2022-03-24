<?php
session_start();

require_once 'components/db_connect.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
  header("Location: login.php");
  exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
  header("Location: home.php");
  exit;
}

$id = $_SESSION['adm'];
$status = 'adm';
$sql = "SELECT * FROM users";
$result = mysqli_query($connect, $sql);

//this variable will hold the body for the table
$tbody = '';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
      if ($row["status"] != $status) {
      $tbody .= "<tr>
          <td><img class='img-thumbnail rounded-circle' src='../img/" . $row['picture'] . "' alt=" . $row['fname'] . "></td>
          <td>" . $row['fname'] . "</td>
          <td>" . $row['lname'] . "</td>
          <td>" . $row['email'] . "</td>
          <td><a href='update_user.php?id=" . $row['id'] . "'><button class='btn btn-warning btn-sm' type='button'>Edit</button></a>
          <a href='a_delete_user.php?id=" . $row['id'] . "'><button class='btn btn-outline-danger btn-sm' type='button'>Delete</button></a></td>
       </tr>";
      }
  }
} else {
  $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

// select logged in Admin details
$result_adm = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['adm']);
$row_adm = mysqli_fetch_array($result_adm, MYSQLI_ASSOC);

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Area</title>
  <?php require_once 'components/bootstrap.php' ?>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
 <!-- Navbar -->
 <nav class="navbar navbar-admin p-5 navbar-expand-lg navbar-dark bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="home.php">
            <img class="userImage img-thumbnail rounded-circle" src="../img/<?php echo $row_adm['picture']; ?>" alt="<?php echo $row_adm['fname']; ?>" width="80" height="80" class="d-inline-block align-text-top">
            <div class="text-white ms-3">Hello, Admin <?php echo $row_adm['fname']; ?></div></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-5">
                <a class="nav-link" href="update_user.php?id=<?php echo $_SESSION['adm'] ?>"><button class="btn btn-warning p-3">Update Profile</button></a>
                <a class="nav-link" href="rooms_available.php"><button class="btn btn-success p-3">Update Rooms</button></a>
                <a class="nav-link" href="logout.php?logout"><button class="btn btn-outline-danger p-3">Log out</button></a>
            </div>
            </div>
        </div>
    </nav>


  <div class="container">
          <h1 class="p-3 text-light text-center mt-3 mb-3">Users</h1>
    <table class='table table-striped'>
               <thead class='table-warning'>
                   <tr>
                        <th>Picture</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>E-Mail</th>
                       <th>Actions</th>
                   </tr>
               </thead>
               <tbody>
                    <?= $tbody ?>
                </tbody>
           </table>
      </div>
  </div>
</body>
</html>

