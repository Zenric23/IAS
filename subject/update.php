<?php
require_once('../connection.php');

$id = $_POST['id'];
$subjectName = $_POST['subjectName'];
$units = $_POST['units'];

if(isset($subjectName)) {
  
        $query = "UPDATE subject 
                 SET subject_name = '$subjectName', units = $units 
                 WHERE idsubject = $id";
        mysqli_query($mycon, $query);
        header("location: /IAS/subject/subjectIndex.php");
}
?>