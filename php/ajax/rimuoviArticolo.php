<?php 
	 
    require_once __DIR__ .  "/../esca.php";
    session_start();
	
	$idEsca=$_GET['idEsca'];
	//$path=Esca::getImmagine($idEsca);
	Esca::delete($idEsca);
	/*print_r($path);
	if (file_exists($path)) {
        unlink($path);
    }*/
?>