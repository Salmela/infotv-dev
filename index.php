<?php

require_once(dirname(__FILE__) . "/backend/slides.php");

class IndexPage {
	var $slides;
	var $pageID;
	var $page;
	var $prevPage, $nextPage;

	function __construct($id) {
		$this->slides = new Slides();
		$this->pageID = $id;
		$slides = new Slides();

		$pages = $slides->getAll(false);
		for($i = 0; $i < count($pages); $i++) {
			$page = $pages[$i];
			if($page->getId() == $id) {
				$this->page = $page;
				break;
			}
		}
		if($i == count($pages)) {
			$i = 0;
			$this->page = $pages[0];
		}
		$this->prevPage = $pages[$i == 0 ? count($pages) - 1 : $i - 1];
		$this->nextPage = $pages[$i == count($pages) - 1 ? 0 : $i + 1];

		$this->page = $slides->getById($this->page->getId());
	}
	function title() {
		echo "Infotv thingy";
	}
	function page() {
		if(!isset($this->page)) {
			echo "There is no pages.";
			return;
		}
		echo $this->page->getContent();
	}
	function nav() {
		if($this->prevPage) {
			echo "\t\t<div id=\"prev\"><a href=\"index.php?id=". $this->prevPage->getId() ."\">Prev</a></div>\n";
		}

		if($this->nextPage) {
			echo "\t\t<div id=\"next\"><a href=\"index.php?id=". $this->nextPage->getId() ."\">Next</a></div>\n";
		}
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
