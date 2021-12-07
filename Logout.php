<?php
    session_start();
    unset($_SESSION["UID"]);
    unset($_SESSION["forename"]);
    header("Location:Login.php");
?>