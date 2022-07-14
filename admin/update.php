<?php
require_once('../connection.php');

$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$id = $_POST['id'];

if(isset($_POST['username'])) {
  
        $query = "UPDATE user 
                 SET username = '$username', FName = '$firstname', LName = '$lastname' 
                 WHERE userid = $id";
        mysqli_query($mycon, $query);
        header("location: /IAS/admin/dashboard.php");
}
?>