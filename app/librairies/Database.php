<?php

/**
* Class Dababase /PDO
* connection to db
* @return result
*/

class Database {

	private string $host = DB_HOST;
	private string $user = DB_USER;
	private string $password = DB_PASSWORD;
	private string $dbName = DB_NAME;
	private $dbh;
	private $stmt;
	private $error;

	public function __construct(){

		// déclarer les DSN

		$dns = 'mysql:host=' . $this -> host . ';
				dbname=' . $this -> dbName ;

		$option = array(

			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

		// créer une nouvelle instance PDO (avec try et catch)

		try{
			$this -> dbh = new PDO($dns, $this -> user, $this -> password, $option);
		}
		catch(PDOEXCEPTION $e){

			$this -> error = $e -> getMessage();
			echo $this -> error;
		}


	}

	//prepare request

	public function query($sql){

		$this -> stmt = $this -> dbh -> prepare($sql);
	}

	// secure data (bindValue) (bind => relier)

	public function bind($param,$value,$type=null){

		if(is_null($type)){
			switch(true){

			case is_int($value) :
				$type= PDO::PARAM_INT;
				break;

			case is_bool($value) :
				$type = PDO::PARAM_BOOL;
				break;

			case is_null($value) :
				$type = PDO::PARAM_NULL;
				break;
			default :
				$type = PDO::PARAM_STR;

			}
		}

		$this -> stmt -> bindValue($param, $value, $type);

	}


	//execute prepared request

	public function execute(){
		return 	$this -> stmt -> execute();
	}

	//return all rows in a objet array

	public function resultSet(){

		$this -> execute();
		return $this -> stmt -> fetchAll(PDO::FETCH_OBJ);
	}

	public function single(){
		$this -> execute();
		return $this -> stmt -> fetch(PDO::FETCH_OBJ);
	}

	public function rowCount(){
		return $this -> stmt -> rowCount();
	}


}
