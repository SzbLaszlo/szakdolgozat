<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "c31m202121";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


//echo "Connected successfully";

?>