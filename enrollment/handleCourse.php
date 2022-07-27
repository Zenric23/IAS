<?php
    require("../connection.php");

    $school_year = $_POST['school_year'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $status = $_POST['status'];
    $student_id = $_POST['student_id'];

    if(isset($school_year)) {
        $query = "INSERT INTO stud_course (idstudent, idsy, idcourse, year_level, status)
        VALUES ($student_id, $school_year, $course, '$year_level', '$status');";

        mysqli_query($mycon, $query);
        // header("location: /IAS/admin/dashboard.php");
    }
?>