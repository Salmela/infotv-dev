<?php
include("../check.php");
include("table.php");

function func($row) {
	return array(
		"<a href=\"?page=edit&id=134\">Test</a>",
		"12.3.2015",
		"Aleksi"
	);
}

$table = new Table(NULL, array("Name", "Date", "Author"), array());
$table->setTransformFunc("func");
?>
<h1>Slides</h1>
<div id="new-button"><a class="button" href="?page=edit&id=new">New slide</a></div>
<p>List of all the slides in the system.</p>
<?php $table->get(); ?>
