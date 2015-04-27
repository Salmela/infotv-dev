<?php
// Variable $error may contain error message if this file was included from another file

class Login {
	var $errorMsg;

	function __construct($errorMsg) {
		$this->errorMsg = $errorMsg;
	}
	function formUrl() {
		echo "/infotv-dev/admin/";
		if(isset($_GET["page"])) {
			echo "?page=" . $_GET["page"];
		}
	}
	function errorMsg() {
		if(! isset($this->errorMsg)) return;
		echo "<div id=\"warning\">" . $this->errorMsg . "</div>";
	}
}

if(isset($error)) {
	$login = new Login($error);
} else {
	$login = new Login(NULL);
}

?>
