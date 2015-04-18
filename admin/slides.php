<?php
include("../check.php");
include("../backend/slides.php");
include("table.php");

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

include("slides_page.php");
?>
