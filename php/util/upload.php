<?php  
	
	require_once __DIR__ . "/../config.php";
	require_once __DIR__ . "/../esca.php";
    require_once DIR_UTIL . "parametriDb.php";
    global $bassShopDb;
    print_r($_POST);
    $cover = $_FILES['cover']; // RECUPERO LA COPERTINA DEL DOCUMENTO
	//print_r($cover);
	$esca= new Esca($_POST);
	//print_r($esca);
	
	if(!$cover['error']) {  // SE LA COPERTINA E' STATA CARICATA CON SUCCESSO LA SALVO 
		//echo "iffff";
		$coverId = $esca->create($cover,1);
		$_POST['cover'] = $coverId;
	}