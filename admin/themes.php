<?php require_once(dirname(__FILE__) . "/themes_ctrl.php"); ?>

<h1>Themes</h1>
<div id="new-button"><a class="button" href="?page=theme-edit&id=new">New theme</a></div>
<p>List of all the themes in the system.</p>

<?php $table->get(); ?>
