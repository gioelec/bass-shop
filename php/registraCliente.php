
<?php
	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "bassShopDbManager.php";
    require_once DIR_UTIL . "sessionUtil.php";


    require DIR_UTIL . "parametriDb.php"; 
    require "./cliente.php";
    
    if(empty($_POST)===false){ 
		
	    session_start();

		$password = $_POST["password"];

		$_POST['password'] = $password;


		$newUser = new Cliente($_POST); // CREAZIONE DELL'OGGETTO UTENTE 

		$newUserId = $newUser->create(); // SALVATAGGIO NEL DB L'UTENTE 
		$errorMessage = valido($newUserId);
		if($errorMessage === null)
			header('location: ./homepage.php');
		else
			header('location: ./register.php?=errorMessage=' . $errorMessage);		
	}
	function valido($id){
		global $bassShopDb;
		if ($id<1) {
			return 'Username o email già esistenti';
		}else{
			$cliente = Cliente::recuperaCliente($id); // RECUPERO L'UTENTE APPENA CREATO 
			$_SESSION['email'] = $cliente->__get('email');
			$_SESSION['username']=$cliente->__get('username');
			$_SESSION['logged'] = true;
			$_SESSION['admin']=$cliente->__get('livello');
			$bassShopDb->closeConnection();
			return null;
		}
	}
?>