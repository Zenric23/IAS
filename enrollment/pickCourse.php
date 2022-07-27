<?php
require_once('../connection.php');

//SUBJECT
$query = "SELECT * FROM course";
$allCourse = mysqli_query($mycon, $query);

// school year
$query = "SELECT * FROM schoolyear_sem";
$allSchoolYear = mysqli_query($mycon, $query);
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
    <div class="container">
        <form method="post" class="col-5 mx-auto mt-5 p-4 border" action="update.php">
            <h3 class="mb-4">Select Course</h3>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">School Year</label>
                <select class="form-select" name="school_year" aria-label="Default select example">
                <?php
                    while($row = mysqli_fetch_row($allSchoolYear)) {
                    
                    $id_sy = $row[0];
                    $year = $row[1];
                    $sem = $row[2];
                    echo 
                    "
                        <option value='$id_sy'>$year</option>
                    ";
                    
                }
                ?>
                 </select>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Course</label>
                <select class="form-select" name="course" aria-label="Default select example">
                <?php
                    while($row = mysqli_fetch_row($allCourse)) {
                    
                    $id_course = $row[0];
                    $course_name = $row[1];
                    $course_code = $row[2];
                    echo 
                    "
                        <option value='$id_course'>$course_name</option>
                    ";
                    
                }
                    ?>
                 </select>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Year level</label>
                <select class="form-select" name="year_level" aria-label="Default select example">
                    <option selected>choose year level</option>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <input type="hidden" name="status" value="1">
            <div class="d-flex justify-content-end">
                <a href="/IAS/admin/dashboard.php"  class="btn btn-secondary me-2" >Close</a>
                <button type="submit" id="usernum" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>