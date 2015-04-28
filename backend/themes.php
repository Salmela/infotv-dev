<?php

require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/db.php");
require_once(dirname(__FILE__) . "/db_type.php");

class Theme {
	var $id;
	var $name;

	function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
	}

	function getId() {
		return $this->id;
	}

	function getName() {
		return $this->name;
	}
}

class Themes extends InfotvDBType {

	function __construct() {
		global $infotv_db, $DB_PREFIX;
		$this->db = $infotv_db->getPDO();
		parent::__construct("themes", "theme", array("theme_id", "name"));
	}

	function __update_internal($id, $object, $exists) {
		$row = array(
			"name" => $object->getName()
		);
		parent::__update_internal($id, $row, $exists);
	}

	function _object_create($row) {
		return new Theme($row["id"], $row["name"]);
	}
}

?>
