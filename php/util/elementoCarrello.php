<?php
class elementoCarrello{
	private $nome;
	private $quantita;
	private $prezzo;
	public function __construct($q,$n,$p) {
    	$this->quantita=$q;
    	$this->nome=$n;
		$this->prezzo=$p;
	}
	public function __get($field) {
		return $this->$field;
	}
}