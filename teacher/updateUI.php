<?php
$id = '';
if(isset($_GET['id'])) {
    $id = $_GET['id'];
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
    <div class="container">
        <form method="post" class="col-5 mx-auto mt-5 p-4 border" action="update.php">
            <h3 class="mb-4">Update Teacher</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input value="<?php echo $_GET['firstname'] ?>" name="firstname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input value="<?php echo $_GET['lastname'] ?>" name="lastname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Middle Name</label>
                <input value="<?php echo $_GET['middlename'] ?>" name="middlename" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="d-flex justify-content-end">
                <a href="/IAS/subject/subjectIndex.php"  class="btn btn-secondary me-2" >Close</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>