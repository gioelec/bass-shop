
<?php
	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "bassShopDbManager.php";
    require_once DIR_UTIL . "sessionUtil.php";


    require DIR_UTIL . "parametriDb.php"; 
    require "./cliente.php";
    
    if(/*isset($_POST['submit']*/empty($_POST)===false){
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
	//	$user = User::read($newUserId); // RECUPERO L'UTENTE APPENA CREATO ED ESEGUO IL LOGIN
	//	$_SESSION['user'] = $user;
	//	$_SESSION['logged'] = true;
		$bassShopDb->closeConnection();
		setSession($_POST["username"], $newUserId);
		header("Location: homepage.php");
	}
	/*if(/*isset($_POST['submit']empty($_POST)===false){
		registra_cliente();
	}
	function registra_cliente(){  

		global $bassShopDb;
		if ($bassShopDb->connectionOK()) {
			echo "morto";
		    die("Connection failed: " . $conn->connect_error);
		}

		$stmt = $bassShopDb->prepare("INSERT INTO clienti (username, password, nome,cognome,email) VALUES (?, ?, ?,?,?)");
		$stmt->bind_param("sssss", $username, $password,$nome,$cognome,$email);

		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$password =  filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$nome =  filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
		$cognome =  filter_var($_POST['cognome'], FILTER_SANITIZE_STRING);
		$email =  filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		echo "eseguo";

		$stmt->execute();


		$stmt->close();
	}*/

?>

<section id="sezione_registrazione">
	<header>
		<h1>Registrazione</h1>
		<br>
	</header>
		<form id="registerForm" method="POST" action="./register.php" >
			<div id="cA">
				<label id="nameW" for="name">Nome</label><br>
				<input type="text" pattern="^[a-zA-Zìàèò ,.'-]+$" title="Inserisci un nome valido"  id="nome" name="nome"  required />
				<label id="surnameW"  for="surname">Cognome</label><br>
				<input type="text" title="Inserisci un cognome valido" pattern="^[a-zA-Zìàèò ,.'-]+$"   id="cognome" name="cognome" required />
				<label for="usernameR">Username</label>
				<input data-query="./php/async/exists.php?label=" data-query-error="Username già esistente" pattern="[a-zA-Z0-9_-]{6,10}"  title="Inserisci tra i 6 e i 10 caratteri,numeri o i simboli '-_'" type="text" name="username" id="usernameR" required />
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

