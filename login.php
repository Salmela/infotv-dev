<?
require(dirname(__FILE__) . "/login_ctrl.php");

if(isset($error)) {
	$login = new Login($error);
} else {
	$login = new Login(NULL);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Login</title>

	<link rel="stylesheet" href="/infotv-dev/style.css" />
</head>
<body id="login-page">
<div id="login-dialog">
	<h1>Login</h1>
<?php $login->errorMsg(); ?>
<form action="<?php $login->formUrl(); ?>" method="post">
	<div class="row">Username:<input type="text" name="user" /></div>
	<div class="row">Password:<input type="password" name="password" /></div>
	<div class="buttons"><input type="submit" value="Login"></div>
	<p>If you have forgotten your password, you are out of luck</p>
</form>
</div>
</body>
</html>
