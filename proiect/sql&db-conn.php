<?php
$serveraddress = "localhost:3308";
$username = "root";
$password = "";
$database_name = "proiect";



    $sql = mysqli_connect(
        $serveraddress,
        $username,
        $password,
        $database_name
    );
    
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } 
    
    // de asta de jos nu e nevoie, sterge-o dupa teste
    else {         
        echo "You are conected !";
    }
?>