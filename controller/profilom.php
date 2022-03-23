<?php
if(!empty($_SESSION['id'])){
    $result = $conn->query("SELECT * FROM felhasznalok WHERE id='".$_SESSION['id']."'");
    while ($row = $result->fetch_assoc()){
        echo "<div class='profil'>Felhasználónév: ".$row['felhasznalo']."</div>";
        echo "<div class='profil'>Email: ".$row['email']."</div>";
    }
}
?>