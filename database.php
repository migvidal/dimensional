<?php
class Database{
    //TODO sacar a archivo externo
	private static $dbHost = "localhost";
	private static $dbUser = "miguel";
	private static $dbPass = "miguel";
	private static $dbName = "dimensional";

	private $con;
	private $resultado;
	private $miNumRows;

	public function __construct(){
		$this->con = new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName);
	}

	public function disconnect(){
		$this->con->close();
	}

	public function hacerConsulta($sql){
		$this->resultado = $this->con->query($sql);
		if($this->resultado){
			$this->miNumRows = $this->resultado->num_rows;
		}
	}

	public function getNumRows(){
		return $this->miNumRows;
	}

	public function getRows(){
		$rows = array();
		for($i=0;$i<$this->miNumRows;$i++){
			$rows[$i] = $this->resultado->fetch_assoc();
		}
		return $rows;
	}


}
?>