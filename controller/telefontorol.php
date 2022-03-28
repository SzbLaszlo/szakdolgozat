<?php
if(isset($_POST['torol'])){
    if(!empty($_SESSION['id'])){
        $id = $_REQUEST['id'];
        $query = "DELETE FROM tipusok WHERE id = '$id'";
        $result = mysqli_query($conn,$query);
        header('Location: index.php?page=index');
    }
}
?>