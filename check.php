<?php
/* check that the file is included otherwice show the 404 not found page */
if(!defined("ADMIN") && !defined("MAIN")) {
	echo "<h1>page not found</h1>";
	die();
}
?>

