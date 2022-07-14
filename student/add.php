<?php
require_once('../connection.php');

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
        $result =  mysqli_query($mycon, $query);

        if(!$result) {
            echo $result;
        }

        header("location: /IAS/student/studentIndex.php");
}

?>