<?php
session_start();
require_once('../connection.php');

$query = "SELECT * FROM teacher";
$result = mysqli_query($mycon, $query);


if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM teacher WHERE idteacher = $id;";
    mysqli_query($mycon, $query); 
    $query = "DELETE FROM class_offering WHERE idteacher = $id;";
    mysqli_query($mycon, $query);  
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <?php require('../navigation.php '); ?>

    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-4">
            <h4>Teacher</h4>
            <a href='addUI.php' class="btn btn-success px-4">
                Add
            </a>
        </div>
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">teacher id</th>
                    <th scope="col">firstname</th>
                    <th scope="col">lastname</th>
                    <th scope="col">MName</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_row($result)) {
                            
                            $teacherid = $row[0];
                            $firstname = $row[1];
                            $lastname = $row[2];
                            $middlename = $row[3];

                            echo 
                            "
                                <tr>
                                    <td>
                                        $teacherid
                                    </td>
                                    <td> 
                                        $firstname
                                    </td>
                                    <td> 
                                        $lastname
                                    </td>
                                    <td> 
                                        $middlename
                                    </td>
                                    <td>
                                        <a href='updateUI.php?id=$teacherid&firstname=$firstname&lastname=$lastname&middlename=$middlename' class='btn btn-primary'>Update</a>
                                        <a href='teacherIndex.php?delete=$teacherid' class='btn btn-danger'>Delete</a>
                                    </td>
                                </tr>
                            ";
                            
                        }
                    }
                ?> 
            </tbody>
        </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>