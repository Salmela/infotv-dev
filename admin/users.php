<?php
include("../check.php");
include("table.php");

function func($row) {
	return array(
		"<a href=\"?page=user-edit&id=134\">Aleksi</a>",
		"12.3.2015",
		"Admin",
		"admin"
	);
}

$table = new Table(NULL, array("Name", "Created", "Rights", "Author"), array());
$table->setTransformFunc("func");
?>
<h1>Users</h1>
<div id="new-button"><a class="button" href="?page=user-edit&id=new">New user</a></div>
<p>List of all the users in the system.</p>
<?php $table->get(); ?>


