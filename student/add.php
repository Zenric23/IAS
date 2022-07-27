<?php
require_once('../connection.php');
session_start();

$user_id = $_SESSION['userNum'];

$date = date('d-m-y h:i:s');
$localIP = getHostByName(getHostName());

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$gender = $_POST['gender'];
$DOB = $_POST['DOB'];
$parentname = $_POST['parentname'];
$address = $_POST['address'];
$contact = $_POST['contact'];

if(isset($parentname)) {

        $query = "INSERT INTO student (LName, FName, gender, DOB, ParentName, address, ContactNumber)
                VALUES ('$lastname', '$firstname', '$gender', '$DOB', '$parentname', '$address', '$contact')";
         mysqli_query($mycon, $query);

         $query = "INSERT INTO logs (userid, transaction, data_and_time, ip_address)
         VALUES ($user_id, 'Added Student', '$date', '$localIP')";
         mysqli_query($mycon, $query);

        header("location: /IAS/student/studentIndex.php");
}

?>