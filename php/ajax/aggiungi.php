<?php 
	require_once __DIR__ . "/../esca.php";
	require_once DIR_UTIL . "carrelloManager.php";

    session_start();

	if (!isset($_SESSION['carrello'])){
	    	$_SESSION['carrello']=Carrello::getIstanza();
	}
	print_r($_POST);
	$item= new elementoCarrello($_GET['quanti'],$_GET['nome'],$_GET['prezzo'],$_GET['idEsca']);
	$carrello=$_SESSION['carrello'];
	$carrello->add($item);/*
	$esca =$_POST['esca'];
	$quantita=$_POST['quantita'];
	$carrello->add($esca,$quantita);*/
?>