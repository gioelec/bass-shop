<?php 
require_once __DIR__ . "/config.php";
require_once DIR_UTIL . "sessionUtil.php";
require_once __DIR__ . "/esca.php";
$escheDiTendenza=$_SESSION['elenco'];
?>
<ul class="Lista">
	<?php
		foreach($escheDiTendenza as $esca) {
			$idEsca=$esca['idItem'];
			echo"<form>";
				echo "<ul class='pubblicizza'>";
					echo "<li>";
						echo "<a>";
							echo "<h1 class= 'nome'>{$esca['Nome']}</h1> ";
							echo "<a href='paginaDettagliata.php?idEsca=$idEsca'>";
							echo "<img id= 'vendita' alt='cover' src={$esca['Immagine']} >";//>";
						echo "</a>";
						echo "<figcaption>";
	        				echo "<p>{$esca['Descrizione']}</p>";
	    				echo "</figcaption>";
						echo "<label for='quanti'>Quantità</label><br>";							
						echo"<input required max='10' min='0' title='Inserisci una quantità valida da 0 a 10' type='number' name='quanti' id='quanti.$idEsca'>";
						echo "<input class= 'conferma' type='button' value='Aggiungi al carrello' onclick='aggiungi({$esca['idItem']})''>";
						echo "<input type='hidden' name='nome' id='nome.$idEsca' value={$esca['Nome']}>";
						echo "<input type='hidden' name='prezzo' id='prezzo.$idEsca' value={$esca['Prezzo']}>";
						echo "</a>";
					echo "</li>";
				echo "</ul>";
			echo "</form>";										
		}
	?>
</ul>