<?php
require_once('../connection.php');

$id = $_POST['id'];
$course_code = $_POST['course_code'];
$course_name = $_POST['course_name'];

if(isset($course_name)) {
  
        $query = "UPDATE course 
                 SET course_name = '$course_name', course_code = '$course_code'
                 WHERE idcourse = $id";
        mysqli_query($mycon, $query);
        header("location: /IAS/Course/courseIndex.php");
}
?>