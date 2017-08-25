<?php 
	require_once __DIR__ . "/../esca.php";
	require_once __DIR__ . "/../cliente.php";
	require_once DIR_UTIL . "carrelloManager.php";
    session_start();
	if (!isset($_SESSION['carrello'])){
	    	$_SESSION['carrello']=Carrello::getIstanza();
	}
	$carrello=$_SESSION['carrello'];
	$mail=$_SESSION['email'];
	$id= Cliente::getId($mail);
	$idc=$id[0]['idClienti'];
	$carrello->conferma($idc);
	//header("Location: ./homepage.php");
?>