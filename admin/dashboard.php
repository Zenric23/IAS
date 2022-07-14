<?php
require_once('../connection.php');
session_start();

$userName = $_SESSION['username'];
$userNum = $_SESSION['userNum'];

$query = "SELECT * FROM user WHERE userid != '$userNum'";
$result = mysqli_query($mycon, $query);

if(!isset($_SESSION['username'])) {
   header("location: /IAS/auth/loginUI.php");
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM user WHERE userid = $id;";
    mysqli_query($mycon, $query);   
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
    <?php require('../navigation.php'); ?>
    
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-4">
            <h4>Users</h4>
            <a href='addUI.php' class="btn btn-success px-4">
                Add
            </a>
        </div>
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_row($result)) {

                            $userNum = $row[0];
                            $username = $row[1];
                            $firstname = $row[5];
                            $lastname = $row[6];
                            $userType = $row[3];

                            echo 
                            "
                                <tr>
                                    <td>
                                        $userNum
                                    </td>
                                    <td> 
                                        $username
                                    </td>
                                    <td> 
                                        $firstname
                                    </td>
                                    <td> 
                                        $lastname
                                    </td>
                                    <td>$userType</td>
                                    <td>
                                        <a href='updateUI.php?id=$userNum&username=$username&firstname=$firstname&lastname=$lastname' class='btn btn-primary'>Update</a>
                                        <a href='dashboard.php?delete=$userNum' class='btn btn-danger'>Delete</a>
                                    </td>
                                </tr>
                            ";
                            
                        }
                    }
                ?> 
            </tbody>
        </table>
        </div>
    </div>


<!-- Update Modal -->
<div class="modal fade" id="updateModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
      </div>
      <div class="modal-body">
      <form method="post" method="./action/update.php">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      <input type="hidden" name="id" value=>
      </form>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>