<?php
$servername = "localhost";
<<<<<<< HEAD
$username = "root";
$password = "";
=======
$username = "c31m202121";
$password = "y9cSUwWf2!Pq";
>>>>>>> 16100380f8cedcdc13d9d0e2b105a3deafdaed67
$dbname = "c31m202121";

// csatlakozás
$conn = new mysqli($servername, $username, $password, $dbname);

// csatlakozás ellenőrzése
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
<<<<<<< HEAD
//echo "Connected successfully";
=======
>>>>>>> 16100380f8cedcdc13d9d0e2b105a3deafdaed67
?>