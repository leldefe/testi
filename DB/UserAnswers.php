<?php
require_once "Db.php";

class UserAnswers extends Db {
	public function getById($id) {
		$data = NULL;
		$result = $this->query("SELECT * FROM `user_answers` where ID=$id");
		if($result->num_rows > 0) {
			$data = $result->fetch_assoc();
		}
		return $data;
	}

	public function getByAnswerId($id) {
		$data = [];
		$result = $this->query("SELECT * FROM `user_answers` where Answ_ID=$id");
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}	
		return $data;
	}

	public function getByUserId($id) {
		$data = [];
		$result = $this->query("SELECT * FROM `user_answers` where User_ID=$id");
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
		}	
		return $data;
	}

	public function createNew($answerId, $userId) {
		return $this->insert("INSERT INTO user_answers (Answ_ID, User_ID) VALUES ('$answerId', '$userId')");
	}
} 
?>