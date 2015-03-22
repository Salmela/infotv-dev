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
?>
<h1>Themes</h1>
<div id="new-button"><a class="button" href="?page=edit&id=new">New theme</a></div>
<p>List of all the themes in the system.</p>

<?php $table->get(); ?>
