<?php

	require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "bassShopDbManager.php"; 
    require_once DIR_UTIL . "sessionUtil.php";
    require_once __DIR__ . "/../cliente.php";
	
	$string = $_GET['username'];
	$tipo = $_GET['tipo'];
	if($tipo==0){// cerchiamo lo username
		$risultato = Cliente::exists_user($string);
	}else{  //cerco la mail
		$risultato = Cliente::exists_mail($string);
	}
	//echo "tipo";
	//echo $tipo;
	echo($risultato);


?>