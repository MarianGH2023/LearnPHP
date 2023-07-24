<?php

include_once ("sql&db-conn.php");

$id = $_GET['id'];


$result = mysqli_query($sql,"DELETE FROM usrsprof WHERE id=$id");
header("Location: edit.php");