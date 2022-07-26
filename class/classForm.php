<?php
require_once('../connection.php');

//SUBJECT
$query = "SELECT * FROM subject";
$allSubjects = mysqli_query($mycon, $query);

//SCHOOL YEAR
$query = "SELECT * FROM schoolyear_sem";
$allSchoolYear = mysqli_query($mycon, $query);

//TEACHER
$query = "SELECT * FROM teacher";
$allTeacher = mysqli_query($mycon, $query);

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
        <form method="post" action="handleClass" class="col-4 mx-auto mt-5 p-5 border shadow my-5">
            <h4 class="mb-4">Add Class</h4>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Day</label>
                <input type="text" class="form-control" name="day" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Time</label>
                <input type="text" class="form-control" name="time" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Room</label>
                <input type="text" class="form-control" name="room" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Subject</label>
                <select class="form-select" name="subject" aria-label="Default select example">
                    <?php
                          while($row = mysqli_fetch_row($allSubjects)) {
                            
                            $idsubject = $row[0];
                            $subject_name = $row[1];
                            $units = $row[2];
                            echo 
                            "
                               <option value='$idsubject'>$subject_name</option>
                            ";
                            
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">School year</label>
                <select class="form-select" name="school_year" aria-label="Default select example">
                    <?php
                          while($row = mysqli_fetch_row($allSchoolYear)) {
                            
                            $id = $row[0];
                            $year = $row[1];
                            $sem = $row[2];
                            echo 
                            "
                               <option value='$id'>$year ($sem sem)</option>
                            ";
                            
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Teacher</label>
                <select class="form-select" name="teacher" aria-label="Default select example">
                    <?php
                          while($row = mysqli_fetch_row($allTeacher)) {
                            
                            $idTeacher = $row[0];
                            $fname = $row[1];
                            $lname = $row[2];
                            $mname = $row[3];
                            echo 
                            "
                               <option value='$idTeacher'>$fname $mname $lname</option>
                            ";
                            
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>