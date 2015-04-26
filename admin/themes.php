<?php

require_once(dirname(__FILE__) . "/../check.php");
require_once(dirname(__FILE__) . "/table.php");

function func($row) {
	return array(
		"<a href=\"?page=theme-edit&id=134\">Sport</a>",
		"12.3.2015",
		"Aleksi"
	);
}

$table = new Table(NULL, array("Name", "Created", "Author"), array());
$table->setTransformFunc("func");

require_once(dirname(__FILE__) . "/themes_page.php");

?>
