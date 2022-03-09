<?php
include "includes/db.inc.php";
if (isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    $felhasznalo = $_POST['felhasznalo'];
    $jelszo = md5($_POST['jelszo']);
    $email = $_POST['email'];

    $sql = "Select id from `felhasznalok` where felhasznalo='$felhasznalo'";
    if(!$result = $conn->query($sql)) echo $conn->error;

    if ($result->num_rows < 1) {

        $sql = "INSERT INTO `felhasznalok` (`felhasznalo`,`jelszo`,`email`) VALUES ('$felhasznalo', '$jelszo', '$email')";
        
    
        if ( $result = $conn->query($sql)) {
            echo 'Sikeres regisztráció!';
                $msg = "
                <div>Üdvözlünk a telefonos oldalunkon ".$felhasznalo."!</div>
                <br><br>
                <div>Ez egy automatikus üzenet, kérlek ne válaszolj erre a levélre!</div>";
                $msg = wordwrap($msg,70);
                mail($email,"Sikeres regisztráció!",$msg);        
        } else {
            echo "Sikertelen regisztráció!";
        }
    }else{
        echo "Már létezik ilyen felhasználó!";
    }
}
include "view/regisztral.php";

?>