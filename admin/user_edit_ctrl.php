<?php

require_once(dirname(__FILE__) . "/../check.php");
require_once(dirname(__FILE__) . "/../backend/users.php");

class UserEdit {
	var $users;
	var $current;
	var $id;

	function __construct() {
		$this->users = new Users();
		$this->current = NULL;
		$this->id = (int)$_GET["id"];

		if(isset($this->id)) {
			$this->current = $this->users->getById($this->id);
		}
	}

	function handleActions() {
		global $panel;

		if(isset($_POST["back"])) {
			header("location: ". $_SERVER["SCRIPT_NAME"] ."?page=users");
			return false;

		} else if(isset($_POST["delete"])) {
			if(isset($this->current)) {
				$this->users->remove($this->id);
			}
			header("location: ". $_SERVER["SCRIPT_NAME"] ."?page=users");
			return false;

		} else if(isset($_POST["save"])) {
			if($_POST["password"] != $_POST["repeat"]) {
				$panel->appendError("Password were inequal.");
				return true;
			}

			if(isset($this->current)) {
				$this->current->setPassword($_POST["password"]);
				$this->users->update($this->id, $this->current);
			} else {
				$this->current = new User(-1, $_POST["name"]);
				$this->current->setPassword($_POST["password"]);
				$this->users->create($this->current);
			}
		}
		return true;
	}

	function getName() {
		if(isset($this->current)) {
			echo $this->current->getName();
		}
	}
}
?>
