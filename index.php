<!DOCTYPE html>
<html lang="en">
<!-- php database connectio -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

// /$sql = "INSERT INTO `todo_list`(`name`, `description`, `id`) VALUES ('ali','dummy',NULL)"; //inserting data into DB

//$conn->query($sql); //creating connection with db

// delete
if (isset($_GET['delete'])){


$delete_id=$_GET["delete"];
$delete = 'DELETE FROM `todo_list` WHERE `id` ='.$delete_id;
$conn->query($delete);
}
// delete ends

if (isset($_POST['name'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sql = "INSERT INTO `todo_list`(`name`, `description`, `id`) VALUES ('$name','$description',NULL)"; //inserting data into DB
    
    $conn->query($sql); //creating connection with db
    }

$result = $conn->query( "SELECT * FROM `todo_list` WHERE 1");



// $conn->close();
?>
<!-- php  -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <title>MY TODO List</title>




</head>

<body>
    <div class='container'>
        <!-- row 1 -->
        <div class='row'>
            <h2 class='text-center'>TODO</h2>
        </div>
        <!-- row1 -->

        <!-- row 2 -->
        <div class='row'>
            <div class='col-6'>

                <h5 class='text-center border-bottom'>FORM</h5>

            </div>
            <div class='col-6 border-bottom border-dark'>
                <h5 class='text-center'>Description</h5>

            </div>
        </div>

        <!-- row 2 ends-->
        <!-- row 3 starts -->
        <div class='row'>
            <div class='col-6 border-right'>
                <form class='m-5 border-right ' method='post'>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="name of product" name='name'>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name='description'></textarea>
                    </div>
                    <button class='btn btn-info pt-2 mt-2'>Submit</button>
                </form>
            </div>
            <div class='col-6'>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope='col'>delete</th>
                            <th scope='col'>update</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        echo "<tr>";
                                        echo "<th>".$row["id"]."</th>";
                                        echo "<td>".$row["name"]."</td>";
                                        echo "<td>".$row["description"]. "</td>";
                                        echo '<td><a class="btn btn-danger" href="?delete='.$row['id'].'">delete</a> </td>';
                                        echo '<td><a class="btn btn-grey" href="/todo/update.php?update='.$row['id'].'">Update</a> </td>';
                                        echo "</tr>";
                                   
                                    }
                                } else {
                                    echo "0 results";
                                }
                             ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>