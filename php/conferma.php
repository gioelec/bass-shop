<?php 
	include "./util/carrelloManager.php";
    include  "./esca.php";
    include "./cliente.php";
    session_start();
	if (!isset($_SESSION['carrello'])){
	    	$_SESSION['carrello']=Carrello::getIstanza();
	}
	$carrello=$_SESSION['carrello'];
	$mail=$_SESSION['email'];
	$id= Cliente::getId($mail);
	$carrello->conferma($id);
	//header("Location: ./homepage.php");
?>