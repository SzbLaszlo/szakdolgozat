<<<<<<< HEAD
<?php
	if(!empty($_SESSION["id"])) {
	    echo "Üdv ".$_SESSION['felhasznalo']."!";
    }
?>


=======
>>>>>>> b17ceacc98528517ebd0adab43f1b65e39591f86
<html>
    <body>
        <form action="index.php?page=belepes" method="POST">
            Felhasználónév: <input type="text" name="felhasznalo">
            Jelszó: <input type="password" name="jelszo">
            <input value="Belépés" type="submit" name="submit">
        </form>
    </body>
</html>