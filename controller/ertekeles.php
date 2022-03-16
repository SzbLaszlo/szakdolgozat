<?php

include "view/ertekeles.php";

function setErtekel($conn) {
    if(isset($_POST['commentSubmit'])) {
        //$id = $_POST['id'];
        $felhasznalo = $_POST['felhasznalo'];
        $ertekeles = $_POST['ertekeles'];
        $sql = "INSERT INTO ertekeles (felhasznalo, ertekeles) VALUES ('$felhasznalo', '$ertekeles')";
        if (!$conn->query($sql)){
            echo $conn->error;
        }
    }
}
/*
function getErtekel($conn) {
    if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM velemeny WHERE velemenyid='$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'>";
            echo $row['datum']."<br>".$row['felhasznalo']." nevű felhasználó írta:<br><br><p>";
            echo ($row['velemeny']);
            //nl12br
        echo "</p>";

        echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
        <input type='hidden' name='cid' value='".$row['id']."'>
        <button type='submit' name='commentDelete' class='btn btn-danger'>Törlés</button>
        </form></div><br>";
    }
}

}

function deleteComments($conn) {
    if (isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        $sql = "DELETE FROM velemeny WHERE id='$cid'";
        $result = $conn->query($sql);
        //header("Location: index.php");
    }
}
*/
?>