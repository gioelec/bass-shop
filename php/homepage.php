<?php
	session_start();
	require_once __DIR__ . "/config.php";
    include DIR_UTIL . "sessionUtil.php";
    include DIR_UTIL . "carrelloManager.php";

    include __DIR__ . "/esca.php";
    if (!isset($_SESSION['logged'])) {
    	exit();
    }
  	if ($_SESSION['logged']==false){
		    header('Location: ./../index.php');
		    exit;
    }
    $escheDiTendenza= Esca::getTendenza();
    global $carrello;
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "PWEB">
    	<meta name = "keywords" content = "game">		
		<link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
		<link rel="icon" href = "./immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 
		<title>Bass Shop - Home</title>
	</head>
	<?php
	/*	echo '<body onload="MovieLoader.init(); ';
		echo 'MovieLoader.loadData(' . $searchType . ')">';*/

		include DIR_LAYOUT . "menu.php";
			
		echo '<div id="content">';

			include DIR_LAYOUT . "horizontal_menu.php";
	?>	
			<article data-fragment data-name="Seguiti">
				<header><h3>Di Tendenza</h3></header>
					<?php
						if(!sizeof($escheDiTendenza)) echo "<p class='emptyResult'>Non vi sono Esche di Tendenza</p>";
					?>
					<ul class="Lista">
						<?php
							foreach($escheDiTendenza as $esca) {
								echo "<ul class='pubblicizza'>";
									echo "<li>";
										echo "<a>";
										echo "<h1>{$esca['Nome']}</h1> ";
											echo "<img id= 'vendita' alt='cover' src={$esca['Immagine']}>";
											  	echo "<figcaption>";
        											echo "<p>{$esca['Descrizione']}</p>";
    											echo "</figcaption>";
    											echo "<label for='quanti'>Quantità</label><br>";
    											echo"<input required max='10' min='0' title='Inserisci una quantità valida da 0 a 10' type='number' name='quanti' id='quanti' onclick='$carrello->add($esca)'>";
											echo "<input class= 'aggiungi' type='submit' value='Aggiungi al carrello'>";
										echo "</a>";
									echo "</li>";
								echo "</ul>";									
							}
						?>
					</ul>
			</article>
		</div>
	</body>
</html>