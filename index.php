<?php

session_start();

require 'includes/db.inc.php';
require 'model/felhasznalok.php';
$tanulo = new User;

// default oldal
$page = 'index';

// kilépés végrehajtása
if(!empty($_REQUEST['action'])) {
	if($_REQUEST['action'] == 'kilepes') session_unset();
}

// ki vagy be vagyok lépve?
if(!empty($_SESSION["id"])) {
        $szoveg = $_SESSION["felhasznalo"].": Kilépés";
        $action = "kilepes";
}
else {
        $szoveg = "Belépés";
        $action = "belepes";        
} 

// router
if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

$menupontok = array(    'index' => "Főoldal",
                        'regisztral'=>"Regisztráció", 
<<<<<<< HEAD
                        'belepes' => $szoveg,
                        'kilepes' => "Kilépés"
=======
                        'belepes' => $szoveg
>>>>>>> b17ceacc98528517ebd0adab43f1b65e39591f86
                );

$title = $menupontok[$page];


?>
<body>
<?php
include 'includes/htmlheader.inc.php';
include 'includes/menu.inc.php';
include 'controller/'.$page.'.php';

?>

</body>
</html>
