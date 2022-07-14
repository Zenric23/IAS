
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
    <div class="container">
        <form method="post" class="col-5 mx-auto mt-5 p-4 border" action="add.php">
            <h3 class="mb-4">Add User</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1"  class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1"  class="form-label">Firstname</label>
                <input name="lastname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1"  class="form-label">Lastname</label>
                <input name="firstname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label name="user_type" for="exampleFormControlInput1" class="form-label">User Type</label>
                <select class="form-select" name="user_type">
                    <option value="client">client</option>
                    <option value="admin">admin</option>    
                </select>
            </div>
            <input name="status" type="hidden" value="1">
            <input name="pass" type="hidden" value="1234">
            <div class="d-flex justify-content-end">
                <a href="/IAS/admin/dashboard.php"  class="btn btn-secondary me-2" >Close</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>