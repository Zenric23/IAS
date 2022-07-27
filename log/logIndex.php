<?php
session_start();
require_once('../connection.php');

$query = "SELECT * FROM logs";
$result = mysqli_query($mycon, $query);


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
        <h4 class="mb-4">Logs</h4>
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">user_Id</th>
                    <th scope="col">transaction</th>
                    <th scope="col">date and time</th>
                    <th scope="col">ip address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_row($result)) {

                            $user_id = $row[0];
                            $transaction = $row[1];
                            $date = $row[2];
                            $ip_address = $row[3];

                            echo 
                            "
                                <tr>
                                    <td>
                                        $user_id
                                    </td>
                                    <td> 
                                        $transaction
                                    </td>
                                    <td> 
                                        $date
                                    </td>
                                    <td> 
                                        $ip_address
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>