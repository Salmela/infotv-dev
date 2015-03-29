<?php
require_once("config.php");

class Slide {
	var $title;
	var $content;
	var $modified;

	function __construct($title, $modified, $content) {
		$this->title = $title;
		$this->modified = $modified;
		$this->content = $content;
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
		global $DB_USER, $DB_PASS, $DB_HOST, $DB_NAME, $DB_PREFIX;

		$this->db_table = $DB_PREFIX ."_pages";
		$this->db = new PDO("mysql:host=". $DB_HOST .";dbname=". $DB_NAME .";charset=UTF8", $DB_USER, $DB_PASS);
	}

	function getAll($extractContent) {
		global $DB_PREFIX;

		try {
			$res = $this->db->query("SELECT p.title AS title, p.modifed AS modified FROM ". $this->db_table ." p");
			$rows = $res->fetchAll(PDO::FETCH_ASSOC);
		} catch(PDOException $ex) {
			echo "<h2>Server error 43578</h2>";
			die();
		}

		$slides = array();
		foreach($rows as $row) {
			$slides[] = new Slide($row["title"], $row["modified"], null);
		}
		return $slides;
	}

	function getById($id) {
		global $DB_PREFIX;

		/* force the $id to be number */
		if($id === NULL) {
			/*FIXME: ugly hack */
			$id = "0 OR 1 = 1";
		} else {
			$id = intval($id, 10);
		}

		try {
			$res = $this->db->query("SELECT * FROM ". $this->db_table ." p WHERE p.page_id = $id");
			if($res === false) {
				echo "<h2>Server error 52216</h2>";
				print_r($this->db->errorInfo());
				die();
			}
			$row = $res->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $ex) {
			echo "<h2>Server error 32446</h2>";
			die();
		}
		return new Slide($row["title"], $row["modified"], $row["content"]);
	}
}

?>
