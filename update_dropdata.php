<?php
$conn = new mysqli('127.0.0.1:3306','root','','calendar');
$info = array(
	"ID" =>  $_POST["id"],
	"Title" => $_POST["title"],
	"Date" => $_POST["date"]
);

$user_id = $_POST["id"];
$title = $_POST["title"];
$ndate = $_POST["date"];
//$sql     = "UPDATE appointment SET star_tday = '$ndate' WHERE UID ='$user_id' AND title = '$title'";
//UPDATE appointment SET start_day = '2020-11-07' WHERE UID =1 AND title = 'Ohh yesyesy'
$sql     = "UPDATE `appointment` SET start_day = '$ndate' WHERE UID = $user_id AND title = '$title'";
$query   = $conn->query($sql);

echo $query;
echo json_encode($info);
?>
