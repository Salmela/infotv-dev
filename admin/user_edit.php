<?php
require_once(dirname(__FILE__) . "/user_edit_ctrl.php");
$page = new UserEdit();
if(!$page->handleActions()) return;
?>
<input type="text" name="name" id="title" placeholder="Username" value="<?php $page->getName() ?>" />
<div class="settings-section">
	<h2>Reset password</h2>
	<table>
		<tr><td>Password: </td><td><input type="input" name="password" /></td></tr>
		<tr><td>Repeat password: </td><td><input type="input" name="repeat" /></td></tr>
	</table>
</div>
<div id="buttons">
	<input type="submit" value="Back" name="back" class="button" />
	<input type="submit" value="Delete" name="delete" class="button" />
	<input type="submit" value="Save" name="save" class="button" />
</div>
