<?php

	require_once __DIR__ . "/config.php";
    include DIR_UTIL . "sessionUtil.php";
    include __DIR__ . "/esca.php";
    
    session_start();
    if (!isset($_SESSION['logged'])) {
    	exit();
    }
  	if ($_SESSION['logged']==false){
		    header('Location: ./../index.php');
		    exit;
    }
    $idEsca = $_GET['idEsca'];
	$esche =Esca::getEsca($idEsca);
    $_SESSION['elenco']=$esche;

?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "PWEB">
    	<meta name = "keywords" content = "game">
   	 	<link rel="shortcut icon" type="image/x-icon" href="./../css/img/favicon.ico" />
		<link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./../css/carrello.css" type="text/css" media="screen">
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="../js/ajax/aggiungi.js"></script>
		<title>Bass Shop - Item</title>
	</head>
	<body>

		<?php
			include DIR_LAYOUT . "menu.php";
			include DIR_LAYOUT . "horizontal_menu.php";
			echo '<div id="content">';
			include __DIR__ . "/scroll.php";		
			echo '</div>';
		?>
	</body>
</html>