<?php
if(isset($_SESSION['id'])){
echo "<form method='POST' action='".setComments($conn)."'>
<input type='hidden' name='felhasznalo' value='asd'>
<input type='hidden' name='datum' value='".date('Y-m-d H:i:s')."'>
<textarea name='velemeny' id='commenthely' placeholder='Ide írhatod a véleményed!' required></textarea><br>
<button type='submit' name='commentSubmit' class='btn btn-success'>Komment</button>
</form>";
}else{
 echo"A kommenteléshez be kell jelentkezni!";
}
getComments($conn);
//
?>