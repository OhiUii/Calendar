<?php
    $editdb = new mysqli('127.0.0.1:3306','root','','calendar');

    $id = $_POST["ID"];
    $start_day = $_POST["start_day"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $title = $_POST["title"];
    $detail = $_POST["detail"];

    // $info = array (
    //     "id" => $id,
    //     "start_day" => $start_day,
    //     "start_time" => $start_time,
    //     "end_time" => $end_time,
    //     "title" => $title,
    //     "detail" => $detail
    // );

    $query = "UPDATE `appointment` SET start_day = '$start_day', start_time = '$start_time', end_time = '$end_time', title = '$title', detail = '$detail' WHERE AppID = $id";

    $editdb->query($query);

    $editdb->close()
?>