<?php
require_once('../connection.php');
require('../enc_dec.php');


$status = $_POST['status'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$username = $_POST['username'];
$user_type = $_POST['user_type'];
$pass = $_POST['pass'];
$re_pass = $_POST['re_pass'];
$user_type = $_POST['user_type'];

    
if(isset($_POST['username'])) { 
    if($pass !== $re_pass) {
        header("location: registerUI.php?invalid=true");
    } else {
        // encrypt inputted password
        $encrypted_string = encryptString($pass);

        $query = "INSERT INTO user (username, LName, FName, pass, user_type, status) VALUES('$username', '$firstname', '$lastname', '$encrypted_string', '$user_type', '$status')";
        mysqli_query($mycon, $query);
        header("location: loginUI.php");
    }
}
?>