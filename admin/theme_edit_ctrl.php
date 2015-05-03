<?php
require_once(dirname(__FILE__) . "/../check.php"); 
require_once(dirname(__FILE__) . "/../backend/themes.php");

class ThemeEdit {
	var $themes;
	var $current;
	var $id;

	function __construct() {
		$this->themes = new Themes();
		$this->current = NULL;
		$this->id = $_GET["id"];

		if(is_int($this->id)) {
			$this->id = (int)$this->id;
			$this->current = $this->themes->getById($this->id);
		} else {
			$this->id = NULL;
			$this->current = new Theme(NULL, NULL);
		}
	}

	function handleActions() {
		if(isset($_POST["back"])) {
			header("location: ". $_SERVER["SCRIPT_NAME"] ."?page=themes");
			return false;

		} else if(isset($_POST["delete"])) {
			if(isset($this->current)) {
				$this->slides->remove($this->id);
			}
			header("location: ". $_SERVER["SCRIPT_NAME"] ."?page=themes");
			return false;

		} else if(isset($_POST["save"])) {
			$this->current->setName($_POST["title"]);

			if(isset($this->id)) {
				$this->themes->update($this->id, $this->current);
			} else {
				$this->themes->create($this->current);
			}
		}
		return true;
	}

	function getTitle() {
		if(isset($this->id)) {
			echo $this->current->getName();
		}
	}
}
?>
