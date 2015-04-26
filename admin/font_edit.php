<?php

require_once(dirname(__FILE__) . "/../check.php");

class FontEdit {
	function __construct() {
	}

	function font_face($face) {
		$alphabet = array();

		for($j = 0, $i = 33; $i < 126; $i++, $j++) {
			$alphabet[$j] = chr($i);
		}
		for($i = 0xA0; $i < 0x200; $i++, $j++) {
			$alphabet[$j] = "&#$i;";
		}

		echo "\t<div class=\"panel\">\n";
		echo "\t\t<h3>" . $face . "\n";
		echo "\t\t\t<a class=\"button\" href=\"?page=font-edit&id=-1&delete=-1\">Delete</a></h3>\n";
		echo "\t\t<div class=\"clearfix\"></div>\n";
		echo "\t\t<div class=\"font-area " . $face . "\">\n";
		foreach($alphabet as $symbol) {
			echo "\t\t\t<div>$symbol</div>\n";
		}
		echo "\t\t</div>\n";
		echo "\t</div>\n";
	}

	function tryout_panel() {
		$is_bold = $is_italic = "";
		$classes = "";
		$text = "The quick brown fox jumps over the lazy dog.";

		if(isset($_POST["bold"])) {
			$is_bold = "checked";
			$classes = "Bold";
		}

		if(isset($_POST["italic"])) {
			$is_italic = "checked";
			$classes .= " Italic";
		}

		if(isset($_POST["example-text"])) {
			$text = $_POST["example-text"]; 
		}

		echo "<div class=\"panel\">";
		echo "<form action=\"?page=font-edit&id=-1\" method=\"post\">";
		echo "	<h3>Tryout the font</h3>";
		echo "	<input type=\"text\" class=\"text $classes\" id=\"font-test\" name=\"example-text\" value=\"$text\" /></br>";
		echo "	<label><input type=\"checkbox\" class=\"checkbox\" name=\"bold\" $is_bold /><span></span>Bold</label>";
		echo "	<label><input type=\"checkbox\" class=\"checkbox\" name=\"italic\" $is_italic /><span></span>Italic</label><br />";
		echo "	<input type=\"submit\" value=\"Update\" class=\"button\" />";
		echo "</form>";
		echo "</div>";
	}

	function font_faces() {
		$this->font_face("Normal");
		$this->font_face("Bold");
		$this->font_face("Italic");
	}

}
$edit_page = new FontEdit();
?>
<style>
.Bold {font-weight: bold;}
.Italic {font-style: italic;}
</style>
<input type="text" name="title" id="title" placeholder="Font family" />
<input type="text" name="lisence" id="title" placeholder="Lisence" />
<div class="panel">
	<h3>Add new font file</h3>
	<label><span>File: </span><input type="file" class="text" /></label><br />
	<label><span>Url: </span><input type="text" class="text" placeholder="www.example.com" /></label><br />
	<input type="submit" value="Add" class="button" />
</div>
<?php $edit_page->tryout_panel(); ?>
<?php $edit_page->font_faces(); ?>
<div id="buttons">
	<input type="submit" value="Back" name="back" class="button" />
	<input type="submit" value="Remove" name="remove" class="button" />
	<input type="submit" value="Save" name="save" class="button" />
</div>
<div class="clearfix"></div>
