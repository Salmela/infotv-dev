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

		if(isset($this->id)) {
			$this->id = (int)$this->id;
			$this->current = $this->themes->getById($this->id);
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
			if(isset($this->current)) {
				$this->themes->update($this->id, $_POST["title"], $_POST["content"]);
			} else {
				$this->themes->create($this->id, $_POST["title"], $_POST["content"]);
			}
		}
		return true;
	}

	function getTitle() {
		if(isset($this->current)) {
			echo $this->current->getName();
		}
	}
}
?>
