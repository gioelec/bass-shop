<?php
	require_once __DIR__ . "/cliente.php";
	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "bassShopDbManager.php"; //includes Database Class
    require_once DIR_UTIL . "sessionUtil.php"; //includes session login

	session_start();
	$username = (isset($_POST['username']))? $_POST['username']: "";
	$password = (isset($_POST['password']))? $_POST['password']: "";
	$cliente = Cliente::auth($username,$password);
	$bassShopDb->closeConnection();

	if($cliente) {
		$_SESSION['email'] = $cliente->__get('email');
		$_SESSION['username']=$username;
		$_SESSION['logged'] = true;
		$_SESSION['admin']=$cliente->__get('livello');
		header('location: ./homepage.php');
	}
	else {
		echo "username o password errati";
	}

?>
   
