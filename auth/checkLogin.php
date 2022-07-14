<?php
require_once('../connection.php');
require('../enc_dec.php');

$username = $_POST['username'];
$pass = $_POST['password'];
$user_type = $_POST['user_type'];

if(isset($username)) {
    $sql = "SELECT * FROM user
            WHERE username = '$username' AND user_type = '$user_type' LIMIT 1";
    $result = mysqli_query($mycon, $sql);

    if(mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_row($result)) {
            $userNum = $row[0];
            $username = $row[1];
            $userPass = $row[2];
            $userType = $row[3];
        }

        // matched the decrypted password to inputted password
        if(decryptString($userPass) === $pass) {

            session_start();
    
            $_SESSION['userNum'] = $userNum;
            $_SESSION['username'] = $username;
            $_SESSION['userType'] = $userType;
    
            header("location: /IAS/admin/dashboard.php");
        } else {

            header("location: /IAS/auth/loginUI.php?invalid=password");
        }

    } else {

        header("location: /IAS/auth/loginUI.php?invalid=user");
    }
}
?>