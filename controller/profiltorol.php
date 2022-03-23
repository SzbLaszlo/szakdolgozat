<?php
if(isset($_POST['igen'])){
    if(!empty($_SESSION['id'])){
        $id = $_SESSION['id'];
        $query = "DELETE FROM felhasznalok WHERE id = '$id'";
        $result = mysqli_query($conn,$query);
            if($query){
                echo "<div >A felhasználót sikeresen töröltük!</div>";
            }else{
                echo "<div >A felhasználót nem tudtuk törölni!";
                header('Location: index.php?page=profilom');
            }
        unset($_SESSION['id']);
        unset($_SESSION['felhasznalo']);
        header('Location: index.php?page=index');
    }
}
?>