<?php

$servername = "localhost";
$username = "c31m202121";
$password = "y9cSUwWf2!Pq";
$dbname = "c31m202121";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>