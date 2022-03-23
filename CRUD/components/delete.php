<?php
require_once "../actions/db_connect.php";

if ($_GET["id"]) {
$id = $_GET["id"];
$sql = "SELECT * FROM books WHERE ISBN = $id";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($result);

if (mysqli_num_rows($result) == 1) {
    $title = $data["title"];
    $picture = $data["image"];
    $ISBN = $data["ISBN"];
} else {
    header ("location: ../admin.php");
}
mysqli_close($connect);
} else {
    header("location: ../admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "bootstrap.php"?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Delete Media</title>
</head>
<body>
<!-- Navbar -->
    <nav class="navbar navbar-admin p-5 navbar-expand-lg navbar-dark bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="../admin.php">
            <img src="../img/user.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
            User Area</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-5">
                <a class="nav-link" href="create.php"><button class="btn btn-outline-warning p-3">Add Books</button></a>
                <a class="nav-link" href="publisher.php"><button class="btn btn-warning p-3">Publisher Site</button></a>
                <a class="nav-link" href="../index.php"><button class="btn btn-success p-3">Log out</button></a>
            </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="p-3 text-light text-center mb-5">Delete Item from Database</h1>
        <div class="d-flex align-items-center mb-4">
            <h2 class="me-4">Are you sure you want to delete this book?</h2>
            <form action ="../actions/a_delete.php" method="POST">
                <input type="hidden" name="id" value="<?= $id ?>" />
                <button class="btn btn-danger p-3 me-3" type="submit">Yes, Delete!</button>
                <a href="../admin.php"><button class="btn btn-success p-3" type="button">Don't Delete!</button></a>
            </form>
        </div>
    

        <table class='table table-striped'>
               <thead class='table-danger'>
                   <tr>
                        <th>Cover</th>
                       <th>Title</th>
                       <th>ISBN</th>
                   </tr>
               </thead>
               <tbody>
                    <tr>
                        <td><img src="../img/<?= $picture ?>" class="img-thumbnail table-img"></td>
                        <td><?=$title ?></td>
                        <td><?=$ISBN?></td>
                   </tr>
                </tbody>
        </table>
    </div>