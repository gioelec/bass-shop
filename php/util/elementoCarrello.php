<?php
class elementoCarrello{
	private $nome;
	private $quantita;
	private $prezzo;
	private $idEsca;
	public function __construct($q,$n,$p,$id) {
    	$this->quantita=$q;
    	$this->nome=$n;
		$this->prezzo=$p;
		$this->idEsca=$id;
	}
	public function __get($field) {
		return $this->$field;
	}
}