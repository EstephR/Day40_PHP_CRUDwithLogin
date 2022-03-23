<?php
require_once "../actions/db_connect.php";

if($_GET["id"]) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM books WHERE ISBN = $id";
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $ISBN = $data["ISBN"];
        $title = $data["title"];
        $image = $data["image"];
        $description = $data["description"];
        $type = $data["type"];
        $author_fname = $data["author_fname"];
        $author_lname = $data["author_lname"];
        $publisher = $data["publisher_name"];
        $publisher_address = $data["publisher_address"];
        $publish_date = $data["publish_date"];
        $availability = $data["status"];
    } else {
        header("location: ../admin.php");
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
    <title>Update Media</title>
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
        <h1 class="p-3 text-light text-center">Update Media in Database</h1>
        <fieldset class="mb-5">
            <form action="../actions/a_update.php" method="POST">
                <table class='table'>
                    <tr>
                        <th>ISBN</th>
                        <td><input class='form-control' type="number" name="ISBN"  placeholder="ISBN" value="<?=$ISBN?>"/></td>
                    </tr>    
                    <tr>
                        <th>Book Title</th>
                        <td><input class='form-control' type="text" name= "title" placeholder="Book Title"value="<?=$title?>"/></td>
                    </tr>
                    <th>Book Cover</th>
                        <td><input class='form-control' type="text" name="cover"  placeholder="Book Cover Link" value="<?=$image?>"/></td>
                    </tr>  
                    <tr>
                        <th>Description</th>
                        <td><input class='form-control' type="text" name="description"  placeholder="Description" value="<?=$description?>"/></td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td><input class='form-control' type="text" name="type"  placeholder="media Type" value="<?=$type?>"/></td>
                    </tr>    
                    <tr>
                        <th>Author - First Name</th>
                        <td><input class='form-control' type="text" name="author_fname"  placeholder="First Name of Author" value="<?=$author_fname?>"/></td>
                    </tr> 
                    <tr>
                        <th>Author - Last Name</th>
                        <td><input class='form-control' type="text" name="author_lname"  placeholder="Last Name of Author" value="<?=$author_lname?>"/></td>
                    </tr>
                    <tr>
                        <th>Publisher</th>
                        <td><input class='form-control' type="text" name="publisher"  placeholder="Publisher Name" value="<?=$publisher?>"/></td>
                    </tr>
                    <tr>
                        <th>Publisher Address</th>
                        <td><input class='form-control' type="text" name="publisher_address"  placeholder="Address of Publisher" value="<?=$publisher_address?>"/></td>
                    </tr> 
                    <tr>
                        <th>Publish Date</th>
                        <td><input class='form-control' type="date" name="publish_date"  placeholder="Publish Date" value="<?=$publish_date?>"/></td>
                    </tr>
                    <tr>
                        <th>Availability</th>
                        <td>
                            <select class='form-control' name="availability" value="<?=$availability?>">
                                <option value="available">available</option>
                                <option value="reserved">reserved</option>
                            </select>
                        </td>
                    </tr>                       
                    <tr>
                        <td></td>
                        <td class="d-flex justify-content-center"><button class='btn btn-warning p-3 w-50' type="submit">Update Book</button></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>

   
    


     <!-- Scripts -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>