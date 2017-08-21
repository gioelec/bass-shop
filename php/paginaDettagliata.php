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

//$email = $_SESSION['email'];
	/*$esche= Esca::getElencoEsche();
	 if (!isset($_SESSION['carrello'])) {
    	$_SESSION['carrello']=Carrello::getIstanza();
    }
    $carrello=$_SESSION['carrello'];*/

?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "PWEB">
    	<meta name = "keywords" content = "game">
   	 	<link rel="shortcut icon" type="image/x-icon" href="./../css/img/favicon.ico" />
		<link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
		<script type="text/javascript" src="../js/ajax/aggiungi.js"></script>
		<title>Bass Shop - Item</title>
	</head>
	<body>

		<?php
			include DIR_LAYOUT . "menu.php";
			include DIR_LAYOUT . "horizontal_menu.php";
			echo '<div id="content">';
			$idEsca = $_GET['idEsca'];
			$esche =Esca::getEsca($idEsca);	
			//$idEsca=$esca['idItem'];
			foreach ($esche as $esca) {
				echo"<form>";
					echo "<ul class='pubblicizza'>";
						echo "<li>";
							echo "<a>";
							echo "<h1>{$esca['Nome']}</h1> ";
							echo "<img id= 'vendita' alt='cover' src={$esca['Immagine']} onclick=paginaEsca({$esca['idItem']});>";
						  	echo "<figcaption>";
        						echo "<p>{$esca['Descrizione']}</p>";
    						echo "</figcaption>";
    						echo "<label for='quanti'>Quantità</label><br>";
    						echo"<input required max='10' min='0' title='Inserisci una quantità valida da 0 a 10' type='number' name='quanti' id='quanti.$idEsca'>";
							echo "<input class= 'aggiungi' type='button' value='Aggiungi al carrello' onclick='aggiungi($idEsca)''>";
							echo "<input type='hidden' name='nome' id='nome.$idEsca' value={$esca['Nome']}>";
							echo "<input type='hidden' name='prezzo' id='prezzo.$idEsca' value={$esca['Prezzo']}>";
							echo "nome.$idEsca";

							echo "</a>";
						echo "</li>";
					echo "</ul>";
				echo "</form>";
			}				
			echo '</div>';
		?>
	</body>
</html>