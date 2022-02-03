<?php
 include './model/felhasznalok.php';
 $tanulo =new User;
include './includes/db.inc.php';

if(isset($_POST['felhasznalo']) and isset($_POST['jelszo'])) {
	$loginError = '';
	if(strlen($_POST['felhasznalo']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['jelszo']) == 0) $loginError .= "Nem írtál be jelszót<br>";
	if($loginError == '') {
		$sql = "SELECT id FROM felhasznalok WHERE felhasznalon = '".$_POST['felhasznalo']."' ";

		if(!$result = $conn->query($sql)) echo $conn->error;

		if ($result->num_rows > 0) {
			
			if($row = $result->fetch_assoc()) {
				if(md5($_POST['jelszo']) == $tanulo->get_jelszo()) {
					$_SESSION["id"] = $row['id'];
					$_SESSION["nev"] = $tanulo->get_nev();
                    header('Location: index.php?page=ulesrend');
                    exit();
				}
				else $loginError .= 'Érvénytelen jelszó<br>';
			}
		}
		else $loginError .= 'Érvénytelen felhasználónév<br>';
	}
}


?>



<html>
    <head>

    </head>

    <body>
        <form action="belepes.php" method="POST">
            Felhasználónév: <input type="text" name="felhasznalo">
            Jelszó: <input type="password" name="jelszo">
            <input value="Belépés" type="submit" name="submit">
        </form>
    </body>
</html>