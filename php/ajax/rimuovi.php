<?php 
	include "./util/carrelloManager.php";
    include  "./esca.php";
    session_start();

	if (!isset($_SESSION['carrello'])){
	    	$_SESSION['carrello']=Carrello::getIstanza();
	}
	print_r($_POST);
	$id=$_GET['id'];
	$carrello=$_SESSION['carrello'];
	$carrello->rem($id);
?>