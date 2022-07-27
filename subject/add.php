<?php
require_once('../connection.php');
session_start();

$user_id = $_SESSION['userNum'];

$date = date('d-m-y h:i:s');
$localIP = getHostByName(getHostName());


$subject_name = $_POST['subject_name'];
$units = $_POST['units'];


if(isset($subject_name)) {

        $query = "INSERT INTO subject (subject_name, units)
                VALUES ('$subject_name', $units)";
        mysqli_query($mycon, $query);

        $query = "INSERT INTO logs (userid, transaction, data_and_time, ip_address)
        VALUES ($user_id, 'Add Subject', '$date', '$localIP')";
        mysqli_query($mycon, $query);

        header("location: /IAS/subject/subjectIndex.php");
}
?>