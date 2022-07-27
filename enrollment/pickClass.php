<?php
session_start();
require_once('../connection.php');

$query = "SELECT class_offering.idclass_offering, subject.subject_name, CONCAT(teacher.FName, ' ', teacher.LName) as Teacher, class_offering.day, class_offering.time, class_offering.room
FROM class_offering
LEFT JOIN subject ON subject.idsubject = class_offering.idsubject
LEFT JOIN teacher ON teacher.idteacher = class_offering.idteacher";

$result = mysqli_query($mycon, $query);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h4 class="mb-4">Class Offer</h4>
        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">subject_name</th>
                    <th scope="col">Teacher</th>
                    <th scope="col">day</th>
                    <th scope="col">Time</th>
                    <th scope="col">room</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($result) > 0) {

                        while($row = mysqli_fetch_row($result)) {
                            
                            $class_offering_id = $row[0];
                            $subject_name = $row[1];
                            $teacher_name = $row[2];
                            $day = $row[3];
                            $time = $row[4];
                            $room = $row[5];

                            echo 
                            "
                                <tr>
                                    <td>
                                        <input type='checkbox' name='checkbox' value='$class_offering_id' class='me-4' style='cursor: pointer;'>
                                        $subject_name
                                    </td>
                                    <td> 
                                        $teacher_name 
                                    </td>
                                    <td> 
                                        $day
                                    </td>
                                    <td> 
                                        $time
                                    </td>
                                    <td> 
                                        $room
                                    </td>
                                </tr>
                            ";
                            
                        }
                    }
                ?>   
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <button id="submit" class="btn btn-primary mt-4">Enroll</button>
        </div>
        </div>
    </div>


<!-- <td> 
    <a href='enrollUI.php?id=$class_offering_id' class='btn btn-primary'>Enroll</button>
</td> -->

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <script>
        
            $(document).ready(function() {
            const submitBtn = document.querySelector("#submit")
            const checkboxes = document.querySelectorAll("input[type='checkbox']")



                function enrollClass() {
                    
                    const ids = []

                    checkboxes.forEach(item=> {
                        if(item.checked) {
                            ids.push(item.value)
                        } 
                    })

                    if(ids.length === 0) {
                        alert('please select class!')
                        return
                    }

                    $.ajax({
                        type: "POST",
                        url: "handleClass.php",
                        data: {
                            ids: ids,
                        },
                        cache: false,
                        success: function(data) {
                            alert("Classes Enrolled");
                            window.location.href = "enrollmentIndex.php"
                        }
                    });     
                }

                $("#submit").click(function() {  
                    enrollClass()
                });
            });
    </script>
</html>