<?php
include("../check.php");
include("table.php");

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
<h1>Font families</h1>
<div id="new-button"><a class="button" href="?page=font-edit&id=new">New font family</a></div>
<p>List of all the fonts in the system.</p>
<?php $table->get(); ?>
