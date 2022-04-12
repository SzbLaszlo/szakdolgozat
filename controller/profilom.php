<?php
//felhasználó adatainak kiírása
if(!empty($_SESSION['id'])){
    $result = $conn->query("SELECT * FROM felhasznalok WHERE id='".$_SESSION['id']."'");
    while ($row = $result->fetch_assoc()){
        echo "<br><div class='profilkeret'><div class='profil'>Felhasználónév: ".$row['felhasznalo']."</div>";
        echo "<div class='profil'>Email: ".$row['email']."</div></div><br>";
    }
}

require 'view/profilom.php';
?>