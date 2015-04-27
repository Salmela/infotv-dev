<?php
require_once(dirname(__FILE__) . "/slides_ctrl.php");
?>

<h1>Slides</h1>
<div id="new-button"><a class="button" href="?page=edit&id=new">New slide</a></div>
<p>List of all the slides in the system.</p>
<?php $table->get(); ?>
