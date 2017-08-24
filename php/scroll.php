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
							echo "<img class= 'vendita' alt='cover' src={$esca['Immagine']} height='355' width='300'>";//>";
						echo "</a>";
						echo "<figcaption>";
	        				echo "<p>{$esca['Descrizione']}</p>";
	    				echo "</figcaption>";
						
						echo"<table class='caratteristiche'>";
							echo "<tr>";
								echo "<th>Prezzo</th>";
								echo "<th>Peso</th>";
								if($esca['Tipo']!=='m')
									echo "<th>Lunghezza</th>";
								echo "<th>Quantità</th>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>{$esca['Prezzo']} €</td>";
								echo "<td>{$esca['Peso']} gr</td>";
								if($esca['Tipo']!=='m')
									echo "<td>{$esca['Lunghezza']} cm</td>";
								echo "<td><input required max='20' min='1' title='Inserisci una quantità valida da 1 a 20' type='number' name='quanti' id='quanti.$idEsca' value='1'></td>";
							echo "</td>";
						echo"</table>";
						echo "<input class= 'conferma' type='button' value='Aggiungi al carrello' onclick='aggiungi({$esca['idItem']})''>";
						echo "<input type='hidden' name='nome' id='nome.$idEsca' value={$esca['Nome']}>";
						echo "<input type='hidden' name='prezzo' id='prezzo.$idEsca' value={$esca['Prezzo']}>";

					echo "</li>";
				echo "</ul>";
			echo "</form>";										
		}
	?>
</ul>