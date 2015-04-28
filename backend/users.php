<?php

require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/db.php");
require_once(dirname(__FILE__) . "/db_type.php");

class User {
	var $id;
	var $name;
	var $password_hash;
	var $salt;

	function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
	}

	function setInternal($hash, $salt) {
		$this->salt = $salt;
		$this->password_hash = $hash;
	}

	function getId() {
		return $this->id;
	}

	function getName() {
		return $this->name;
	}

	function getHash() {
		return $this->password_hash;
	}

	function getSalt() {
		return $this->salt;
	}

	function _computeHash($password) {
		$hash = hash("sha256", $this->salt . $password);
		return substr($hash, 0, 16);
	}

	function checkPassword($password) {
		return (_computeHash($password) == $this->password_hash);
	}

	function setPassword($password) {
		$this->salt = rand() + "";
		$this->password_hash = _computeHash($password);
	}
}

class Users extends InfotvDBType {
	var $table;

	function __construct() {
		global $infotv_db, $DB_PREFIX;
		$this->table = $DB_PREFIX ."_users";
		$this->db = $infotv_db->getPDO();
		parent::__construct("users", "user", array("user_id", "name", "password_hash", "salt"));
	}
	function _root_auth($username, $password) {
		global $ROOT_USER, $ROOT_PASS;
		if($username == $ROOT_USER && $password == $ROOT_PASS) {
			return true;
		}
		return false;
	}
	function authenticate($username, $password) {
		if($this->_root_auth($username, $password)) return true;

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
				$user = new User($row["id"], $row["name"]);
				$user->setInternal($row["hash"], $row["salt"]);
				if($user->checkPassword($password)) return true;
		}

		return false;
	}

	function __update_internal($id, $object, $exists) {
		$row = array(
			"name" => $object->getName(),
			"password_hash" => $object->getHash(),
			"salt" => $object->getSalt()
		);
		parent::__update_internal($id, $row, $exists);
	}

	function _object_create($row) {
		return new User($row["id"], $row["name"]);
	}
}

?>
