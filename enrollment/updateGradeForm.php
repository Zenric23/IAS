<?php
$student_id =  $_GET['student_id'];
$idclass =  $_GET['idclass'];
$midterm =  $_GET['mid'];
$finals =  $_GET['finals'];
$final =  $_GET['finals'];
$remarks =  $_GET['remarks'];
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
        <form method="post" class="col-5 mx-auto mt-5 p-4 border" action="updateGrade.php">
            <h3 class="mb-4">Update Grade</h3>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Midtern Grade</label>
                <input name="midterm" value=<?php echo $midterm ?> type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">finals Grade</label>
                <input name="finals" value=<?php echo $finals ?> type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <input name="idclass" value=<?php echo $idclass ?> type="hidden">
            <input name="student_id" value=<?php echo $student_id ?> type="hidden">
            <div class="d-flex justify-content-end">
                <a href=<?php echo "student_grades.php?student_id=".$student_id ?>  class="btn btn-secondary me-2" >Close</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>