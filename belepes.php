<?php     
session_start();
require 'model/felhasznalok.php';
$felhasznalo = new User;
   if(isset($_POST['felhasznalo']) and isset($_POST['jelszo'])) {
	$loginError = '';
	if($loginError == '') {
		$sql = "SELECT `id` FROM `felhasznalok` WHERE `felhasznalonev` = '".$_POST['felhasznalo']."' ";

		if(!$result = $conn->query($sql)) echo $conn->error;
          
		if(!empty($result->num_rows) && $result->num_rows > 0) {
			
			if($row = $result->fetch_assoc()) {
				$felhasznalo->set_user($row['felhasznalo'], $conn);
				if(md5($_POST['jelszo']) == $felhasznalo->get_jelszo()) {
					$_SESSION["felhasznalo"] = $row['felhasznalo'];
					$_SESSION["felhasznalonev"] = $felhasznalo->get_felhasznalonev();
                    header('Location: index.php?page=index');
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