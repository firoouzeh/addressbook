<?php
abstract class Model{
	protected $dbh;
	protected $stmt;
	protected $error;

	public function __construct(){

		// Set DSN
		$dsn = 'mysql:host='. DB_HOST . ';dbname='. DB_NAME;
		// Set Options
		$options = array(
			PDO::ATTR_PERSISTENT		=> true,
			PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION
		);
		// Create new PDO
		try {
			$this->dbh = new PDO($dsn, DB_USER, DB_PASS, $options);
		} catch(PDOException $e){
			$this->error = $e->getMessage();
			Messages::setMsg($this->error, 'error');
		}
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param,$value,$type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
					default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		try {
			$this->stmt->execute();
		} catch(PDOException $e){
			$this->error = $e->getMessage();
			Messages::setMsg($this->error, 'error');
		}
		return $this;
	}

	public function resultSet(){
		try {
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $e){
			$this->error = $e->getMessage();
			Messages::setMsg($this->error, 'error');
		}
	}
	
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}
	
	public function single(){
		try {
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e){
			$this->error = $e->getMessage();
			Messages::setMsg($this->error, 'error');
		}
	}
}