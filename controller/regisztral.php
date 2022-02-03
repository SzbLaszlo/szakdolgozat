<?php
if (isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    $felhasznalo = $_POST['felhasznalo'];
    $jelszo = md5($_POST['jelszo']);

    $sql = "INSERT INTO `felhasznalok` (`felhasznalo`,`jelszo`) VALUES ('$felhasznalo', '$jelszo')";
 
    $result = mysqli_query($conn,$query);
    if ($results) {
        echo 'Sikeres regisztráció!';
    } else {
        echo "Sikertelen regisztráció!";
    }
}
include "view/regisztral.php";

?>

