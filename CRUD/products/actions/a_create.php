<?php 
require_once "db_connect.php";

if($_POST) {
$ISBN = $_POST["ISBN"];
$title = $_POST["title"];
$image = $_POST["cover"];
$description = $_POST["description"];
$type = $_POST["type"];
$author_fname = $_POST["author_fname"];
$author_lname = $_POST["author_lname"];
$publisher = $_POST["publisher"];
$publisher_address = $_POST["publisher_address"];
$publish_date = $_POST["publish_date"];
$availability = $_POST["availability"];

// $publish_date needs to be a string ''
$sql = "INSERT INTO books (ISBN, title, image, description, type, author_fname, author_lname, publisher_name, publisher_address, publish_date, status) VALUES ($ISBN,'$title','$image','$description','$type','$author_fname','$author_lname','$publisher','$publisher_address','$publish_date','$availability')";

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The Entry was created";
    } else {
        $class = "danger";
        $message = "An error occured, please try again:" . $connect->error;
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
        <title>Create Record</title>
        <?php require_once "../components/bootstrap.php"?>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="mt-5 mb-3">
                <h1 class="p-3 text-light text-center">Create Message</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <a href="../admin.php"><button class="btn btn-success" type='button'>Go Back</button></a>
            </div>
        </div>
    </body>
</html>