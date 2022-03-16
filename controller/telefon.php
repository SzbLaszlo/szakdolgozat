<?php

if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);

$result = $conn->query("SELECT id, kep, nev, processzor, magok, sebesseg, ram, rom FROM tipusok WHERE id='$id'");
$row = $result->fetch_assoc();
        echo  '<img src="data:image;base64,'.base64_encode($row['kep']).'" alt="Image">';
        ?>
        <p>Név: <?php echo($row['nev']);?></p>
        <p>Processzor: <?php echo($row['processzor']);?></p>
        <p>Magok száma: <?php echo($row['magok']);?></p>
        <p>Processzor sebessége: <?php echo($row['sebesseg']);?> GHz</p>
        <p>RAM: <?php echo($row['ram']);?> GB</p>
        <p>ROM: <?php echo($row['rom']);?> GB</p><hr>
<?php
}
?>



<?php

echo "<form method='POST' action='".setComments($conn)."'>
<input type='hidden' name='felhasznalo' value='asd'>
<input type='hidden' name='datum' value='".date('Y-m-d H:i:s')."'>
<textarea name='velemeny' id='commenthely' required></textarea><br>
<button type='submit' name='commentSubmit' class='btn btn-success'>Comment</button>
</form>";

getComments($conn);

?>

<?php

function setComments($conn) {
    if(isset($_POST['commentSubmit'])) {
        //$id = $_POST['id'];
        $felhasznalo = $_POST['felhasznalo'];
        $velemeny = $_POST['velemeny'];
        $datum = $_POST['datum'];
        $sql = "INSERT INTO velemeny (felhasznalo, velemeny, velemenyid, datum) VALUES ('$felhasznalo', '$velemeny', ".$_REQUEST['id'].", '$datum')";
        if (!$conn->query($sql)){
            echo $conn->error;
        }
    }
}

function getComments($conn) {
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
?>