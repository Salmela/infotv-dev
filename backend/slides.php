<?php

require_once(dirname(__FILE__) . "/../config.php");

class Slide {
	var $id;
	var $title;
	var $content;
	var $modified;

	function __construct($id, $title, $modified, $content) {
		$this->id = $id;
		$this->title = $title;
		$this->modified = $modified;
		$this->content = $content;
	}
	function getId() {
		return $this->id;
	}
	function getTheme() {
		return null;
	}
	function getTitle() {
		return $this->title;
	}
	function getContent() {
		if($this->content === null) {
			/* You must not call this function if you didn't request content */
			echo "<h2>Server error 58128</h2>";
			die();
		}
		return $this->content;
	}
}

class Slides {
	var $db;
	var $db_table;

	function __construct() {
		global $DB_TYPE, $DB_USER, $DB_PASS, $DB_HOST, $DB_NAME, $DB_PREFIX;

		$this->db_table = $DB_PREFIX ."_pages";
		$this->db = new PDO($DB_TYPE .":host=". $DB_HOST .";dbname=". $DB_NAME .";charset=UTF8", $DB_USER, $DB_PASS);
	}

	function getAll($extractContent) {
		global $DB_PREFIX;

		try {
			$res = $this->db->query("SELECT p.page_id AS id, p.title AS title, p.modified AS modified\n".
				"FROM ". $this->db_table ." p");
			if($res === false) {
				return array();
			}
			$rows = $res->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $ex) {
			echo "<h2>Server error 43578</h2>";
			die();
		}

		$slides = array();
		foreach($rows as $row) {
			$slides[] = new Slide($row["id"], $row["title"], $row["modified"], null);
		}
		return $slides;
	}

	function getById($id) {
		global $DB_PREFIX;
		$where_clause = "";

		if($id === NULL) {
			$where_clause = "";
		} else {
			/* force the $id to be number */
			$id = intval($id, 10);
			$where_clause = " WHERE p.page_id = ". $id;
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
		return new Slide($row["page_id"], $row["title"], $row["modified"], $row["content"]);
	}

	function remove($id) {
		$id = intval($id, 10);
		$res = $this->db->query("DELETE FROM ". $this->db_table ." p WHERE p.page_id = $id");
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

	function __update_internal($id, $title, $content, $exists) {
		$objects = array();
		if($exists) {
			$statement = $this->db->prepare("INSERT INTO ". $this->db_table .
				" (title, modified, content) VALUES (?, ?, ?)");
		} else {
			$statement = $this->db->prepare(
				"UPDATE ". $this->db_table ." p\n".
				"SET title = ?, modified = ?, content = ?\n".
				"WHERE p.page_id = ". $id);
		}
		$date = "2";
		$objects[] = $title;
		$objects[] = $date;
		$objects[] = $content;
		print($statement->queryString);
		print_r($objects);
		$res = $statement->execute($objects);
		if($res === false) {
			echo "<h2>Server error 93216</h2>";
			//*
			print_r($this->db->errorInfo());
			//*/
			die();
		}
	}
}

?>
