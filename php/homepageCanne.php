<?php
	session_start();
	require_once __DIR__ . "/config.php";
    include DIR_UTIL . "sessionUtil.php";
 	require_once DIR_UTIL . "carrelloManager.php";
    include __DIR__ . "/esca.php";
    if (!isset($_SESSION['logged'])) {
    	exit();
    }
  	if ($_SESSION['logged']==false){
		    header('Location: ./../index.php');
		    exit;
    }
    $canne= Esca::getCanne();
    $_SESSION['elenco']=$canne;
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "PWEB">
    	<meta name = "keywords" content = "game">
		<link rel="stylesheet" href="./../css/carrello.css" type="text/css" media="screen">
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
		<link rel="icon" href = "./immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 
		<script type="text/javascript" src="../js/ajax/aggiungi.js"></script>

		<title>Bass Shop - Canne</title>
	</head>
	<?php


		include DIR_LAYOUT . "menu.php";

		include DIR_LAYOUT . "horizontal_menu.php";
	?>		
			<article data-fragment data-name="Seguiti">
				<header><h3>Di Tendenza</h3></header>
					<?php
						if(!sizeof($canne))
						 	echo "<p class='emptyResult'>Non abbiamo canne da vendere </p>";
						include __DIR__ . "/scroll.php";
					?>
			</article>
		</div>
	</body>
</html>
