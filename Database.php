<?php


class Database {
	//db params
	private $host = 'localhost';
	private $dbName = 'school-mapper';
	private $user = 'root';
	private $password = '';

	private $conn;


	//connect to db
	public function connect() {
		$this->conn = null;

		//PDO Instance
		try{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName,$this->user,$this->password);
			//set error
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $exception){
			echo 'Connection error'.$exception->getMessage();
		}
		return $this->conn;
	}

}
