<?php

require_once __DIR__ . "/config.php";
require_once DIR_UTIL . "bassShopDbManager.php";
require_once DIR_UTIL . "sessionUtil.php";
class Esca {
	public $idItem;
	public $nome;
	public $prezzo;
	public $peso;
	public $lunghezza;
	public $immagine;
	public $tipo;
	public $descrizione;

	public function __construct($fields = array()) {
		if($fields) {
			print_r($fields);
			//$this->idItem = array_column($esca, 'idItem');
			$this->prezzo = $fields['Prezzo'];
			$this->peso = $fields['Peso'];
			$this->lunghezza = $fields ['Lunghezza'];
			$this->nome = $fields ['Nome'];
			//$this->immagine= array_column($fields, ['Immagine']);
			$this->tipo= $fields['Tipo'];
			$this->descrizione= $fields ['Descrizione'];
		}
	}

	/*public function __wakeup() {
		$this->refresh();
	}*/

	public function __set($field,$value) {
		$this->$field = $value;
	}

	public function __get($field) {
		return $this->$field;
	}


	public function create($file,$sDb = 0) {
		global $bassShopDb;
		if($file){
			$extension = pathinfo($file['name'],PATHINFO_EXTENSION);
			$filename = basename($file['name'], ".$extension") . date("Ymdhis") . "." . $extension;
			move_uploaded_file($file['tmp_name'], "." . "./uploads/" . $filename);
			$path =  "./uploads/"  . $filename;
		}else
			$path="../immagini/esche/default.jpg";
		//echo $this->nome[0];
		if($sDb) {
			$stmnt = $bassShopDb->prepare("INSERT INTO items(Nome,Prezzo,Lunghezza,Peso,Descrizione,Immagine,Tipo) VALUES(?,?,?,?,?,?,?)");
			checkQuery($stmnt);
			$stmnt->bind_param("siiisss",$this->nome,$this->prezzo,$this->lunghezza,$this->peso,
				$this->descrizione,$path,$this->tipo);
			if(!$stmnt->execute())
				echo $bassShopDb->getConnection()->error;
			return $bassShopDb->getConnection()->insert_id; //return new file's database id
		}
		return $path;
	}


	public static function delete($id) {
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("DELETE FROM items WHERE idItem=?");
		checkQuery($stmnt);
		$stmnt->bind_param("i",$id);
		return $stmnt->execute();
	}

	public static function getTendenza() {
		global $bassShopDb;
	


		$stmnt = $bassShopDb->prepare("SELECT idItem,Nome,Prezzo,Peso,Lunghezza,Immagine,Descrizione,Tipo
			FROM escheDiTendenza INNER JOIN items ON items.idItem=escheDiTendenza.idEsca
			WHERE items.Tipo='e' ORDER BY quanti DESC");
		checkQuery($stmnt);	
		
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getElencoEsche() {
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT idItem,Nome,Prezzo,Peso,Lunghezza,Immagine,Descrizione,Tipo FROM items WHERE items.Tipo='e'  ORDER BY nome");
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getLatest($mail){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT DISTINCT(Nome),Prezzo,Peso,Lunghezza,Immagine,Descrizione,idItem,Tipo
			FROM (SELECT items.nome as Nome,Prezzo,Peso,Lunghezza,Immagine,Descrizione,items.idItem as 		idItem,data,Tipo
					FROM items INNER JOIN acquisti
				 	INNER JOIN clienti
				 	ON items.idItem=acquisti.idItem and acquisti.idCliente=clienti.idclienti
				 	WHERE clienti.email=?
				 	ORDER BY Data DESC) as D");
		$stmnt->bind_param("s",$mail);
		checkQuery($stmnt);		
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getCanne(){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT idItem,Nome,Prezzo,Peso,Lunghezza,Immagine,Descrizione,Tipo FROM items WHERE items.Tipo='c'  ORDER BY nome");
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getMulinelli(){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT idItem,Nome,Prezzo,Peso,Lunghezza,Immagine,Descrizione,Tipo FROM items WHERE items.Tipo='m'  ORDER BY nome");
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getEsca($id){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT idItem,Nome,Prezzo,Peso,Lunghezza,Immagine,Descrizione,Tipo FROM items WHERE idItem=?  LIMIT 1");
		$stmnt->bind_param("i",$id);
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}	
	/*public static function getImmagine($id){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT Immagine FROM items WHERE idItem=?  LIMIT 1");
		$stmnt->bind_param("i",$id);
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = toArray($stmnt->get_result());
		return $result[0];
		
	}*/	
	public static function getStatoOrdini($mail){
		global $bassShopDb;
		$stmnt = 
			$bassShopDb->prepare("SELECT items.nome,prezzo,quantita,spedito 
								  FROM acquisti 
 								  INNER JOIN clienti ON idCliente=idClienti INNER JOIN items ON items.idItem= acquisti.idItem
								  WHERE email=?
                                  ORDER BY data DESC");
		$stmnt->bind_param("s",$mail);
		checkQuery($stmnt);		
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
}

