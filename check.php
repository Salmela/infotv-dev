<?php
/* check that the file is included otherwice show the 404 not found page */
if(!defined("ADMIN") && !defined("MAIN")) {
	require(dirname(__FILE__) . "/nofound.html");
	die();
}
?>

