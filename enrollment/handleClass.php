<?php

    require_once('../connection.php');

    $data['ids'] = $_POST['ids'];

    $idObj = json_decode(json_encode($data));

    foreach ($idObj-> ids as $value) {
        $query = "INSERT INTO subject (subject_name, units)
        VALUES ('$value', 1)";
        mysqli_query($mycon, $query);
    }

?>



