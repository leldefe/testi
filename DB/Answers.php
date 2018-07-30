
<?php
require_once "Db.php";

class Answers extends Db {
	public function getById($id) {
		$data = NULL;
		$result = $this->query("SELECT * FROM `answers` where ID=$id");
		if($result->num_rows > 0) {
			$data = $result->fetch_assoc();
		}
		return $data;
	}

	public function getByQuestionId($id) {
		$data = [];
		$result = $this->query("SELECT * FROM `answers` where Quest_ID=$id");
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}	
		return $data;
	}
}
?>
