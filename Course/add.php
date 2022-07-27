<?php
require_once('../connection.php');

session_start();

$user_id = $_SESSION['userNum'];

$date = date('d-m-y h:i:s');
$localIP = getHostByName(getHostName());

$course_name = $_POST['course_name'];
$course_code = $_POST['course_code'];

if(isset($course_name)) {

        $query = "INSERT INTO course (course_name, course_code)
                VALUES ('$course_name', '$course_code')";
        mysqli_query($mycon, $query);

        $query = "INSERT INTO logs (userid, transaction, data_and_time, ip_address)
        VALUES ($user_id, 'Added Course', '$date', '$localIP')";
        mysqli_query($mycon, $query);

        header("location: /IAS/Course/courseIndex.php");
}

?>