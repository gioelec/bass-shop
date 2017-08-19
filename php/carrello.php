<?php
	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "/sessionUtil.php";
    require_once __DIR__ . "/esca.php";
    require_once DIR_UTIL . "/carrelloManager.php";
	session_start();

    if (!isset($_SESSION['logged'])) {
    	exit();
    }
  	if ($_SESSION['logged']==false){
		    header('Location: ./../index.php');
		    exit;
    }
    if (!isset($_SESSION['carrello'])) {
    	$_SESSION['carrello']=Carrello::getIstanza();
    }
    $carrello=$_SESSION['carrello'];
    $totale= $carrello->getTotale();
    $items= $carrello->getItems();
    $quantita=$carrello->getQt();


?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "PWEB">
    	<meta name = "keywords" content = "game">
		<link rel="stylesheet" href="./../css/carrello.css" type="text/css" media="screen">
		<link rel="icon" href = "./immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 
		<title>Bass Shop - Home</title>
	</head>
	<?php

		include DIR_LAYOUT . "menu.php";
			
		echo '<div id="content">';

		include DIR_LAYOUT . "horizontal_menu.php";
	?>		
			<article data-fragment data-name="Seguiti">
				<header><h3>Carrello</h3></header>
					<?php
						if($totale===0) echo "<p class='emptyResult'>Non hai ancora inserito niente nel carrello</p>";
						$totale=0;
					?>
					<ul class="Lista">
						<?php
							$i=0;
							
							foreach($items as $item){
								$nome=$item->__get('nome');
								$prezzo=$item->__get('prezzo');
								$totale+=$prezzo[0]*$quantita[$i];
								echo "<div>";	
									echo "<label> $nome[0] </label>";
									echo "<label> $prezzo[0] </label>";
									echo "<label> $quantita[$i] </label>";
								echo "</div>";
								$i++;								
							}
							echo "<h2>TOTALE: $totale</h2>";
						?>
					</ul>
			</article>
		</div>
	</body>
</html>