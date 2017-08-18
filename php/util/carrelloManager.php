<?php
 
$carrello = new Carrello();

class Carrello {
	private $array=array();
	private $quantita=array();
	private $totale=0;
	public function add($item,$quan){
		$this->totale+=prezzo;
		array_push($this->array, $item);
		array_push($this->quantita,$quan);
	}
	public function getTotale(){
		return $this->totale;
	}
}