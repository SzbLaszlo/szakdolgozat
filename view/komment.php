<?php
    //komment inputok megjelenítése
    if(isset($_SESSION['id'])){
    echo "<form method='POST' action='".setComments($conn)."'>
    <input type='hidden' name='datum' value='".date('Y-m-d H:i:s')."'>
    <textarea name='velemeny' id='commenthely' placeholder='Ide írhatod a véleményed!' required></textarea><br>
    <button type='submit' name='commentSubmit' class='btn btn-success'>Komment</button>
    </form>";
    }else{
        //belépés link és figyelmeztető szöveg
        echo"<div id='belepni'>A kommenteléshez és az értékeléshez be kell jelentkezni!
        </div><br><div id='itt'>Beléphetsz <a href='index.php?page=belepes'>itt!</a></div><br>";
    }
    //komment megjelenítése, getComments függvény használata
    getComments($conn);
?>