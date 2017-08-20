
<?php
	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "bassShopDbManager.php";
    require_once DIR_UTIL . "sessionUtil.php";


    require DIR_UTIL . "parametriDb.php"; 
    require "./cliente.php";
    
    if(empty($_POST)===false){
		registra_cliente();
	}
	function registra_cliente(){  
		global $bassShopDb;
	    session_start();

		$password = $_POST["password"];

		$_POST['password'] = $password;


		$newUser = new Cliente($_POST); // CREAZIONE DELL'OGGETTO UTENTE A PARTIRE DALL'ARRAY POST

		$newUserId = $newUser->create(); // SALVATAGGIO IN DATABASE DELL'OGGETTO APPENA CREATO.

		echo $newUserId;
		if ($newUserId==-1) {
			echo "Username o email già esistenti";
			return;
		}
		$cliente = Cliente::recuperaCliente($newUserId); // RECUPERO L'UTENTE APPENA CREATO ED ESEGUO IL LOGIN
		$_SESSION['email'] = $cliente->__get('email');
		$_SESSION['username']=$cliente->__get('username');
		$_SESSION['logged'] = true;
		$_SESSION['admin']=$cliente->__get('livello');
		$bassShopDb->closeConnection();
		header("Location: homepage.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Bass Shop - Registrazione</title>
		<script type="text/javascript" src="../js/ajax/cercaUsernameUtilizzato.js"></script>
	</head>
<section id="sezione_registrazione">
	<header>
		<h1>Registrazione</h1>
		<br>
	</header>
		<form id="registerForm" method="POST" action="./register.php" >
			<div id="cA">
				<label id="nameW" for="nome">Nome</label><br>
				<input type="text" pattern="^[a-zA-Zìàèò ,.'-]+$" title="Inserisci un nome valido"  id="nome" name="nome"  required />
				<label id="surnameW"  for="cognome">Cognome</label><br>
				<input type="text" title="Inserisci un cognome valido" pattern="^[a-zA-Zìàèò ,.'-]+$"   id="cognome" name="cognome" required />
				<label for="username">Username</label>
				<input onfocusout="ajaxHandler();" data-query-error="Username già esistente" pattern="[a-zA-Z0-9_-]{6,10}"  title="Inserisci tra i 6 e i 10 caratteri,numeri o i simboli '-_'" type="text" name="username" id="username" required autofocus />
				<label for="email">Email</label><br>
				<input pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Inserisci un email corretta: email@provider.ext" type="email"  id="email" name="email" required>
				<label  for="password">Password</label>
				<input type="password" pattern=".{7,20}" title="Inserisci una password corretta: almeno 7 caratteri e/o numeri (max 20)"  id="password" name="password" required />
				<label for="password2">Ripeti</label>
				<input data-match="password" data-match-error="Le password non coincidono" type="password" id="password2" title="Le due password devono coincidere" name="password2" required />
			</div>
			<input class="pulsanti" type="submit" name= "submit" value="REGISTRATI" >
			</form>
		</section>
		</main>
		<!--<script type="text/javascript" src="js/components/index.js"></script>-->
	</body>

