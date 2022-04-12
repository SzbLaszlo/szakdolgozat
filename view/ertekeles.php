<?php
if(isset($_SESSION['id'])){
//csillagos értékelés, értékelés elküldése az adatbázisnak
echo"
<div id='ertek'>
    <form method='POST' action='".setErtekel($conn)."'>
    <fieldset class='rating'>
        <input type='radio' id='star5' name='ertekel' value='5' /><label for='star5'></label>
        <input type='radio' id='star4' name='ertekel' value='4' /><label for='star4'></label>
        <input type='radio' id='star3' name='ertekel' value='3' checked/><label for='star3'></label>
        <input type='radio' id='star2' name='ertekel' value='2' /><label for='star2'></label>
        <input type='radio' id='star1' name='ertekel' value='1' /><label for='star1'></label>
    </fieldset>
    <button type='submit' name='ertekelesSubmit' class='btn btn-success'>Értékel</button>
    </form>
</div>";
}
echo "A felhasználók által értékelt eszköz ";
//értékelés megjelenítése, getErtekel függvény használata
getErtekel($conn);
echo " pontot ért el.";
?>