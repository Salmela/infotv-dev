<?php

require_once(dirname(__FILE__) . "/../config.php");

class DB {
	var $db;

	function __construct() {
		global $DB_USER, $DB_PASS, $DB_COMMAND;
		$this->db = new PDO($DB_COMMAND, $DB_USER, $DB_PASS);
	}

	function getPDO() {
		return $this->db;
	}
}

$infotv_db = new DB();

?>
