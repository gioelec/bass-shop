<?php

require_once __DIR__ . "/config.php";
require_once DIR_UTIL . "bassShopDbManager.php";
require_once DIR_UTIL . "sessionUtil.php";
class Esca {
	private $idItem;
	private $nome;
	private $prezzo;
	private $peso;
	private $lunghezza;


	public function __construct($esca = array()) {
		if($esca) {
			$this->idItem = array_column($esca, 'idItem');
			$this->prezzo = array_column($esca, 'Prezzo');
			$this->peso = array_column($esca, 'Peso');
			$this->lunghezza = array_column($esca, 'Lunghezza');
			$this->nome = array_column($esca, 'Nome');
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


	public function create() {
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("INSERT INTO esche(prezzo,lunghezza,peso) VALUES(?,?,?)");
		//checkQuery($stmnt);
		$stmnt->bind_param("sss",$this->prezzo,$this->lunghezza,$this->peso);
		$stmnt->execute();
		$this->idItem = $bassShopDb->insert_id;
		return $this->idItem;
	}


	public function delete() {
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("DELETE FROM user WHERE idItem=?");
		//checkQuery($stmnt);
		$stmnt->bind_param("i",$this->idItem);
		return $stmnt->execute();
	}

	public static function getTendenza() {
		global $bassShopDb;
	


		$stmnt = $bassShopDb->prepare("SELECT idItem,Nome,prezzo,peso,lunghezza,Immagine,Descrizione
			FROM escheDiTendenza INNER JOIN items ON items.idItem=escheDiTendenza.idEsca
			WHERE items.Tipo='e' ORDER BY quanti DESC");
		checkQuery($stmnt);	
		
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getElencoEsche() {
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT idItem,nome,prezzo,peso,lunghezza,immagine,descrizione FROM items WHERE items.Tipo='e'  ORDER BY nome");
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getLatest($id){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT DISTINCT(items.nome) as Nome,Prezzo,Peso,Lunghezza,Immagine,Descrizione
				FROM items INNER JOIN acquisti
				 INNER JOIN clienti
				 ON items.idItem=acquisti.idItem and acquisti.idCliente=clienti.idclienti
				 WHERE clienti.email=?
				 ORDER BY Data DESC");
		$stmnt->bind_param("s",$id);
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getCanne(){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT * FROM items WHERE items.Tipo='c'  ORDER BY nome");
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getMulinelli(){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT * FROM items WHERE items.Tipo='m'  ORDER BY nome");
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}
	public static function getEsca(){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT * FROM items WHERE items.Tipo='e'  LIMIT 1");
		checkQuery($stmnt);	
		$stmnt->execute();
		$result = $stmnt->get_result();
		return toArray($result);
	}	
}

