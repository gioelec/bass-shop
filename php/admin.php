<?php
	require_once __DIR__ . "/config.php";
    include DIR_UTIL . "sessionUtil.php";
    include __DIR__ . "/esca.php";
    
    session_start();
    if (!isset($_SESSION['logged'])) {
    	exit();
    }
  	if ($_SESSION['logged']==false|| $_SESSION['admin']==0){
		    header('Location: ./../index.php');
		    exit;
    }
?>
<!DOCTYPE html>
<html lang="it">
	<main>
		<header><h2>Inserimento Elemento</header>

		<form  id="createForm" method="POST" action="util/upload.php" enctype="multipart/form-data">
			<article data-fragment data-name="Inserisci titolo, prezzo e tags" >
				<header><h3>Inserisci le informazioni principali</h3></header>

					<div class="left">
						<label for="cover">Copertina (clicca per cambiare)</label>
						<div id="uploader" class="fileInput pictureInput">
							<img src="" alt="cover picture">
							<input type="file" name="cover" id="cover"/>
							<!--<progress max="100" value="0"></progress>-->
						</div><br>
						<label for="Nome">Titolo</label><br>
						<input size="50"  pattern="([a-zA-Z0-9]( ){0,1}){4,50}" title="Inserisci un titolo: da 4 a 50 caratteri o numeri"  class="light" type="text" name="Nome" id="Nome" required>
						<label for="Prezzo">Prezzo</label><br>
						<input required max="500" min="0" title="Inserisci un prezzo valido: da 0 a 500" class="light" type="number" name="Prezzo" id="Prezzo">

						<label for="Peso">Prezzo</label><br>
						<input required max="500" min="0" title="Inserisci un peso valido: da 0 a 500" class="light" type="number" name="Peso" id="Peso">

						<label for="Lunghezza">Lunghezza</label><br>
						<input required max="300" min="0" title="Inserisci una lunghezza valida: da 0 a 500" class="light" type="number" name="Lunghezza" id="Lunghezza">

						<input size="500"  pattern="([a-zA-Z0-9]( ){0,1}){4,50}" title="Inserisci una descrizione fino a 500 caratteri"  class="light" type="text" name="Descrizione" id="Descrizione" required>

						<select name="Tipo" id="Tipo">
						  <option value="e">Esca</option>
						  <option value="c">Canna</option>
						  <option value="m">Mulinello</option>
						</select>

						<input class="prettyButton" id="submitForm" type="submit" value="Hai finito. Crea il documento!" onclick="upload()">
					</div>
			</article>


		</form>


	</main>
</body>

<script type="text/javascript" src="./js/admin.js"></script>
<!--<script type="text/javascript">var instance = new Create();-->
</script>