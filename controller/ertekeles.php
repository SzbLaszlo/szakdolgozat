<?php
include "view/ertekeles.php";
//setErtekel függvény, értékelés beszúrása az adatbázisba
function setErtekel($conn) {
    if(isset($_POST['ertekelesSubmit'])) {
        $felhasznalo = $_SESSION['felhasznalo'];
        $ertekeles = $_POST['ertekel'];
        $sql = "INSERT INTO ertekeles (felhasznalo, ertekeles, ertekelesid) VALUES ('$felhasznalo', '$ertekeles', ".$_REQUEST['id'].")";
        if (!$conn->query($sql)){
            echo $conn->error;
        }
    }
}
//getErtekel függvény, értékelés megjelenítése
function getErtekel($conn) {
    if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT AVG(ertekeles) AS ertekel FROM ertekeles WHERE ertekelesid='$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo ($row['ertekel']);
        }
    }
}
?>