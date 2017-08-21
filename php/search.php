<?php
require_once __DIR__ . "/config.php";
require_once DIR_UTIL . "bassShopDbManager.php";
require_once DIR_UTIL . "sessionUtil.php";
$out='';
global $bassShopDb;
if(isset($_POST['search'])){
	$item= $_POST['search'];
	$item= preg_replace("#[^0-9a-z]#i","", $item);
	$stmnt = $bassShopDb->prepare("SELECT * FROM items WHERE Nome LIKE '%$item%' /*or descrizione LIKE '%$item%'*/ LIMIT 5");
		checkQuery($stmnt);	
		$stmnt->execute();
		$result=$stmnt->get_result();
		$quanti = $result->num_rows;
		if($quanti==0){
			$out = "nessun risultato";
		}else{
			$vettore=toArray($result);
			foreach ($vettore as $esca) {
				$nome= $esca['Nome'];
				$idEsca= $esca['idItem'];
				$out .= "<a href=paginaDettagliata.php?idEsca=$idEsca>".$nome.'</a>';
				$out .= '<br>';
			}
		}
		
}
print_r($out);
?>