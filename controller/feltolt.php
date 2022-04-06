<?php

    $result = $conn->query("SELECT marka FROM marka");

    echo "<div class='feltolt'><form action='".telefonfelvisz($conn)."' method='POST'>
    <input type='file' name='kep' required><br>
    <label>Telefon neve: </label>
    <input type='text' name='telefonnev' required><br>
    <label>Telefon márkája: (1. iphone, 2. huawei, 3. honor, 4. xiaomi, 5. samsung)</label>
    <input type='number' name='marka' min='1' max='5' required><br>
    <label>Processzor neve: </label>
    <input type='text' name='processzornev' required><br>
    <label>Magok száma:</label>
    <input type='number' name='magok' min='1' max='10' required><br>
    <label>Processzor sebessége (GHz pl.: 2.5): </label>
    <input type='text' name='sebesseg' required><br>
    <label>Ram (GB): </label>
    <input type='number' name='ram' min='1' max='20' required><br>
    <label>Rom (GB): </label>
    <input type='number' name='rom' min='1' max='1024' required><br>
    <input type='submit' class='btn-success' name='hozzaad' value='Hozzáad'>
    </form></div>";

    //telefon felvitele az adatbázisba
    function telefonfelvisz($conn){
        if(isset($_POST['hozzaad'])){
        $kep = $_POST['kep'];
        $nev = $_POST['telefonnev'];
        $marka = $_POST['marka'];
        $proc = $_POST['processzornev'];
        $mag = $_POST['magok'];
        $seb = $_POST['sebesseg'];
        $ram = $_POST['ram'];
        $rom = $_POST['rom'];
        $query = "INSERT INTO tipusok (kep, nev, markaId, processzor, magok, sebesseg, ram, rom)
        VALUES ('$kep', '$nev', '$marka', '$proc', '$mag', '$seb', '$ram', '$rom')";
        $result = mysqli_query($conn, $query);
        header('Location: index.php?page=index');
        }
    }
?>