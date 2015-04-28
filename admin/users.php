<?php
require_once(dirname(__FILE__) . "/users_ctrl.php");
?>
<h1>Users</h1>
<div id="new-button"><a class="button" href="?page=user-edit&id=new">New user</a></div>
<p>List of all the users in the system.</p>
<?php $table->get(); ?>


