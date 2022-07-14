<?php
require_once('../connection.php');

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = $_POST['middlename'];

if(isset($firstname)) {
  
        $query = "UPDATE teacher 
                 SET FName = '$firstname', LName = '$lastname', MName = '$middlename'
                 WHERE idteacher = $id";
        mysqli_query($mycon, $query);
        header("location: /IAS/teacher/teacherIndex.php");
}
?>