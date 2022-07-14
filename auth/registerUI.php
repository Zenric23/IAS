<?php

if(isset($_GET['invalid'])) {
    echo "<script>alert('Password doesn't matched!')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container-sm mt-5">
        <form class="col-4 mx-auto border px-5 py-4" action="register.php" method="post">
            <h3 class="mb-4 text-center">Register</h2>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input required type="text" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Firstname</label>
                <input required type="text" name="firstname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Lastname</label>
                <input required type="text" name="lastname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input required type="password" name="pass" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Re-type Password</label>
                <input required type="password" name="re_pass" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User Type</label>
                <select class="form-select" name="user_type">
                    <option value="client">client</option>
                    <option value="admin">admin</option>    
                </select>
            </div>
            <input required type="hidden" name="status" value="1">
            <button type="submit" class="mb-3 w-100 d-block w-full btn btn-primary">Sign up</button>
            <a class="d-block text-center" href="loginUI.php">login here</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></>
</body>
</html>