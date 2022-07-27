<?php

    require_once('../connection.php');

    $data['ids'] = $_POST['ids'];
    $data['student_id'] = $_POST['student_id'];

    $dataObj = json_decode(json_encode($data));

    $student_id = $dataObj->student_id;
    $class_offering_ids = $dataObj->ids;

    foreach ($class_offering_ids as $value) {
        $query = "INSERT INTO student_enroll_class (idstudent, idclass_offering, midterm_Grade, 
        finals_Grade, FinalGrade, remarks)
        VALUES ($student_id, $value, 0, 0, 0, '')";
        mysqli_query($mycon, $query);
    }

?>



