<?php
	if(!empty($_SESSION["id"])) {
	    echo "Üdv ".$_SESSION['felhasznalo']."!";
    }
?>

<html>
    <body>
        <form action="index.php?page=belepes" method="POST">
            <div class="row">
                <div class="col">
                Felhasználónév: <input type="text" name="felhasznalo" class="form-control">
                </div>
                <div class="col">
                Jelszó: <input type="password" name="jelszo" class="form-control">
                </div>
            </div>
            <br>
                <input value="Belépés" type="submit" name="submit" class="btn btn-success">
        </form>
    </body>
</html>