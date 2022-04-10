<?php

//setComments függvény, kommentek beszúrása az adatbázisba
function setComments($conn) {
    if(isset($_POST['commentSubmit'])) {
        $felhasznalo = $_SESSION['felhasznalo'];
        $velemeny = $_POST['velemeny'];
        $datum = $_POST['datum'];
        $sql = "INSERT INTO velemeny (felhasznalo, velemeny, velemenyid, datum) VALUES ('$felhasznalo', '$velemeny', ".$_REQUEST['id'].", '$datum')";
        if (!$conn->query($sql)){
            echo $conn->error;
        }
    }
}
//getComments függvény, komment megjelenítése
function getComments($conn) {
    if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);


    $sql = "SELECT * FROM velemeny WHERE velemenyid='$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'>";
            echo $row['datum']."<br>".$row['felhasznalo']." nevű felhasználó írta:<br><br><p>";
            echo ($row['velemeny']);
        echo "</p>";
        if(isset($_SESSION['felhasznalo']) and $_SESSION['felhasznalo'] == $row['felhasznalo']){
            echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
            <input type='hidden' name='cid' value='".$row['id']."'>
            <button type='submit' name='commentDelete' class='btn btn-danger'>Törlés</button>
            </form>";
        }
        echo '</div><br>';
    }
}

}
//deleteComments függvény, komment törlése
function deleteComments($conn) {
    if (isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        $sql = "DELETE FROM velemeny WHERE id='$cid'";
        $result = $conn->query($sql);
        }
    }
    
include "view/komment.php";
?>