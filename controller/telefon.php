<?php

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $result = $conn->query("SELECT id, kep, nev, processzor, magok, sebesseg, ram, rom FROM tipusok WHERE id='$id'");
    $row = $result->fetch_assoc();
    echo  '<br><img src="data:image;base64,' . base64_encode($row['kep']) . '" alt="Image">';
?>
    <p>Név: <?php echo ($row['nev']); ?></p>
    <p>Processzor: <?php echo ($row['processzor']); ?></p>
    <p>Magok száma: <?php echo ($row['magok']); ?></p>
    <p>Processzor sebessége: <?php echo ($row['sebesseg']); ?> GHz</p>
    <p>RAM: <?php echo ($row['ram']); ?> GB</p>
    <p>ROM: <?php echo ($row['rom']); ?> GB</p>
    <hr>

<?php
}
/*
if(isset($_SESSION['id'])){
echo "<form action='index.php?page=telefon&id='".$_REQUEST['id']." method='POST'>
<label for='telefon'>Szeretnéd törölni a telefont?</label>
<input type='submit' id='telefon' class='btn-danger' name='torol' value='Törlés'>
</form>";

if (!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql = "DELETE FROM tipusok WHERE id = '$id'";
    $result = $conn->query($sql);
    header('Location: index.php?page=index');
    }
}
*/
require "controller/ertekeles.php";
require "controller/komment.php";
?>