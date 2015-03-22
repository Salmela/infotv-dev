<?php
// Variable $error may contain error message if this file was included from another file

class Login {
	var $errorMsg;

	function __construct($errorMsg) {
		$this->errorMsg = $errorMsg;
	}
	function formUrl() {
		echo "/infotv-dev/admin/";
		if(isset($_GET["page"])) {
			echo "?page=" . $_GET["page"];
		}
	}
	function errorMsg() {
		if(! isset($this->errorMsg)) return;
		echo "<div id=\"warning\">" . $this->errorMsg . "</div>";
	}
}

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
<body>
<div id="login-page">
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
