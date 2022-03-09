<?php

include 'includes/db.inc.php';

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
<input type='hidden' name='felhasznalo' value='Anonymous'>

<textarea name='velemeny'></textarea><br>
<button type='submit' name='commentSubmit'>Comment</button>
</form>";

getComments($conn);
//<input type='hidden' name='felhasznalo' value='Anonymous'>
//<input type='hidden' name='datum' value='".date('Y-m-d H:i:s')."'>
?>

<?php

function setComments($conn) {
    if(isset($_POST['commentSubmit'])) {
        //$id = $_POST['id'];
        //$datum = $_POST['datum'];
        $felhasznalo = $_POST['felhasznalo'];
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
            echo $row['felhasznalo']."<br>";
            //echo $row['datum']."<br>";
            echo nl12br($row['velemeny']);
        echo "</p></div>";

/*
        echo "<form class='delete-form' method='POST' action='".deleteComments()."'>
        <input type='hidden' name='cid' value='".$row['id']."'>
        <button type='submit' name='commentDelete'>Delete</button>
        </form>"
*/        
    }
}

function deleteComments($conn) {
    if (isset($_POST['commentDelete'])){
        $cid = $_POST['id'];

        $sql = "DELETE FROM velemeny WHERE id='$cid'";
        $result = $conn->query($sql);
        header("Location: index.php");
    }
}

?>
