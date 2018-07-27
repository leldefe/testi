<?php
require_once "Db.php";

class Users extends Db {
	
	public function createNew($name) {
		return $this->insert("INSERT INTO users (User_Name) VALUES ('$name')");
	}
}

?>