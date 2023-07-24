<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("http://localhost/WF/proiect/index.php");
        exit();
    }
?>