<?php
//kilépés végrehajtása
session_start();
unset($_SESSION["id"]);
unset($_SESSION["felhasznalo"]);
//visszavezetés a belépés oldalra
header("Location: index.php?page=belepes");
?>