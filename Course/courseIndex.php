<?php
session_start();
require_once('../connection.php');

$query = "SELECT * FROM course";
$result = mysqli_query($mycon, $query);


if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM course WHERE idcourse = $id;";
    mysqli_query($mycon, $query);
    $query = "DELETE FROM stud_course WHERE idcourse = $id;";
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
            <h4>Course</h4>
            <a href='addUI.php' class="btn btn-success px-4">
                Add
            </a>
        </div>
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">course id</th>
                    <th scope="col">course_name</th>
                    <th scope="col">course_code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_row($result)) {
                            
                            $idcourse = $row[0];
                            $course_name = $row[1];
                            $course_code = $row[2];

                            echo 
                            "
                                <tr>
                                    <td>
                                        $idcourse
                                    </td>
                                    <td> 
                                        $course_name
                                    </td>
                                    <td> 
                                        $course_code
                                    </td>
                                    <td>
                                        <a href='updateUI.php?id=$idcourse&course_name=$course_name&course_code=$course_code' class='btn btn-primary'>Update</a>
                                        <a href='courseIndex.php?delete=$idcourse' class='btn btn-danger'>Delete</a>
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