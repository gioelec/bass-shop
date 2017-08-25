<?php  
	
	require_once __DIR__ . "/../config.php";
	require_once __DIR__ . "/../esca.php";
    require_once DIR_UTIL . "parametriDb.php";
    global $bassShopDb;
    $cover = $_FILES['cover']; // RECUPERO LA COPERTINA DEL DOCUMENTO

	$esca= new Esca($_POST);

	$coverId = $esca->create($cover,1);
	$_POST['cover'] = $coverId;
	header("Location: ../paginaDettagliata.php?idEsca=$coverId");