<?php
require_once('../connection.php');
session_start();

$user_id = $_SESSION['userNum'];

$date = date('d-m-y h:i:s');
$localIP = getHostByName(getHostName());



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

            $query = "INSERT INTO logs (userid, transaction, data_and_time, ip_address)
            VALUES ($user_id, 'Added Class', '$date', '$localIP')";
            mysqli_query($mycon, $query);

            header("location: ../enrollment/enrollmentIndex.php");
        } else {

            header("location: classForm.php?status=failed");
        }
}
?>