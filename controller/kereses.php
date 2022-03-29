<?php
include "controller/kereses.php";

echo "<div class='keres'><form action='index.php?page=kereses.php' method='POST'>
<input type='text' name='kereses' placeholder='Telefon neve'>
<button type='submit' name='submitKeres'>Keresés</button>
</form></div>";

if(isset($_POST['submitKeres'])){
    $keres = mysqli_real_escape_string($conn, $_POST['kereses']);
    $sql = "SELECT * FROM tipusok WHERE nev LIKE '%$keres%'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if($queryResult > 0){
        while($row = mysqli_fetch_assoc($result)){
                        
        ?>
        <div id="telolink">
        <a href="index.php?page=telefon&id=<?php echo ($row['id']); ?>">
        <?php
        echo '<img src="data:image;base64,'.base64_encode($row['kep']).'" alt="Image">';
        ?>
        </a>
        </div>

        <p>Név: <?php echo($row['nev']);?></p>
        <p>Processzor: <?php echo($row['processzor']);?></p>
        <p>Magok száma: <?php echo($row['magok']);?></p>
        <p>Processzor sebessége: <?php echo($row['sebesseg']);?> GHz</p>
        <p>RAM: <?php echo($row['ram']);?> GB</p>
        <p>ROM: <?php echo($row['rom']);?> GB</p><hr>
<?php
        }
    }else{
        echo "Nincs ilyen találat.";
    }
}
?>