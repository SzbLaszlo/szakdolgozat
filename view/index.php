<h1>Telefonok</h1>

<?php 
$result = $conn->query("SELECT nev, processzor, magok, sebesseg, ram, rom FROM tipusok"); 
    while($row = $result->fetch_assoc()){
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