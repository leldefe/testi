<?php
require_once "Db.php";

class Tests extends Db {
	
	public function getById($id) {
		$data = NULL;
		$result = $this->query("SELECT * FROM `tests` where ID=$id");
		if($result->num_rows > 0) {
	   		$data = $result->fetch_assoc();
		}
		
		return $data;
	}

	public function getAll(){
		$data = [];

		$result = $this->query("SELECT * FROM `tests`");
		if($result->num_rows > 0) {
	   		while($row = $result->fetch_assoc()) {
	   			$data[] = $row;
	   		}
		}

		return $data;
	}
}

?>