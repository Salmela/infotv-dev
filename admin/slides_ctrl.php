<?php

require_once(dirname(__FILE__) . "/../check.php");
require_once(dirname(__FILE__) . "/../backend/slides.php");
require_once(dirname(__FILE__) . "/table.php");

function func($slide) {
	return array(
		"<a href=\"?page=edit&id=". $slide->getId() ."\">". $slide->getTitle() ."</a>",
		"12.3.2015",
		"Aleksi"
	);
}

$slides = new Slides();
$table = new Table(NULL, array("Name", "Date", "Author"), $slides->getAll(false));
$table->setTransformFunc("func");

?>
