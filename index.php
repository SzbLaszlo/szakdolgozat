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
        $szoveg = $_SESSION["felhasznalo"];
        $action = "kilepes";
        $kilep = "Kilépés";
}
else {
        $szoveg = "Belépés";
        $action = "belepes";
        $kilep = "";
} 

// router
if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

// ha be vagyok lépve

        if(!empty($_SESSION["id"])){
                $menupontok = array(    'index' => "Főoldal",
                                'kilepes' => $kilep
                );
        }else{
//ha ki vagyok lépve
                $menupontok = array(    'index' => "Főoldal",
                        'regisztral'=>"Regisztráció", 
                        'belepes' => $szoveg
                );
        }

if($page!="iphone" and $page!="huawei" and $page!="honor" and $page!="xiaomi" and $page!="samsung"
 and $page!="telefon" and $page!="komment" and $page!="ertekeles"){
        $title = $menupontok[$page];
}else{
        $title = $page;
}

?>
<html>
        <head>
        <link rel="stylesheet" href="style.css">
        </head>
                <body>
                        <?php
                        include 'includes/htmlheader.inc.php';
                        include 'includes/menu.inc.php';
                        include 'controller/'.$page.'.php';
                        ?>
                </body>
</html>