<?php
require_once "Db.php";

class Questions extends Db {
	
	public function getById($id) {
		$data = NULL;
		$result = $this->query("SELECT * FROM `questions` where ID=$id");
		if($result->num_rows > 0) {
	   		$data = $result->fetch_assoc();
		}
		
		return $data;
	}

	public function getByTestId($id) {
		$data = [];
		$result = $this->query("SELECT * FROM `questions` where Test_ID=$id");
		if($result->num_rows > 0) {
	   		while($row = $result->fetch_assoc()) {
	   			$data[] = $row;
	   		}
		}
		
		return $data;
	}
}

?>