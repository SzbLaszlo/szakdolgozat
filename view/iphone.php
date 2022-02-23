<?php 
$result = $conn->query("SELECT kep, nev, processzor, magok, sebesseg, ram, rom FROM tipusok WHERE markaId = 1");

    while($row = $result->fetch_assoc()){
        echo '<img src="data:image;base64,'.base64_encode($row['kep']).'" alt="Image">';
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