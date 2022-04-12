<?php
//setErtekel függvény, értékelés beszúrása az adatbázisba
function setErtekel($conn) {
    if(isset($_POST['ertekelesSubmit'])) {
        
        $felhasznalo = $_SESSION['felhasznalo'];
        $ertekeles = $_POST['ertekel'];
        $sql="SELECT id FROM ertekeles WHERE felhasznalo='".$_SESSION['felhasznalo']."'and ertekelesid='".$_GET['id']."'";
        if(!$result = $conn->query($sql)) echo $conn->error;
        if ($result->num_rows > 0) {
            $sql = "UPDATE ertekeles SET ertekeles='".$ertekeles."' ";
            if ($conn->query($sql) === TRUE) {
                header('Location: index.php?page=profilom');
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        //1 felhasználó csak egyszer értékelhet, ha többször próbál akkor felül írja
        }else {
        $sql = "INSERT INTO ertekeles (felhasznalo, ertekeles, ertekelesid) VALUES ('$felhasznalo', '$ertekeles', ".$_REQUEST['id'].")";
        if(!$result = $conn->query($sql)) echo $conn->error;
        }
    
    }
}


//getErtekel függvény, értékelés megjelenítése mindenki számára
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

include "view/ertekeles.php";
?>