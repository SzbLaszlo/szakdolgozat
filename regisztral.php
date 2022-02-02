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

?>


<html>
    <head>

    </head>

    <body>
        <form action="regisztral.php" method="POST">
            Felhasználónév: <input type="text" name="felhasznalo">
            Jelszó: <input type="password" name="jelszo">
            Jelszó újra: <input type="password" name="jelszoujra">
            <input value="Regisztráció" type="submit" name="submit">
        </form>
    </body>
</html>