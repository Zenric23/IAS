<?php
require_once('../connection.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];

if(isset($firstname)) {

        $query = "INSERT INTO teacher (FName, LName, MName)
                VALUES ('$firstname', '$lastname', '$middlename')";
        mysqli_query($mycon, $query);

        header("location: /IAS/teacher/teacherIndex.php");
}

?>