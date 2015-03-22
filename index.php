<?php
require_once("backend/slides.php");

class IndexPage {
	var $slides;
	var $pageID;
	function __construct($id) {
		$this->slides = new Slides();
		$this->pageID = $id;
	}
	function title() {
		echo "Infotv thingy";
	}
	function page() {
		echo $this->slides->getContent($this->pageID);
	}
	function nav() {
		$next = "618";
		$prev = "43";

		if($prev) {
			echo "\t\t<div id=\"prev\"><a href=\"index.php?id=". $prev ."\">Prev</a></div>";
		}

		if($next) {
			echo "\t\t<div id=\"next\"><a href=\"index.php?id=". $next ."\">Next</a></div>";
		}
		echo "";
	}
}

if(isset($_POST["id"])) {
	$index = new IndexPage($_POST["id"]);
} else {
	$index = new IndexPage(NULL);
}
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
