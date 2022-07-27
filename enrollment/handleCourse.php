<?php
    require("../connection.php");
    session_start();

    $user_id = $_SESSION['userNum'];

    $date = date('d-m-y h:i:s');
    $localIP = getHostByName(getHostName());

    $school_year = $_POST['school_year'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $status = $_POST['status'];
    $student_id = $_POST['student_id'];

    if(isset($school_year)) {
        $query = "INSERT INTO stud_course (idstudent, idsy, idcourse, year_level, status)
        VALUES ($student_id, $school_year, $course, '$year_level', '$status');";
        mysqli_query($mycon, $query);

        $query = "UPDATE student SET status = '1' where idstudent = $student_id";
        mysqli_query($mycon, $query);

        $query = "INSERT INTO logs (userid, transaction, data_and_time, ip_address)
        VALUES ($user_id, 'Enroll student', '$date', '$localIP')";
        mysqli_query($mycon, $query);

        header("location: enrollmentIndex.php");
    }
?>