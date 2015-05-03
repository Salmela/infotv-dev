<?php

require_once(dirname(__FILE__) . "/../check.php");
require_once(dirname(__FILE__) . "/../backend/themes.php");
require_once(dirname(__FILE__) . "/table.php");

function func($theme) {
	return array(
		"<a href=\"?page=theme-edit&id=". $user->getId() ."\">". $user->getName() ."</a>",
		"12.3.2015",
		"Aleksi"
	);
}

$themes = new Themes();
$table = new Table(NULL, array("Name", "Created", "Author"), $themes->getAll());
$table->setTransformFunc("func");

?>
