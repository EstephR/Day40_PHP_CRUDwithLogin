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

    $sql = "UPDATE books SET ISBN = $ISBN, title = '$title', image = '$image', description = '$description', type ='$type', author_fname = '$author_fname', author_lname = '$author_lname', publisher_name = '$publisher', publisher_address = '$publisher_address', publish_date = '$publish_date', status = '$availability' WHERE ISBN = $ISBN";

    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Data has been successfully updated!";
    } else {
        $class="danger";
        $message = "Data Update failed, please try again";
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
        <title>Update Record</title>
        <?php require_once "../components/bootstrap.php"?>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="mt-5 mb-3">
                <h1 class="p-3 text-light text-center">Update Message</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <a href="../admin.php"><button class="btn btn-success" type='button'>Go Back</button></a>
            </div>
        </div>
    </body>
</html>