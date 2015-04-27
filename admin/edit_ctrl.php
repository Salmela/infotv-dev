<?php

require_once(dirname(__FILE__) . "/../check.php");
require_once(dirname(__FILE__) . "/../backend/slides.php");

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
