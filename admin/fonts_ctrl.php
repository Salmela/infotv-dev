<?php

require_once(dirname(__FILE__) . "/../check.php");
require_once(dirname(__FILE__) . "/table.php");

function func($row) {
	return array(
		"<a href=\"?page=font-edit&id=134\">Cantarell</a>",
		"12.3.2015",
		"Aleksi"
	);
}

$table = new Table(NULL, array("Name", "Created", "User"), array());
$table->setTransformFunc("func");

?>
