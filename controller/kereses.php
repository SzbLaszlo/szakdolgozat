<?php
//keresés telefon név alapján
if (isset($_POST['submitKeres']) && ($_POST['kereses'] != "")) {
    $keres = mysqli_real_escape_string($conn, $_POST['kereses']);
    $sql = "SELECT * FROM tipusok WHERE nev LIKE '%$keres%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

?>
    <!--
    ha talált ilyen telefont akkor kiírása
    -->
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
            <hr>
<?php
        }
    } else {
        //ha nincs ilyen telefon
        echo "<div class='keresnincs'>Nincs ilyen találat.</div>";
    }
} else {
    //ha üresen hagyta a kereső mezőt
    echo "<div class='keresnincs'>Töltse ki a kereső mezőt!</div>";
}
?>