<?php
require_once(dirname(__FILE__) . "/font_edit_ctrl.php");
$edit_page = new FontEdit();
?>
<style>
.Bold {font-weight: bold;}
.Italic {font-style: italic;}
</style>
<input type="text" name="title" id="title" placeholder="Font family" />
<input type="text" name="lisence" id="title" placeholder="Lisence" />
<div class="panel">
	<h3>Add new font file</h3>
	<label><span>File: </span><input type="file" class="text" /></label><br />
	<label><span>Url: </span><input type="text" class="text" placeholder="www.example.com" /></label><br />
	<input type="submit" value="Add" class="button" />
</div>
<?php $edit_page->tryout_panel(); ?>
<?php $edit_page->font_faces(); ?>
<div id="buttons">
	<input type="submit" value="Back" name="back" class="button" />
	<input type="submit" value="Remove" name="remove" class="button" />
	<input type="submit" value="Save" name="save" class="button" />
</div>
<div class="clearfix"></div>
