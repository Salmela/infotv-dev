<?php require_once(dirname(__FILE__) . "/fonts_ctrl.php"); ?>

<h1>Font families - Not functional</h1>
<div id="new-button"><a class="button" href="?page=font-edit&id=new">New font family</a></div>
<p>List of all the fonts in the system.</p>
<?php $table->get(); ?>
