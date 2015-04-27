<?php

require_once(dirname(__FILE__) . "/index_ctrl.php");

if(isset($_GET["page"])) {
	$panel = new AdminPanel($_GET["page"]);
} else {
	$panel = new AdminPanel("");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Admin panel</title>
	<link rel="stylesheet" href="/infotv-dev/admin/style.css" />
</head>
<body>

<div id="page">
<div id="header">
	<div id="logo"><a href="/infotv-dev/">Admin panel</a></div>
	<div id="right-part"><?php $panel->getUserName(); ?>, <a href="?page=logout">Log out</a></div>
	<div class="clearfix"></div>
</div>
<div id="side">
<ul>
	<li><a href="?page=slides">Slides</a></li>
	<li><a href="?page=themes">Themes</a></li>
	<li><a href="?page=fonts">Fonts</a></li>
	<li><a href="?page=account">Account</a></li>
	<li><a href="?page=users">Users</a></li>
</ul>
</div>
<div id="content">
<?php $panel->getContent(); ?>
</div>

<div id="footer">Copyright &copy; 2015 Aleksi Salmela</div>
</div>

</body>
</html>
