<?php
 

class Carrello {
	private $array=array();
	private $quantita=array();
	private $totale=0;
	private static $istanza=null;
	public static function getIstanza(){
		echo "istanza                      ";
		print_r(self::$istanza);
        if (!self::$istanza){
            self::$istanza=new Carrello();
            echo "nuovo Carrello";
        }
        return self::$istanza;
    }/*
    public function __construct() {
    	$this->$array=array();
    	$this->quantita=array();
		self::$istanza=$this;
		$this->totale=0;
	}*/
	public function add($item,$quan){
		$prezzo=$item->__get('prezzo');
		$this->totale=$this->totale+$prezzo[0]*$quan;
		array_push($this->array, $item);
		array_push($this->quantita,$quan);
	}
	public function getTotale(){
		return $this->totale;
	}
	public function getItems(){
		return $this->array;
	}
	public function getQt(){
		return $this->quantita;
	}
}