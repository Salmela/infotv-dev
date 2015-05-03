<?php
require_once(dirname(__FILE__) . "/theme_edit_ctrl.php");

$page = new ThemeEdit();
if(!$page->handleActions()) {
	return;
}
?>
<input type="text" name="title" id="title" placeholder="Theme name" />
