<?php
require_once('../connection.php');
session_start();

$user_id = $_SESSION['userNum'];

$date = date('d-m-y h:i:s');
$localIP = getHostByName(getHostName());


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];

if(isset($firstname)) {

        $query = "INSERT INTO teacher (FName, LName, MName)
                VALUES ('$firstname', '$lastname', '$middlename')";
        mysqli_query($mycon, $query);

        $query = "INSERT INTO logs (userid, transaction, data_and_time, ip_address)
        VALUES ($user_id, 'Add Teacger', '$date', '$localIP')";
        mysqli_query($mycon, $query);


        header("location: /IAS/teacher/teacherIndex.php");
}

?>