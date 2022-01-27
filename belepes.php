<?php

if(isset($_POST['felhasznalo']) and isset($_POST['jelszo'])) {
	$loginError = '';
	if(strlen($_POST['felhasznalo']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['jelszo']) == 0) $loginError .= "Nem írtál be jelszót<br>";
	if($loginError == '') {
		$sql = "SELECT id FROM felhasznalok WHERE felhasznalo = '".$_POST['felhasznalo']."' ";

        //if(!$result = $conn->query($sql)) echo $conn->error;

		if ($result->num_rows > 0) {
			
			if($row = $result->fetch_assoc()) {
				$felhasznalok->set_user($row['id'], $conn);
				if(md5($_POST['jelszo']) == $felhasznalok->get_jelszo()) {
					$_SESSION["id"] = $row['id'];
					$_SESSION["nev"] = $felhasznalok->get_nev();
                    header('Location: belepes.php?page=fooldal');
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