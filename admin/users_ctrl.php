<?php
require_once(dirname(__FILE__) . "/../check.php");
require_once(dirname(__FILE__) . "/../backend/users.php");
require_once(dirname(__FILE__) . "/table.php");

function func($user) {
	return array(
		"<a href=\"?page=user-edit&id=". $user->getId() ."\">". $user->getName() ."</a>",
		"12.3.2015",
		"Admin",
		"admin"
	);
}

$users = new Users();
$table = new Table(NULL, array("Name", "Created", "Rights", "Author"), $users->getAll());
$table->setTransformFunc("func");
?>
