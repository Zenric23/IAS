<?php
require_once('../connection.php');

$course_name = $_POST['course_name'];
$course_code = $_POST['course_code'];

if(isset($course_name)) {

        $query = "INSERT INTO course (course_name, course_code)
                VALUES ('$course_name', '$course_code')";
        mysqli_query($mycon, $query);

        header("location: /IAS/Course/courseIndex.php");
}

?>