<?php
include "includes/db.inc.php";
if (isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    $felhasznalo = $_POST['felhasznalo'];
    $jelszo = md5($_POST['jelszo']);

    $sql = "Select id from `felhasznalok` where felhasznalo='$felhasznalo'";
    if(!$result = $conn->query($sql)) echo $conn->error;

    if ($result->num_rows < 1) {

        $sql = "INSERT INTO `felhasznalok` (`felhasznalo`,`jelszo`) VALUES ('$felhasznalo', '$jelszo')";
        
    
        if ( $result = $conn->query($sql)) {
            echo 'Sikeres regisztráció!';
        } else {
            echo "Sikertelen regisztráció!";
        }
    }else{
        echo "Már létezik ilyen felhasználó!";
    $sql = "INSERT INTO `felhasznalok` (`felhasznalo`,`jelszo`) VALUES ('$felhasznalo', '$jelszo')";
 
    $result = mysqli_query($conn,$query);
    if ($results) {
        echo 'Sikeres regisztráció!';
    } else {
        echo "Sikertelen regisztráció!";
    }
}
include "view/regisztral.php";
}
?>