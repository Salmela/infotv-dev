<?php

require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/db.php");

class InfotvDBType {
	var $db;
	var $db_table;
	var $name;
	var $row;

	function __construct($db_table, $name, $row = NULL) {
		global $infotv_db, $DB_PREFIX;

		$this->db_table = $DB_PREFIX ."_". $db_table;
		$this->db = $infotv_db->getPDO();
		$this->name = $name;
		$this->row = $row;
	}

	function getAll($row = NULL) {
		if(isset($row)) {
			$row = $this->row;
			if(isset($row)) {
				print("getAll: row not defined.");
				die();
			}
		}
		$columns = "";
		foreach($row as $key => $value) {
			if($columns != "") $columns .= ", ";
			$columns .= "r.". $key;
		}
		try {
			$res = $this->db->query("SELECT $columns\n".
				"FROM ". $this->db_table ." r");
			if($res === false) {
				return array();
			}
			$rows = $res->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $ex) {
			echo "<h2>Server error 83473</h2>";
			die();
		}

		$objects = array();
		foreach($rows as $row) {
			$objects[] = _object_create($row);
		}
		return $objects;
	}

	function getById($id) {
		$where_clause = "";

		if(is_int($id)) {
			/* force the $id to be number */
			$where_clause = " WHERE r.". $this->name ."_id = ". $id;
		} else if($id === NULL) {
			$where_clause = "";
		} else {
			print("GetById: The id must be integer");
			die();
		}

		try {
			$res = $this->db->query("SELECT * FROM ". $this->db_table ." p ". $where_clause);
			if($res === false) {
				echo "<h2>Server error 52216</h2>";
				//*
				print_r($this->db->errorInfo());
				//*/
				die();
			}
			$row = $res->fetch(PDO::FETCH_ASSOC);
			if($res->rowCount() == 0) {
				return NULL;
			}
		} catch(PDOException $ex) {
			echo "<h2>Server error 32446</h2>";
			die();
		}
		return _object_create($row);
	}

	function remove($id) {
		if(is_int($id)) {
			print("remove: The id must be number.\n");
			die();
		}

		$res = $this->db->query("DELETE FROM ". $this->db_table ." r WHERE r.". $this->name ."_id = $id");
		if($res === false) {
			echo "<h2>Server error 37324</h2>";
			//*
			print_r($this->db->errorInfo());
			//*/
			die();
		}
	}

	function create($id, $title, $content) {
		$this->__update_internal($id, $title, $content, false);
	}
	function update($id, $title, $content) {
		$this->__update_internal($id, $title, $content, true);
	}

	function __update_internal($id, $row) {
		$objects = array();

		if(is_int($id)) {
			print("__update_internal: The id must be number.\n");
			die();
		}
		$objects = array();

		if(!$exists) {
			$labels = $question_marks = "";
			foreach($row as $key => $value) {
				if($labels != "") {
						$labels .= ", ";
						$question_marks .= ", ";
				}
				$labels .= $key;
				$question_marks .= "?";
				$objects[] = $value;
			}
			$statement = $this->db->prepare("INSERT INTO ". $this->db_table .
				" ($labels) VALUES ($question_marks)");
		} else {
			$sets = "";
			foreach($row as $key => $value) {
				if($sets != "") {
						$sets .= ", ";
				}
				$sets .= $key ." = ?";
				$objects[] = $value;
			}
			$statement = $this->db->prepare(
				"UPDATE ". $this->db_table ." r\n".
				"SET $sets\n".
				"WHERE r.". $this->name ."_id = ". $id);
		}

		$res = $statement->execute($objects);
		if($res === false) {
			echo "<h2>Server error 93216</h2>";
			//*
			print_r($this->db->errorInfo());
			//*/
			die();
		}
	}

	function _object_create($row) {
		return $row;
	}
}

?>
