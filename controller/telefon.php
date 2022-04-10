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

//telefon törlésére szolgáló függvény
function telotorol($conn){
    if (isset($_POST['torol'])) {
        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM tipusok WHERE id = '$id'";
            $result = $conn->query($sql);
            if($conn->query($sql) === TRUE) {
                header('Location: index.php?page=index');
            } else {
               
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
           
        }
    }
}

if (isset($_SESSION['id']) && isset($_SESSION['admin']) && $_SESSION['admin']==true) {
    echo "<form method='POST' action=" . telotorol($conn) . ">
<label for='torol'>Szeretnéd törölni a telefont?</label>
<input type='submit' id='telefon' class='btn-danger' name='torol' value='Törlés'>
</form>";
}

require "controller/ertekeles.php";
require "controller/komment.php";
?>