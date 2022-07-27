<?php
require_once('../connection.php');

session_start();

$user_id = $_SESSION['userNum'];

$date = date('d-m-y h:i:s');
$localIP = getHostByName(getHostName());

$midterm = $_POST['midterm'];
$finals = $_POST['finals'];
$remarks = $_POST['remarks'];
$idclass = $_POST['idclass'];
$student_id = $_POST['student_id'];

$avg_grade = ($midterm + $finals) / 2; 

$student_remarks = '';

if($avg_grade <= 74) {
    $student_remarks = 'failed';
} elseif ($avg_grade >= 75) {
    $student_remarks = 'passed';
}

if(isset($midterm)) {
  
        $query = "UPDATE student_enroll_class 
                 SET midterm_Grade = $midterm, finals_Grade = $finals, FinalGrade = $avg_grade, 
                    remarks = '$student_remarks'
                 WHERE idstudent = $student_id and idclass_offering = $idclass";

        if(mysqli_query($mycon, $query)) {
            
            $query = "INSERT INTO logs (userid, transaction, data_and_time, ip_address)
            VALUES ($user_id, 'Update Student Grade', '$date', '$localIP')";
            mysqli_query($mycon, $query);

            header("location: student_grades.php?student_id=$student_id");
        } else {
            echo "<script>alert('hayop ka wala na update!')</script>";
        }
}
?>