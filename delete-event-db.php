<?php
    $db = new mysqli('127.0.0.1:3306','root','','calendar');
    $deleteID = $_POST["ID"];

    $query = "DELETE FROM `appointment` WHERE AppID = $deleteID";

    $db->query($query);
    $db->close();
?>