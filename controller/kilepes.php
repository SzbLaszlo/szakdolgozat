<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["felhasznalo"]);
header("Location: index.php?page=belepes");
?>