<?php

if(isset($_POST['felhasznalo']) and isset($_POST['jelszo'])) {
	$loginError = '';
	if(strlen($_POST['felhasznalo']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
	if(strlen($_POST['jelszo']) == 0) $loginError .= "Nem írtál be jelszót<br>";
	if($loginError == '') {
		$sql = "SELECT id FROM felhasznalok WHERE felhasznalo = '".$_POST['felhasznalo']."' ";

<<<<<<< HEAD
		if(!$result = $conn->query($sql)) echo $conn->error;
=======
        //if(!$result = $conn->query($sql)) echo $conn->error;
>>>>>>> 16100380f8cedcdc13d9d0e2b105a3deafdaed67

		if ($result->num_rows > 0) {
			
			if($row = $result->fetch_assoc()) {
<<<<<<< HEAD
				$felhasznalo->set_felhasznalo($row['id'], $conn);
				if(md5($_POST['jelszo']) == $felhasznalo->get_jelszo()) {
					$_SESSION["id"] = $row['id'];
					$_SESSION["nev"] = $felhasznalo->get_nev();
                    header('Location: index.php?page=ulesrend');
=======
				$felhasznalok->set_user($row['id'], $conn);
				if(md5($_POST['jelszo']) == $felhasznalok->get_jelszo()) {
					$_SESSION["id"] = $row['id'];
					$_SESSION["nev"] = $felhasznalok->get_nev();
                    header('Location: belepes.php?page=fooldal');
>>>>>>> 16100380f8cedcdc13d9d0e2b105a3deafdaed67
                    exit();
				}
				else $loginError .= 'Érvénytelen jelszó<br>';
			}
		}
		else $loginError .= 'Érvénytelen felhasználónév<br>';
	}
}
<<<<<<< HEAD
?>




=======

?>

>>>>>>> 16100380f8cedcdc13d9d0e2b105a3deafdaed67
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