<html>

<body>
        <h1>Telefonok</h1>
        <ul id="link">
                <li><a href="index.php?page=iphone">Iphone</a></li>
                <li><a href="index.php?page=xiaomi">Xiaomi</a></li>
                <li><a href="index.php?page=huawei">Huawei</a></li>
                <li><a href="index.php?page=honor">Honor</a></li>
                <li><a href="index.php?page=samsung">Samsung</a></li>
        </ul>
</body>

</html>
<?php
//minden eszköz kiválasztása az adatbázisból
$result = $conn->query("SELECT id, kep, nev, processzor, magok, sebesseg, ram, rom FROM tipusok");
echo'<div class="container">';
while ($row = $result->fetch_assoc()) {

?>      
        
        <div class="telefonbox">
        <div id="telolink">
                <a href="index.php?page=telefon&id=<?php echo ($row['id']); ?>">
                        <?php
                        echo '<img src="data:image;base64,' . base64_encode($row['kep']) . '" alt="Image">';
                        ?>
                </a>
        </div>

        <p>Név: <?php echo ($row['nev']); ?></p>
        <p>Processzor: <?php echo ($row['processzor']); ?></p>
        <p>Magok száma: <?php echo ($row['magok']); ?></p>
        <p>Processzor sebessége: <?php echo ($row['sebesseg']); ?> GHz</p>
        <p>RAM: <?php echo ($row['ram']); ?> GB</p>
        <p>ROM: <?php echo ($row['rom']); ?> GB</p>
        </div>
        
        <hr>
<?php
}
?>
</div>