<?php
$alert = "";

if(isset($_GET['invalid'])) {
    if($_GET['invalid'] === 'user') {
        $alert = "Invalid user.";
    } else {
        $alert = "Invalid password.";
    }
} else if (isset($_GET['logout'])) {
    session_start();
    session_destroy();
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
        <form class="col-4 mx-auto border px-5 py-4" action="checkLogin.php" method="post">
        <h3 class="mb-4 text-center">Login</h3>
        <?php
            if(isset($_GET['invalid'])) {
                echo "<div class='alert alert-danger' role='alert'>
                        $alert
                    </div>";
            }
        ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">User Type</label>
                <select class="form-select" name="user_type" aria-label="Default select example">
                    <option selected value="client">client</option>
                    <option value="admin">admin</option>
                </select>
            </div>
            <button type="submit" class="mb-3 d-block btn btn-primary w-100">Sign in</button>
           
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>