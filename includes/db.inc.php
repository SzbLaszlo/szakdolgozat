<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "c31m202121";

//csatlakozás
$conn = new mysqli($servername, $username, $password, $dbname);

//csatlakozás ellenőrzése
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>