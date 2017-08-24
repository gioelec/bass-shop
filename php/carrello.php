<?php
	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "/sessionUtil.php";
    require_once __DIR__ . "/esca.php";
    require_once DIR_UTIL . "/carrelloManager.php";

    require_once __DIR__ . "/cliente.php";


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
   // $totale= $carrello->getTotale();
    $items= $carrello->getItems();
 //   $quantita=$carrello->getQt();


?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "PWEB">
    	<meta name = "keywords" content = "game">
		<link rel="stylesheet" href="./../css/carrello.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
		<link rel="icon" href = "./../immagini/icon2.jpg" sizes="32x32" type="image/jpg">
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="./../js/utility.js"></script>
		<script type="text/javascript" src="../js/ajax/conferma.js"></script>
 
		<title>Bass Shop - Carrello</title>
	</head>
	<?php
	
		include DIR_LAYOUT . "menu.php";
			
		include DIR_LAYOUT . "horizontal_menu.php";
	?>		
			<article data-fragment data-name="Seguiti">
				<header><h3>Carrello</h3></header>
					<?php
						/*if($totale==0) echo "<p class='emptyResult'>Attualmente non hai niente nel carrello</p>";*/
						$totale=0;
						echo"<table id='tabella' class='Lista'>";
							$tot=$carrello->getTotale();
							$i=0;
								echo"<tr>";
									echo"<th>Nome Articolo</th>";
									echo"<th>Prezzo Singolo</th>";
									echo"<th>Quantita</th>";
									echo"<th>Sub Totale</th>";
									echo"<th>Rimuovi Articolo</th>";
								echo"</tr>";
								foreach($items as $item){
									$nome=$item->__get('nome');
									$prezzo=$item->__get('prezzo');
									$id=$item->__get('idEsca');
									$quantita=$item->__get('quantita');
									$sub=$prezzo*$quantita;
									$totale+=$sub;
									echo "<tr id='row.$id'>";
										echo "<td>$nome</td>";
										echo "<td>$prezzo</td>";
										echo "<td>$quantita</td>";
										echo "<td>$sub</td>";
										echo "<td id='cestino'><img src='./../immagini/cestino.png 'alt='elimina' width=32 height=32 onclick='rimuovi($id,$sub,$totale)' /></td>";
									echo"</tr>";
									$i++;								
								}
								echo "<tr id='lastrow'>";
									echo "<td colspan='5' id='totale'><h2>TOTALE: $totale</h2></td>";
								echo"</tr>";
							
						echo"</table>";
						//echo "<h2 class='emptyResult'>TOTALE: $totale</h2>";
						if ($tot>0) {
							echo "<input id='conferma' class= 'conferma' type='button' value='Conferma acquisti' onclick='conferma()''>";
						}

					?>
			</article>
		</div>
	</body>
</html>