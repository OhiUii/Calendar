<?php
    $db = new mysqli('127.0.0.1:3306','root','','calendar');

    $email = $_POST["email"];
    $usrname = $_POST["usrname"];
    $pword = $_POST["pword"];

    $query = "INSERT INTO `user` (mail, ID, PW) VALUES ('$email', '$usrname', '$pword')";

    $db->query($query);

    header("location: Login.php");
    
    $db->close();
?>