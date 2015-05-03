<?php
$index = new IndexPage(isset($_GET["id"]) ? $_GET["id"] : NULL);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title><?php $index->title(); ?></title>
	<link rel="stylesheet" href="/infotv-dev/style.css" />
</head>
<body>
<div id="page">
	<div id="content">
<?php $index->page(); ?>
	</div>
	<div id="nav">
<?php $index->nav(); ?>
	</div>
	<div id="clearfix"></div>
</div>
<p><a href="login.php">Login</a></p>
</body>
</html>
