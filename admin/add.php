<?php
require_once('../connection.php');
require_once('../enc_dec.php');

$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$status = $_POST['status'];
$userType = $_POST['user_type'];
$pass = $_POST['pass'];

if(isset($_POST['username'])) {
        $encrypted_string = encryptString($pass);

        $query = "INSERT INTO user (username, pass, user_type, FName, LName, status)
                VALUES ('$username', '$encrypted_string', '$userType', '$firstname', '$lastname', '$status');";
        mysqli_query($mycon, $query);
        header("location: /IAS/admin/dashboard.php");
}
?>