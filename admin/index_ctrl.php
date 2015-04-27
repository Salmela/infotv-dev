<?php

define('ADMIN', true);
require_once(dirname(__FILE__) . "/../backend/users.php");

class AdminPanel {
	var $user;
	var $pageID;

	var $PAGES = array(
		""       => "slides.php",
		"logout" => "logout.php",
		"slides" => "slides.php",
		"edit"   => "edit.php",
		"themes" => "themes.php",
		"users" => "users.php",
		"account" => "account.php",
		"fonts"  => "fonts.php",
		"font-edit" => "font_edit.php",
		"theme-edit" => "theme_edit.php",
		"user-edit" => "user_edit.php"
	);

	function __construct($pageID) {
		$error = $this->isLoggedIn();
		if(isset($error)) {
			include("../login.php");
			die();
		}
		$this->pageID = $pageID;
		$this->user   = $_SESSION["user"];

		if($this->pageID == "logout") {
			$this->logout();
		}
	}

	function isLoggedIn() {
		session_start();

		if(isset($_POST["user"]) && isset($_POST["password"])) {
			$users = new Users();
			$res = $users->authenticate($_POST["user"], $_POST["password"]);
			if($res) {
				$_SESSION["user"] = $_POST["user"];
				return NULL;
			}
			return "Username or password is invalid.";
		}

		if(isset($_SESSION["user"])) {
			return;
		}
		return "Your session has expired. Log in again.";
	}

	function logout() {
		$_SESSION["user"] = NULL;
		include("logout.php");
		die();
	}

	function getUserName() {
		echo $this->user;
	}

	function getContent() {
		if(array_key_exists($this->pageID, $this->PAGES)) {
			$file = $this->PAGES[$this->pageID];
			include $file;
		} else {
			include "not_found.php";
		}
	}
}
?>
