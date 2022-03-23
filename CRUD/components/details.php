<?php
require_once "../actions/db_connect.php";

if(isset($_GET["id"]) && !empty($_GET["id"])) {
$sql ="SELECT * FROM books WHERE ISBN = $_GET[id]";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "bootstrap.php"?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Details</title>
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
        <h1 class="p-3 text-light text-center">Book Details</h1>

        <table class='table table-striped'>
               <thead class='table-warning'>
                   <tr>
                       <th>Title</th>
                       <th>ISBN</th>
                       <th>Description</th>
                       <th>Type</th>
                       <th>Author - First Name</th>
                       <th>Author - Last Name</th>
                       <th>Availability</th>
                   </tr>
               </thead>
               <tbody>
                    <tr>
                        <td><?=$row["title"] ?></td>
                        <td><?=$row["ISBN"]?></td>
                        <td><?=$row["description"]?></td>
                        <td><?=$row["type"]?></td>
                        <td><?=$row["author_fname"]?></td>
                        <td><?=$row["author_lname"]?></td>
                        <td><?=$row["status"]?></td>
                   </tr>
                </tbody>
        </table>
    </div>

   
    


     <!-- Scripts -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
<?php } else {
    header("Location: ../admin.php"); 
}
?>