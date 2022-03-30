<?php
if(!empty($_SESSION['id'])){
    $result = $conn->query("SELECT * FROM felhasznalok WHERE id='".$_SESSION['id']."'");
    while ($row = $result->fetch_assoc()){
        echo "<br><div class='profil'>Felhasználónév: ".$row['felhasznalo']."</div>";
        echo "<div class='profil'>Email: ".$row['email']."</div><br>";
    }
}

if (isset($_POST['modosit'])){
	$felhasznalonev = $_POST['felhasznalo'];
	$jelszo = md5($_POST['jelszo']);
	$email = $_POST['email'];
    if(!empty($_SESSION["id"])) { 
    $query = "UPDATE `felhasznalok` SET jelszo = '$jelszo' WHERE id = '".$_SESSION['id']."'";
    $result = mysqli_query($conn,$query);
    }
}

require 'view/profilom.php';
?>