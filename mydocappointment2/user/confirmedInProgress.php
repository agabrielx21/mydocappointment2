<?php
session_start();
include "../db_conn.php";

$doc = $_SESSION['doctor'];
$pacient = $_SESSION['username'];
$pret = $_SESSION['pret'];
$serviciu = $_SESSION['serviciu'];
$data = $_SESSION['data'];
$insertSQL = "INSERT INTO programari VALUES ('','$doc', '$pacient','$serviciu', '$pret','$data')";
$wasInserted = mysqli_query($conn, $insertSQL);

header("Location: confirmed.php");
    exit();
?>