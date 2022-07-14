<?php
require_once('../connection.php');

$id = $_POST['id'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$gender = $_POST['gender'];
$DOB = $_POST['DOB'];
$parentName = $_POST['parentName'];
$address = $_POST['address'];
$contact = $_POST['contact'];

if(isset($contact)) {
  
        $query = "UPDATE student 
                 SET LName = '$lastname', FName = '$firstname', gender = '$gender', DOB = '$DOB', ParentName = $parentName, address = $addredss, ContactNumber = $contact
                 WHERE idstudent = $id";
        mysqli_query($mycon, $query);
        header("location: /IAS/student/studentIndex.php");
}
?>