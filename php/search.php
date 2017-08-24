<?php
require_once __DIR__ . "/config.php";
require_once DIR_UTIL . "bassShopDbManager.php";
require_once DIR_UTIL . "sessionUtil.php";
$out='';
global $bassShopDb;
?>
<!DOCTYPE html>
<html lang="it">
<body>
	<head>
		<meta charset="utf-8"> 
    	<meta name = "author" content = "PWEB">
    	<meta name = "keywords" content = "game">
		<link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
		<link rel="icon" href = "./../immagini/icon2.jpg" sizes="32x32" type="image/jpg"> 
		<title>Bass Shop - Search</title>
	</head>
	<?php

		if(isset($_POST['search'])){
			$item= $_POST['search'];
			$item= preg_replace("#[^0-9a-z]#i","", $item);
			$stmnt = $bassShopDb->prepare("SELECT * FROM items WHERE Nome LIKE '%$item%' /*or descrizione LIKE '%$item%'*/ LIMIT 5");
				checkQuery($stmnt);	
				$stmnt->execute();
				$result=$stmnt->get_result();
				$quanti = $result->num_rows;
				if($quanti==0){
					$out = "<h1 id=titolo_risultati>nessun risultato</h1>";
				}else{

					$vettore=toArray($result);
					$out = "<h1>La tua ricerca ha prodotto i seguenti risultati: </h1>";
					$out.="<ul class=risultati>";
					foreach ($vettore as $esca) {
						$nome= $esca['Nome'];
						$idEsca= $esca['idItem'];
						$out .= "<a href=paginaDettagliata.php?idEsca=$idEsca".$nome."><li>$nome</li></a>";
					}
					$out.="</ul>";
				}
				
		}
		print_r($out);
	?>
	</body>
</html>