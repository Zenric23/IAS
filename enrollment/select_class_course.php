<?php
session_start();
require_once('../connection.php');

$query = "SELECT class_offering.idclass_offering, subject.subject_name, CONCAT(teacher.FName, ' ', teacher.LName) as Teacher, class_offering.day, class_offering.time, class_offering.room, subject.units
FROM class_offering
LEFT JOIN subject ON subject.idsubject = class_offering.idsubject
LEFT JOIN teacher ON teacher.idteacher = class_offering.idteacher";

$result = mysqli_query($mycon, $query);

//STUDENT
$student_id = $_GET['student_id'];
$query = "SELECT * FROM student WHERE idstudent = $student_id limit 1";
$student = mysqli_query($mycon, $query);


//SUBJECT
$query = "SELECT * FROM course";
$allCourse = mysqli_query($mycon, $query);

// school year
$query = "SELECT * FROM schoolyear_sem";
$allSchoolYear = mysqli_query($mycon, $query);

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
    <div class="container my-5 p-5 rounded" style="background: rgba(0,0,0,0.1)">
        <?php
         while($row = mysqli_fetch_row($student)) {
            $last_name = $row[2];
            $first_name = $row[1];

            echo 
            "
               <h1 class='text-center display-4 mb-4'>$first_name  $last_name</h1>
            ";
            
        }
        ?>
    </p>
    <div class="container"> 
        <form method="post"  action="handleCourse.php">
            <h4 class="mb-4">Select Course</h4>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">School Year</label>
                <select class="form-select" name="school_year" aria-label="Default select example">
                <?php
                    while($row = mysqli_fetch_row($allSchoolYear)) {
                    
                    $id_sy = $row[0];
                    $year = $row[1];
                    $sem = $row[2];
                    echo 
                    "
                        <option value='$id_sy'>$year ($sem)</option>
                    ";
                    
                }
                ?>
                 </select>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Course</label>
                <select class="form-select" name="course" aria-label="Default select example">
                <?php
                    while($row = mysqli_fetch_row($allCourse)) {
                    
                    $id_course = $row[0];
                    $course_name = $row[1];
                    $course_code = $row[2];
                    echo 
                    "
                        <option value='$id_course'>$course_name</option>
                    ";
                    
                }
                    ?>
                 </select>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Year level</label>
                <select class="form-select" name="year_level" aria-label="Default select example">
                    <option selected>choose year level</option>
                    <option selected value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <input type="hidden" name="status" value="1">
            <input type="hidden" name="student_id" value=<?php echo $_GET['student_id']; ?>>    
            <button type="submit" id="submit_course" class="btn btn-primary d-none">Submit</button>
        </form>
    </div>

    <div class="container mt-5">
        <h4 class="mb-4">Select Class</h4>
        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">subject_name</th>
                    <th scope="col">units</th>
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
                            $units = $row[6];

                            echo 
                            "
                                <tr>
                                    <td>
                                        <input type='checkbox' name='checkbox' data-units='$units'  value='$class_offering_id' class='me-4' style='cursor: pointer;'>
                                        $subject_name
                                    </td>
                                    <td> 
                                        $units 
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
            <button id="submit" class="btn btn-primary mt-4">Submit</button>
        </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <script>
        
            $(document).ready(function() {
            const submitBtn = document.querySelector("#submit")
            const checkboxes = document.querySelectorAll("input[type='checkbox']")
            const courseSubmit = document.querySelector("#submit_course")

            var totalUnits = 0

                
            checkboxes.forEach(item=> {
                item.addEventListener('change', (e)=> {
                    const checkbox = e.target

                    if(checkbox.checked) {

                        totalUnits += parseInt(checkbox.getAttribute('data-units'))
                    } else {

                        totalUnits -= parseInt(checkbox.getAttribute('data-units'))  
                    }

                    if(totalUnits > 31) {
                        submitBtn.setAttribute('disabled', true)
                    } else {
                        submitBtn.removeAttribute('disabled')
                    }
                })
            })

                


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
                            student_id: <?php echo $student_id; ?>
                        },
                        cache: false,
                        success: function(data) {
                            alert("Classes Enrolled");
                            window.location.href = "enrollmentIndex.php"
                        }
                    });    
                    
                    courseSubmit.click()
                }

                $("#submit").click(function() {  
                    enrollClass()
                });
            });
    </script>
</html>