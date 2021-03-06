<?php
require_once "/elementoCarrello.php";

class Carrello {
	private $array=array();
	private static $istanza=null;
	public static function getIstanza(){
		print_r(self::$istanza);
        if (!self::$istanza){
            self::$istanza=new Carrello();
        }
        return self::$istanza;
    }
	public function add($item){
		$prezzo=$item->__get('prezzo');
		$quan=$item->__get('quantita');
		$id=$item->__get('idEsca');
		//$this->totale=$this->totale+$prezzo[0]*$quan;
		foreach ($this->array as $elem) {
			if($id==$elem->__get('idEsca')){
				$elem->incQuantita($quan);
				return;
			}


		}
		array_push($this->array, $item);
	}
	public function getTotale(){
		$tot=0;
		foreach ($this->array as $item) {
			$tot+=$item->__get('prezzo')*$item->__get('quantita');
		}
		return $tot;

	}
	public function rem($id){
		$i=0;
		foreach ($this->array as $elem) {
			if($elem->__get('idEsca')==$id){
				array_splice($this->array, $i);
				return;
			}
			$i++;
		}
	}
	public function getItems(){
		return $this->array;
	}
	public function conferma($id){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("INSERT INTO acquisti (idCliente,idItem,quantita)
			VALUES (?,?,?)");
			checkQuery($stmnt);
		foreach ($this->array as $elem) {
			$idEsca=$elem->__get('idEsca');
			$quantita=$elem->__get('quantita');
			$stmnt->bind_param("iii",$id,$idEsca,$quantita);
			$stmnt->execute();
		}
		$this->totale=0;
		unset($this->array);
		$this->array=array();
		
	}
}