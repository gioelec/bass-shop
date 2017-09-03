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
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "PWEB">
    	<meta name = "keywords" content = "game">
		<link rel="stylesheet" href="../css/home.css" type="text/css" media="screen">
		<link rel="stylesheet" href="../css/login.css" type="text/css" media="screen">
		<!--<script type="text/javascript" src="./js/effects.js"></script>-->
		<link rel="icon" href = "../immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 	
		<title>Bass Shop - Upload</title>
	</head>
	<main>
		<form  id="createForm" class="sign_in" method="POST" action="util/upload.php" enctype="multipart/form-data">
			<article data-fragment data-name="Inserisci titolo, prezzo e tags" >
				<header><h3 id="info">Inserisci le informazioni principali</h3></header>

					<div class="left">
						
						<div id="uploader" class="lightwide">
							<!--<label for="cover">Scegli</label>
							<img src="../immagini/icon2.jpg" alt="cover picture">-->
							<input type="file" name="cover" id="cover"/>
							<!--<progress max="100" value="0"></progress>-->
						</div><br>
						<div> <!--NOME-->
							<label class="adminLabel" for="Nome">Nome Articolo</label><br>
							<input pattern="([a-zA-Z0-9]( ){0,1}){4,50}" title="Inserisci un titolo: da 4 a 50 caratteri o numeri"  class="lightwide" type="text" name="Nome" id="Nome" required>
						</div>
						<div><!--PREZZO-->
							<label class="adminLabel" for="Prezzo">Prezzo</label><br>
							<input required max="500" min="0" title="Inserisci un prezzo valido: da 0 a 500" class="lightwide" type="number" name="Prezzo" id="Prezzo">
						</div>
						<div><!--PESO-->
							<label class="adminLabel" for="Peso">Peso</label><br>
							<input required max="500" min="0" title="Inserisci un peso valido: da 0 a 500" class="lightwide" type="number" name="Peso" id="Peso" >
						</div>
						<div>
							<label class="adminLabel" for="Lunghezza">Lunghezza</label><br>
							<input required max="300" min="0" title="Inserisci una lunghezza valida: da 0 a 500" class="lightwide" type="number" name="Lunghezza" id="Lunghezza">
						</div>
						<div>
							<label class="adminLabel" for="Descrizione">Descrizione</label><br>
							<textarea class="lightwide" type="text" name="Descrizione" id="Descrizione" placeholder="Inserisci una descrizione fino a 500 caratteri"></textarea>
						</div>

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

<script type="text/javascript" src="../js/admin.js"></script>
<!--<script type="text/javascript">var instance = new Create();-->
</script>