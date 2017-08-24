<?php 
	require_once __DIR__ . "/config.php";
    include DIR_UTIL . "sessionUtil.php";
    include __DIR__ . "/esca.php";
    require_once DIR_UTIL . "bassShopDbManager.php";
    
    session_start();

	 if (!isset($_SESSION['logged'])) {
    	exit();
    }
  	if ($_SESSION['logged']==false|| $_SESSION['admin']==0){
		    exit();
    }
    $id= $_GET['idAcquisto'];
    $tipo=$_GET['tipo'];
    //print_r($_POST);
    if($tipo==0){
    	$stmnt = $bassShopDb->prepare("UPDATE
        acquisti SET spedito=1 WHERE idAcquisto=?");
   		$stmnt->bind_param("i",$id);
    	checkQuery($stmnt);     
   		$stmnt->execute();
   	}else{
   		$stmnt = $bassShopDb->prepare("UPDATE
        acquisti SET visibile=0 WHERE idAcquisto=?");
   		$stmnt->bind_param("i",$id);
    	checkQuery($stmnt);     
   		$stmnt->execute();
   	}
?>