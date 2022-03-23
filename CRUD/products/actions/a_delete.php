<?php 
require_once "db_connect.php";

if ($_POST) {
    $id = $_POST["id"];
    $sql = "DELETE FROM books WHERE ISBN = $id";
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Entry has been deleted";
    } else {
        $class = "danger";
        $message = "Delete process failed" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header ("location: ../admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Record</title>
        <?php require_once "../components/bootstrap.php"?>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="mt-5 mb-3">
                <h1 class="p-3 text-light text-center">Delete Message</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <a href="../admin.php"><button class="btn btn-success" type='button'>Go Back</button></a>
            </div>
        </div>
    </body>
</html>