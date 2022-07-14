<?php
session_start();
require_once('../connection.php');

$query = "SELECT * FROM student";
$result = mysqli_query($mycon, $query);


if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM student WHERE idstudent = $id;";
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
            <h4>Student</h4>
            <a href='addUI.php' class="btn btn-success px-4">
                Add
            </a>
        </div>
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">student id</th>
                    <th scope="col">firts_name</th>
                    <th scope="col">last_name</th>
                    <th scope="col">gender</th>
                    <th scope="col">DOB</th>
                    <th scope="col">ParentName</th>
                    <th scope="col">address</th>
                    <th scope="col">ContactNumber</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_row($result)) {
                            
                            $idstudent = $row[0];
                            $last_name = $row[1];
                            $first_name = $row[2];
                            $gender = $row[3];
                            $DOB = $row[4];
                            $parentName = $row[5];
                            $address = $row[6];
                            $contact = $row[7];

                            echo 
                            "
                                <tr>
                                    <td>
                                        $idstudent
                                    </td>
                                    <td> 
                                        $last_name 
                                    </td>
                                    <td> 
                                        $first_name
                                    </td>
                                    <td> 
                                        $gender
                                    </td>
                                    <td> 
                                        $DOB
                                    </td>
                                    <td> 
                                        $parentName
                                    </td>
                                    <td> 
                                        $address
                                    </td>
                                    <td> 
                                        $contact
                                    </td>
                                    <td>
                                        <a href='updateUI.php?id=$idstudent&last_name=$last_name&first_name=$first_name&gender=$gender&DOB=$DOB&parentName=$parentName&address=$address&contact=$contact' class='btn btn-primary'>Update</a>
                                        <a href='studentIndex.php?delete=$idstudent' class='btn btn-danger'>Delete</a>
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