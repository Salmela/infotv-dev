<?php

require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/db.php");

class Users {
	var $table;
	function __construct() {
		global $infotv_db, $DB_PREFIX;
		$this->table = $DB_PREFIX ."_users";
		$this->db = $infotv_db->getPDO();
	}
	function _root_auth($username, $password) {
		global $ROOT_USER, $ROOT_PASS;
		if($username == $ROOT_USER && $password $ROOT_PASS) {
		}
	}
	function authenticate($username, $password) {
		if(_root_auth($username, $password)) return true;

		try {
			$res = $this->db->prepare("SELECT r.name AS name, r.password_hash AS hash, r.salt AS salt\n".
				"FROM ". $this->db_table ." r WHERE ?");
			$objects[] = $username;

			$res = $statement->execute($objects);
			if($res === false) {
				return array();
			}
			$row = $res->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $ex) {
			echo "<h2>Server error 45634</h2>";
			die();
		}

		if(isset($row)) {
				$hash = hash("sha256", $row["salt"] . $password);
				if($hash == $row["hash"]) return true;
		}

		return false;
	}
}

?>
