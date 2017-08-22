
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
		//echo $newUserId;
		$errMessage=null;
		if ($newUserId<1) {
			$errMessage= "Username o email già esistenti";
			header('location: ./register.php?=errorMessage=' . $errMessage);
		}else{
			$cliente = Cliente::recuperaCliente($newUserId); // RECUPERO L'UTENTE APPENA CREATO ED ESEGUO IL LOGIN
			$_SESSION['email'] = $cliente->__get('email');
			$_SESSION['username']=$cliente->__get('username');
			$_SESSION['logged'] = true;
			$_SESSION['admin']=$cliente->__get('livello');
			$bassShopDb->closeConnection();
			header('location: ./homepage.php');
		}

		
	}
?>