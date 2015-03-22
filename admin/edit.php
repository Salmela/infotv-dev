<?php require_once("../check.php"); ?>
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
<form>
	<input type="text" name="title" id="title" placeholder="Title" />
	<textarea name="content" id="content-text"></textarea>
	<select name="theme"><option name="default">Default theme</option></select>
	<div id="buttons">
		<input type="submit" value="Back" name="back" class="button" />
		<input type="submit" value="Save" name="save" class="button" />
	</div>
</form>
