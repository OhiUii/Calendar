<?php
    $mysqli = new mysqli('127.0.0.1:3306','root','','calendar');
    $start_day  = $_POST['start_day']; 

    $query = "SELECT * FROM `appointment` WHERE start_day = '$start_day'";

    $standby = $mysqli->prepare($query);
    $standby->execute();
    $result = $standby->get_result();

    while($row = $result->fetch_assoc())
    {
        $data[] = array(
          'start_day' => $row["start_day"],
          'end_day' => $row["end_day"],
          'start_time' => $row["start_time"],
          'end_time' => $row["end_time"],
          'title' => $row["title"],
          'detail' => $row["detail"],
          'UID' => $row["UID"],
          "AppID" => $row["AppID"]
        );
    }

    $mysqli->close();

    

    if(isset($data))
    {
        echo json_encode($data);
    }
    else echo 0;
?>