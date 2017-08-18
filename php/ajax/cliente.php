<?php
	require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "bassShopDbManager.php"; //includes Database Class
 	
	function username_esistente($username){  
		global $bassShopDbManager;
		$username = $bassShopDbManager->sqlInjectionFilter($username);
		$queryText = 'SELECT COUNT(idcliente) '
						. 'FROM clienti '
						. 'WHERE username='.'$username';
		$result = $bassShopDbManager->performQuery($queryText);
		$bassShopDbManager->closeConnection();
		return ($result==1); 
	}

	
?>
