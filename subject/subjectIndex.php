<?php
session_start();
require_once('../connection.php');

$query = "SELECT * FROM subject";
$result = mysqli_query($mycon, $query);

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM subject WHERE idsubject = $id;";
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
    <?php require('../navigation.php'); ?>

    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-4">
            <h4>Subject</h4>
            <a href='addUI.php' class="btn btn-success px-4">
                Add
            </a>
        </div>
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">idsubject</th>
                    <th scope="col">subject_name</th>
                    <th scope="col">units</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_row($result)) {

                            $subjectNum = $row[0];
                            $subjectName = $row[1];
                            $units = $row[2];

                            echo 
                            "
                                <tr>
                                    <td>
                                        $subjectNum
                                    </td>
                                    <td> 
                                        $subjectName
                                    </td>
                                    <td> 
                                        $units
                                    </td>
                                    <td>
                                        <a href='updateUI.php?id=$subjectNum&subjectName=$subjectName&units=$units' class='btn btn-primary'>Update</a>
                                        <a href='subjectIndex.php?delete=$subjectNum' class='btn btn-danger'>Delete</a>
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