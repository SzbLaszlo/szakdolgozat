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
/*
echo "<form method='POST' action='".setComments($conn)."'>

<input type='hidden' name='datum' value='".date('Y-m-d H:i:s')."'>
<textarea name='velemeny'></textarea><br>
<button type='submit' name='commentSubmit'>Comment</button>
</form>";
//<input type='hidden' name='felhasznalo' value='Anonymous'>
?>

<?php
function setComments($conn) {
    if(isset($_POST['commentSubmit'])) {
        //$id = $_POST['id'];
        //$datum = $_POST['datum'];
        //$felhasznalo = $_POST['felhasznalo'];
        $velemeny = $_POST['velemeny'];

        $sql = "INSERT INTO velemeny (felhasznalo, velemeny) VALUES ('$felhasznalo', '$velemeny')";
        $result = $conn->query($sql);
    }
}

function getComments($conn) {
    $sql = "SELECT * FROM velemeny";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'><p>";
        echo $row['uid']."<br>";
        echo $row['date']."<br>";
        echo nl12br($row['message']);
        echo "</p></div>";


        echo "<form class='delete-form' method='POST' action='""'>
        <input type='hidden' name='cid' value='".$row['cid']."'>
        <button type='submit' name='commentDelete'>Delete</button>
        </form>
        "
    }
}

function deleteComments() {
    if (isset($_POST['commentSubmit'])){
        $cid = $_POST['cid'];

        $sql = "DELETE FROM velemeny WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: index.php");
    }
}
*/
?>
