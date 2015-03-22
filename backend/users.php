<?php

require_once("../config.php");

class Users {
	function checkPassword($username, $password) {
		global $ROOT_USER, $ROOT_PASS;

		if($username != $ROOT_USER) {
			return false;
		}
		if($password != $ROOT_PASS) {
			return false;
		}
		return true;
	}
}

?>
