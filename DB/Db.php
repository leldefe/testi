<?php
error_reporting(-1);
ini_set('display_errors', 'On');

//savienojamies ar datu bāzi
class Db {
	private $_conn;

	public function __construct(){
		$servername = "localhost";
		$username = "root";
		$password = "parole123";
		$db = "drgroupskola";

		$this->_conn = mysqli_connect($servername, $username, $password, $db);
	}
	

	public function query($sql){
 		return $this->_conn->query($sql);
	}

	public function insert($sql){
		$this->_conn->query($sql);

		return $this->_conn->insert_id;
	}
}

?>