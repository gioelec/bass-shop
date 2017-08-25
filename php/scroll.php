<?php 
require_once __DIR__ . "/config.php";
require_once DIR_UTIL . "sessionUtil.php";
require_once __DIR__ . "/esca.php";
$escheDiTendenza=$_SESSION['elenco'];
$admin = $_SESSION['admin'];
$dettagliata = $_SESSION['dettagliata']; 
?>
	<?php
		foreach($escheDiTendenza as $esca) {
			$idEsca=$esca['idItem'];
			echo"<form>";
				echo "<ul class='pubblicizza' id='elemento.$idEsca'>";
					echo "<li>";
						echo "<h1 class= 'nome'>{$esca['Nome']}</h1> ";
						echo "<a href='paginaDettagliata.php?idEsca=$idEsca'>";
							echo "<img class= 'vendita' alt='cover' src={$esca['Immagine']} height='355' width='300'>";//>";
						echo "</a>";
						//echo "<figcaption>";
	        				echo "<p>{$esca['Descrizione']}</p>";
	    				//echo "</figcaption>";
						
						echo"<table class='caratteristiche'>";
							echo "<tr>";
								echo "<th>Prezzo</th>";
								echo "<th>Peso</th>";
								if($esca['Tipo']!=='m')
									echo "<th>Lunghezza</th>";
								echo "<th>Quantità</th>";
								if ($admin==1) {
									echo"<th>Rimuovi dalla vendita</th>";
								}
							echo "</tr>";
							echo "<tr>";
								echo "<td>{$esca['Prezzo']} €</td>";
								echo "<td>{$esca['Peso']} gr</td>";
								if($esca['Tipo']!=='m')
									echo "<td>{$esca['Lunghezza']} cm</td>";
								echo "<td><input required max='20' min='1' title='Inserisci una quantità valida da 1 a 20' type='number' name='quanti' id='quanti.$idEsca' value='1'></td>";
								if ($admin==1) {
									echo "<td class='cestino'><img src='./../immagini/cestino.png' alt='elimina' width=32 height=32 onclick='rimuoviArticolo({$esca['idItem']},$dettagliata)' /></td>";
								}
						echo"</table>";
						echo "<input class= 'conferma' type='button' value='Aggiungi al carrello' onclick='aggiungi({$esca['idItem']})'>";
						echo "<input type='hidden' name='nome' id='nome.$idEsca' value={$esca['Nome']}>";
						echo "<input type='hidden' name='prezzo' id='prezzo.$idEsca' value={$esca['Prezzo']}>";

					echo "</li>";
				echo "</ul>";
			echo "</form>";										
		}
	?>