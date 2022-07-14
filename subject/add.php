<?php
require_once('../connection.php');

$subject_name = $_POST['subject_name'];
$units = $_POST['units'];


if(isset($subject_name)) {

        $query = "INSERT INTO subject (subject_name, units)
                VALUES ('$subject_name', $units)";
        mysqli_query($mycon, $query);
        header("location: /IAS/subject/subjectIndex.php");
}
?>