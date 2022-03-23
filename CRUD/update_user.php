<?php
require_once "components/db_connect.php";
require_once 'components/file_upload.php';


if($_GET["id"]) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $id = $data["id"];
        $fname = $data["fname"];
        $lname = $data["lname"];
        $email = $data["email"];
        $picture = $data["picture"];
    }
}

//update
$class = 'd-none';
if (isset($_POST["submit"])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $id = $_POST['id'];

  //variable for upload pictures errors is initialized
  $uploadError = '';
  $pictureArray = file_upload($_FILES['picture']); //file_upload() called
  $picture = $pictureArray->fileName;
  if ($pictureArray->error === 0) {
      ($_POST["picture"] == "avatar.png") ?: unlink("pictures/{$_POST["picture"]}");
      $sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', picture = '$pictureArray->fileName' WHERE id = {$id}";
  } else {
      $sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email' WHERE id = {$id}";
  }
  if (mysqli_query($connect, $sql) === true) {
      $class = "alert alert-success";
      $message = "The record was successfully updated";
      $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
      header("refresh:3;url=home.php?id={$id}");
  } else {
      $class = "alert alert-danger";
      $message = "Error while updating record : <br>" . $connect->error;
      $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
      header("refresh:3;url=home.php?id={$id}");
  }
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "components/bootstrap.php"?>
    <link rel="stylesheet" href="../css/style.css">
    <title>Update Media</title>
</head>
<body>
<!-- Navbar -->
    <nav class="navbar navbar-admin p-5 navbar-expand-lg navbar-dark bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="home.php">
            <img class="userImage img-thumbnail rounded-circle" src="../img/<?php echo $data['picture']; ?>" alt="<?php echo $data['fname']; ?>" width="80" height="80" class="d-inline-block align-text-top">
            <div class="text-white ms-3">Hi <?php echo $data['fname']; ?></div></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-5">
                <a class="nav-link" href="rooms_available.php"><button class="btn btn-success p-3">Book a Room</button></a>
                <a class="nav-link" href="logout.php?logout"><button class="btn btn-outline-danger p-3">Log out</button></a>
            </div>
            </div>
        </div>
    </nav>

    <div class="container">

    <div class="<?php echo $class; ?>" role="alert">
          <p><?php echo ($message) ?? ''; ?></p>
          <p><?php echo ($uploadError) ?? ''; ?></p>
      </div>

        <h1 class="p-3 text-light text-center">Update User</h1>
        <fieldset class="mb-5">
            <form method="post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>First Name</th>
                        <td><input class='form-control' type="text" name="fname"  placeholder="First Name" value="<?=$fname?>"/></td>
                    </tr>    
                    <tr>
                        <th>Last Name</th>
                        <td><input class='form-control' type="text" name= "lname" placeholder="Last Name"value="<?=$lname?>"/></td>
                    </tr>
                    <tr>
                        <th>E-Mail</th>
                        <td><input class='form-control' type="email" name="email"  placeholder="Your E-Mail" value="<?=$email?>"/></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture"  placeholder="media Type" value="<?=$type?>"/></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="id" value="<?=$id ?>" />
                        <input type="hidden" name="picture" value="<?=$picture ?>" /> 
                    </tr>    
                    <tr> 
                    <td></td>
                        <td class="d-flex justify-content-center"><button class='btn btn-warning p-3 w-50' name="submit" type="submit">Change User Data</button></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>

   
    


     <!-- Scripts -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>