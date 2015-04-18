<?php
include("../check.php");
include("table.php");

function func($row) {
	return array(
		"<a href=\"?page=theme-edit&id=134\">Sport</a>",
		"12.3.2015",
		"Aleksi"
	);
}

$table = new Table(NULL, array("Name", "Created", "Author"), array());
$table->setTransformFunc("func");

include("themes_page.php");
?>
