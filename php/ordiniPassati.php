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
	$email = $_SESSION['email'];
    $ultimiAcquisti= Esca::getStatoOrdini($email);
    /*$_SESSION['elenco']=$escheDiTendenza;
    $_SESSION['dettagliata']=false;*/
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8"> 
		<meta name = "author" content = "GIOELE">
    	<meta name = "keywords" content = "shop">		
		<link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
		<link rel="stylesheet" href="./../css/carrello.css" type="text/css" media="screen">
		<link rel="icon" href = "./../immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 
		<script type="text/javascript" src="./../js/ajax/ajaxManager.js"></script>
		<script type="text/javascript" src="../js/ajax/aggiungi.js"></script>
		<title>Bass Shop - Ordini Passati</title>
	</head>
	<?php
		include DIR_LAYOUT . "menu.php";
		include DIR_LAYOUT . "horizontal_menu.php";
	?>	
			<article data-fragment data-name="Seguiti">
				<!--<header><h3>Di Tendenza</h3></header>-->
					<?php
						if(!sizeof($ultimiAcquisti)) echo "<p class='emptyResult'>Non hai ordini da visualizzare</p>";
						else{
							echo "<div class = 'tabelle'>";
							echo"<table id='tabella' class='Lista'>";
								echo"<tr>";
									echo"<th>Nome Articolo</th>";
									echo"<th>Prezzo Singolo</th>";
									echo"<th>Quantita</th>";
									echo"<th>Spedito</th>";
								echo"</tr>";
								foreach($ultimiAcquisti as $item){
									$nome=$item['nome'];
									$prezzo=$item['prezzo'];
									$quantita=$item['quantita'];
									$spedito=$item['spedito'];
									echo "<tr>";
										echo "<td>$nome</td>";
										echo "<td>$prezzo €</td>";
										echo "<td>$quantita</td>";
										if($spedito==1)
											echo "<td class='cestino'><img src='./../immagini/ok.ico' alt='spedito' width=32 height=32/></td>";
										else
											echo "<td class='cestino'><img src='./../immagini/no.png' alt='non spedito' width=32 height=32/></td>";
									echo"</tr>";								
								}
						echo"</table>";
						echo "</div>";

						}
					?>
					
			</article>
	</body>
</html>