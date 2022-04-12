<?php
//felhasználói profil törlésének végrehajtása
if(isset($_POST['igen'])){
    if(!empty($_SESSION['id'])){
        $id = $_SESSION['id'];
        $query = "DELETE FROM felhasznalok WHERE id = '$id'";
        $result = mysqli_query($conn,$query);
        unset($_SESSION['id']);
        unset($_SESSION['felhasznalo']);
        header('Location: index.php?page=index');
    }
    //ha mégse szeretné törölni akkor vissza visszük a profilom oldalra
}else if(isset($_POST['nem'])){
    header('Location: index.php?page=profilom');
}
require "view/profiltorol.php";
?>