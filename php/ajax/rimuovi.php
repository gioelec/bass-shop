<?php 
	 
    require_once __DIR__ .  "/../esca.php";
    require_once DIR_UTIL . "carrelloManager.php";
    session_start();

	if (!isset($_SESSION['carrello'])){
	    	$_SESSION['carrello']=Carrello::getIstanza();
	}
	print_r($_POST);
	$id=$_GET['id'];
	$carrello=$_SESSION['carrello'];
	$carrello->rem($id);
?>