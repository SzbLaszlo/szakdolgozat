<?php
if(isset($_SESSION['id'])){
echo"
<div id='ertek'>
    <form method='POST' action='".setErtekel($conn)."'>
    <input type='hidden' name='felhasznalo' value='asd'>

    <input type='radio' id='elso' name='ertekel' value='1'>
    <label for='elso'>1</label>
    <input type='radio' id='masodik' name='ertekel' value='2'>
    <label for='masodik'>2</label>
    <input type='radio' id='harmadik' name='ertekel' value='3'>
    <label for='harmadik'>3</label>
    <input type='radio' id='negyedik' name='ertekel' value='4'>
    <label for='negyedik'>4</label>
    <input type='radio' id='otodik' name='ertekel' value='5'>
    <label for='otodik'>5</label>
    <button type='submit' name='ertekel' class='btn btn-success'>Értékel</button>

    </form>
</div>";
}
?>