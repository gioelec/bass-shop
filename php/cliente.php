<?php
require_once __DIR__ . "/config.php";
require_once DIR_UTIL . "bassShopDbManager.php";
require_once DIR_UTIL . "sessionUtil.php";
class Cliente{
	private $idCliente;
	private $username;
	private $password;
	private $nome;
	private $cognome;
	private $email;
	private $livello;
	public function __construct($fields = array()) {
		if($fields) {
			$this->username = $fields['username'];
			$this->password = $fields['password'];
			$this->email = $fields['email'];
			$this->nome = $fields['nome'];
			$this->cognome = $fields['cognome'];
			$this->livello = 0;
		}
	}
	public static function auth($username,$password) {
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT * FROM clienti WHERE BINARY username=?");
		checkQuery($stmnt);	
		$stmnt->bind_param("s",$username);
		$stmnt->execute();
		$result = $stmnt->get_result();
		$cliente = $result->fetch_object('Cliente');
		if(!$cliente) return null;
		if($cliente->password===$password){
			echo $cliente->idCliente;
			echo $password;
			return $cliente;
		}
		else
			return null;
	}
	public function __set($field,$value) {
		$this->$field = $value;
	}

	public function __get($field) {
		return $this->$field;
	}
	public function create() {
		global $bassShopDb;
		if(($this->exists_mail($this->username))>0||($this->exists_user($this->username))>0){
			return -1;
		}
		$stmnt = $bassShopDb->prepare("INSERT INTO clienti(username,password,email,nome,cognome) VALUES(?,?,?,?,?)");
		checkQuery($stmnt);
		$stmnt->bind_param("sssss",$this->username,$this->password,$this->email,$this->nome,$this->cognome);
		$stmnt->execute();
		$this->idCliente = $bassShopDb->getConnection()->insert_id;
		return $this->idCliente;
	}
	public static function exists_mail($email){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT * FROM clienti WHERE  BINARY email = ?");
		//checkQuery($stmnt);	
		$stmnt->bind_param("s",$email);
		$stmnt->execute();
		$num = $stmnt->get_result()->num_rows;
		return $num;
	}
	public static function exists_user($username){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT * FROM clienti WHERE  BINARY username = ? ");
		//checkQuery($stmnt);	
		$stmnt->bind_param("s",$username);
		$stmnt->execute();
		$num = $stmnt->get_result()->num_rows;
		return $num;
	}
	public static function recuperaCliente($id) {
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT * FROM clienti WHERE idClienti=?");
		checkQuery($stmnt);
		$stmnt->bind_param("i",$id);
		$stmnt->execute();
		$result = $stmnt->get_result();
		if($result->num_rows == 0) {
			throw new Exception("Nessun utente trovato");
		}
		$cliente = $result->fetch_object('Cliente');

		return $cliente;
	}
	public static function getId($mail){
		global $bassShopDb;
		$stmnt = $bassShopDb->prepare("SELECT idClienti FROM clienti WHERE email=?");
		checkQuery($stmnt);
		$stmnt->bind_param("s",$mail);
		$stmnt->execute();
		$result = $stmnt->get_result();
		if($result->num_rows == 0) {
			throw new Exception("Nessun utente trovato");
		}
		return toArray($result);
	}
}