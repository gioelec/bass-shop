<?php
	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "sessionUtil.php";
    require_once DIR_UTIL . "carrelloManager.php";
    require_once __DIR__ . "/esca.php";

    session_start();
  	if (!isset($_SESSION['logged'])||$_SESSION['logged']==false){
		    header('Location: ./../index.php');
		    exit;
    }
    if (!isset($_SESSION['carrello'])) {
    	$_SESSION['carrello']=Carrello::getIstanza();
    }
    $carrello=$_SESSION['carrello'];
    $escheDiTendenza= Esca::getTendenza();
    $_SESSION['elenco']=$escheDiTendenza;
    $_SESSION['dettagliata']=false;
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
		<meta name = "author" content = "GIOELE">
    	<meta name = "keywords" content = "shop">		
		<link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./../css/carrello.css" type="text/css" media="screen">
		<link rel="icon" href = "./immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="../js/ajax/aggiungi.js"></script>
		<title>Bass Shop - Home</title>
	</head>
	<?php
		include DIR_LAYOUT . "menu.php";
		include DIR_LAYOUT . "horizontal_menu.php";
	?>	
			<article data-fragment data-name="Seguiti">
				<header><h3>Di Tendenza</h3></header>
					<?php
						if(!sizeof($escheDiTendenza)) echo "<p class='emptyResult'>Non vi sono Esche di Tendenza</p>";
						include __DIR__ . "/scroll.php";
					?>
					
			</article>
	</body>
</html>