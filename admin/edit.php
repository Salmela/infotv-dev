<?php
require_once("../check.php");
require_once("../backend/slides.php");

class SlideEdit {
	var $slides;
	var $current;
	var $id;
	function __construct() {
		$this->slides = new Slides();
		$this->current = NULL;
		$this->id = $_GET["id"];

		if(isset($this->id)) {
			$this->current = $this->slides->getById($this->id);
		}
	}

	function handleActions() {
		if(isset($_POST["back"])) {
			header("location: ?page=slides");
			return false;

		} else if(isset($_POST["delete"])) {
			if(isset($this->current)) {
				$slides->delete($this->id);
			}
			header("location: ?page=slides");
			return false;

		} else if(isset($_POST["save"])) {
			if(isset($this->current)) {
				$this->slides->update($this->id, $_POST["title"], $_POST["content"]);
			} else {
				$this->slides->create($this->id, $_POST["title"], $_POST["content"]);
			}
		}
		return true;
	}

	function getTitle() {
		if(isset($this->current)) {
			echo $this->current->getTitle();
		}
	}

	function getContent() {
		if(isset($this->current)) {
			echo $this->current->getContent();
		}
	}
}
$page = new SlideEdit();
if(!$page->handleActions()) {
	return;
}
?>
<script type="text/javascript" src="scripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
	mode : "exact",
	elements : "content-text",
	theme : "advanced",
	plugins : "lists,style,contextmenu,fullscreen,noneditable,inlinepopups",

	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,|,bullist,numlist,|,forecolor,backcolor,|,fullscreen",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "none",
	theme_advanced_resizing : true,

	//content_css : "css/content.css"

});
</script>
<form action="#" method="post">
	<input type="text" name="title" id="title" placeholder="Title" value="<?php $page->getTitle(); ?>" />
	<textarea name="content" id="content-text"><?php $page->getContent(); ?></textarea>
	<select name="theme"><option name="default">Default theme</option></select>
	<div id="buttons">
		<input type="submit" value="Back" name="back" class="button" />
		<input type="submit" value="Delete" name="delete" class="button" />
		<input type="submit" value="Save" name="save" class="button" />
	</div>
</form>
