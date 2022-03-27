<?php
if(isset($_POST['igen'])){
    if(!empty($_SESSION['id'])){
        $id = $_SESSION['id'];
        $query = "DELETE FROM felhasznalok WHERE id = '$id'";
        $result = mysqli_query($conn,$query);
        unset($_SESSION['id']);
        unset($_SESSION['felhasznalo']);
        header('Location: index.php?page=index');
    }
}else if(isset($_POST['nem'])){
    header('Location: index.php?page=profilom');
}
require "view/profiltorol.php";
?>