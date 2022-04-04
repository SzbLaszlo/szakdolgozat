<?php
//LoginError hiba üzenet
$loginError = '';
if(isset($_POST['felhasznalo']) and isset($_POST['jelszo'])) {
   if(strlen($_POST['felhasznalo']) == 0) $loginError .= "Nem írtál be felhasználónevet<br>";
   if(strlen($_POST['jelszo']) == 0) $loginError .= "Nem írtál be jelszót<br>";
   if($loginError == '') {
       $sql = "SELECT id FROM felhasznalok WHERE felhasznalo = '".$_POST['felhasznalo']."' ";

       if(!$result = $conn->query($sql)) echo $conn->error;

       if ($result->num_rows > 0) {
           
           if($row = $result->fetch_assoc()) {
               $tanulo->set_user($row['id'], $conn);
               if(md5($_POST['jelszo']) == $tanulo->get_jelszo()) {
                   $_SESSION["id"] = $row['id'];
                   $_SESSION["felhasznalo"] = $tanulo->get_felhasznalo();
                   $sql = "SELECT id FROM admin WHERE id = ".$row['id'];

                   if(!$result = $conn->query($sql)) echo $conn->error;

                   if ($result->num_rows > 0) {
                        $_SESSION['admin']==true;
                    }else{
                        $_SESSION['admin']==false;
                    }

                   header('Location: index.php');
                   exit();
               }
               else $loginError .= 'Érvénytelen jelszó<br>';
           }
       }
       else $loginError .= 'Érvénytelen felhasználónév<br>';
   }
}
include "view/belepes.php";
?>