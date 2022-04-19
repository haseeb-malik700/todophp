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
//$update_id=$_GET["update"];
//$update="UPDATE `todo_list` SET `name`='[value-1]',`description`='[value-2]',`id`='[value-3]' WHERE `id` = " .$update_id;
// $result = $conn->query( );




//update
if (isset($_POST['name'])){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $update_id=$_GET["update"];
    $update="UPDATE `todo_list` SET `name`='$name',`description`='$description' WHERE `id` = " .$update_id; //updating data in DB
//    echo $update;
    
    $conn->query($update); //creating connection with db
    }



//update ends
//Data Fetch in Form 
$update_id=$_GET["update"];
$fetch = "SELECT * FROM `todo_list` WHERE `id` = $update_id  limit 1";
$result = $conn->query($fetch);
//print_r ($result);
//Data Fetch Ends



// $conn->close();
?>

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
    <title>update</title>
</head>

<body>
    <form class='m-5 border-right ' method='POST'>
    <?php  while($row = $result->fetch_assoc()) { ?>
        <div class="form-group">
            <label for="exampleFormControlInput1"> Name</label>
            <input type="text" value = <?php echo $row['name']; ?> class="form-control" id="exampleFormControlInput1" placeholder="name of product"
                name='name'>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='description'>  <?php echo $row['description']; ?></textarea>
        </div>
        <?php   } ?>
        <button class='btn btn-info pt-2 mt-2'>Update</button>
    </form>






</body>

</html>