<?php
	
	require_once __DIR__ . "/config.php";
    include DIR_UTIL . "sessionUtil.php";
 	require_once DIR_UTIL . "carrelloManager.php";
    include __DIR__ . "/esca.php";
    session_start();
    if (!isset($_SESSION['logged'])||$_SESSION['logged']==false){
		    header('Location: ./../index.php');
		    exit;
    }
    $email = $_SESSION['email'];
    $ultimiAcquisti= Esca::getLatest($email);
     if (!isset($_SESSION['carrello'])) {
    	$_SESSION['carrello']=Carrello::getIstanza();
    }
    $carrello=$_SESSION['carrello'];
    $_SESSION['elenco']=$ultimiAcquisti;
    $_SESSION['dettagliata']=false;
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "GIOELE">
    	<meta name = "keywords" content = "shop">
    	<link rel="stylesheet" href="./../css/carrello.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
		<link rel="icon" href = "./immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>		
		<script type="text/javascript" src="../js/ajax/aggiungi.js"></script>
		<title>Bass Shop - Ultimi Acquisti</title>
	</head>
	<?php


		include DIR_LAYOUT . "menu.php";
		include DIR_LAYOUT . "horizontal_menu.php";
	?>	
		
			<article data-fragment data-name="Seguiti">
					<?php
						if(!sizeof($ultimiAcquisti)){
							echo "<div class='emptyResult'";
							echo "<p>Non hai ancora effettuato acquisti </p>";
							echo "<a href='homepage.php'> Clicca qui per vedere le esche più vendute</a>";
						} 
						include __DIR__ . "/scroll.php";
					?>
			</article>
	</body>
</html>
