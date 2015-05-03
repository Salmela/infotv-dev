<?php
require_once(dirname(__FILE__) . "/theme_edit_ctrl.php");

$page = new ThemeEdit();
if(!$page->handleActions()) {
	return;
}
?>
<form action="#" method="post">
	<input type="text" name="title" id="title" value="<?php $page->getTitle() ?>" placeholder="Theme name" />
	<div id="buttons">
		<input type="submit" value="Back" name="back" class="button" />
		<input type="submit" value="Delete" name="delete" class="button" />
		<input type="submit" value="Save" name="save" class="button" />
	</div>
</form>
