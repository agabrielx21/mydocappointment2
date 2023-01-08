<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "mydocappointment";
    $conn = mysqli_connect($server,$username, $password, $db_name);

    if(!$conn){
        echo "Connection Failed!";
    }