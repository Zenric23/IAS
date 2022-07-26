<?php
require_once('../connection.php');


$day = $_POST['day'];
$time = $_POST['time'];
$room = $_POST['room'];
$idsubject = $_POST['subject'];
$idschool_year = $_POST['school_year'];
$idteacher = $_POST['teacher'];

    
if(isset($_POST['day'])) { 
  
        $query = "INSERT INTO class_offering 
        (idsubject, idsy, idteacher, day, time, room) 
        VALUES($idsubject, $idschool_year, $idteacher, '$day', '$time', '$room')";

        if(mysqli_query($mycon, $query)) {

            header("location: classForm.php?status=added");
        } else {

            header("location: classForm.php?status=failed");
        }
}
?>