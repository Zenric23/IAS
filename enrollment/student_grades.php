<?php
session_start();
require_once('../connection.php');

$student_id = $_GET['student_id'];

$query = "SELECT * FROM student WHERE idstudent = $student_id";
$student = mysqli_query($mycon, $query);

$query = "SELECT * FROM student WHERE idstudent = $student_id";
$student = mysqli_query($mycon, $query);

$query = " SELECT subject.subject_name, class_offering.day, class_offering.time, class_offering.room, teacher.FName, schoolyear_sem.sem,
student_enroll_class.midterm_Grade, student_enroll_class.finals_Grade, student_enroll_class.FinalGrade, student_enroll_class.remarks,
class_offering.idclass_offering, subject.units
FROM class_offering
LEFT JOIN student_enroll_class ON class_offering.idclass_offering = student_enroll_class.idclass_offering
LEFT JOIN subject ON class_offering.idsubject = subject.idsubject
LEFT JOIN teacher ON class_offering.idteacher = teacher.idteacher
LEFT JOIN schoolyear_sem ON schoolyear_sem.idsy = class_offering.idsy
where student_enroll_class.idstudent = $student_id";

$studentGrades = mysqli_query($mycon, $query);


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

    <div class="container mt-5">
        <a href="enrollmentIndex.php">back</a>
       <?php
            while($row = mysqli_fetch_row($student)) {
            $idcourse = $row[0];
            $lname = $row[1];
            $fname = $row[2];

            echo "<h4 class='mb-4'>$fname $lname's Grade</h4>";
            }
       ?>
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">subject</th>
                    <th scope="col">day</th>
                    <th scope="col">time</th>
                    <th scope="col">room</th>
                    <th scope="col">units</th>
                    <th scope="col">teacher</th>
                    <th scope="col">SY</th>
                    <th scope="col">midterm_grade</th>
                    <th scope="col">finals_grade</th>
                    <th scope="col">finalGrade</th>
                    <th scope="col">remarks</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_row($studentGrades)) {
                        $subject = $row[0];
                        $day = $row[1];
                        $time = $row[2];
                        $room = $row[3];
                        $teacher = $row[4];
                        $SY = $row[5];
                        $midterm_grade = $row[6];
                        $finals_grade = $row[7];
                        $finalGrade = $row[8];
                        $remarks = $row[9];
                        $idclass_offering = $row[10];
                        $units = $row[11];

                        $studentRemarks = $remarks ? $remarks : 'none';

                    echo 
                    "
                    <tr>
                        <td>$subject</td>
                        <td>$day</td>
                        <td>$time</td>
                        <td>$room</td>
                        <td>$units</td>
                        <td>$teacher</td>
                        <td>$SY</td>
                        <td>$midterm_grade</td>
                        <td>$finals_grade</td>
                        <td>$finalGrade</td>
                        <td>$studentRemarks</td>
                        <td><a href='updateGradeForm.php?mid=$midterm_grade&finals=$finals_grade&final=$finalGrade&remarks=$studentRemarks&student_id=$student_id&idclass=$idclass_offering' class='btn btn-primary'>Update</a></td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>