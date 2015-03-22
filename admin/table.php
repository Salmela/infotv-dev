<?php
include("../check.php");

class Table {
	var $columns;
	var $db_table;
	var $db_columns;
	var $transformation_func;

	function __construct($table, $columns, $db_columns) {
		assert(is_array($columns));
		assert(is_array($db_columns));

		$this->columns = $columns;
		$this->db_table = $table;
		$this->db_columns = $db_columns;
		$this->transformation_func = NULL;
	}

	function setTransformFunc($func) {
		$this->transformation_func = $func;
	}

	function printRow($columns) {
		echo "<tr>\n";
		foreach($columns as $column) {
			echo "\t<td>" . $column . "</td>\n";
		}
		echo "</tr>\n";
	}

	function startHtml() {
		echo "<table class=\"data-table\">";
		echo "<thead>";
		$this->printRow($this->columns);
		echo "</thead>";
		echo "<tfoot>";
		$this->printRow($this->columns);
		echo "</tfoot>";
	}

	function endHtml() {
		echo "</table>\n";
	}

	function get() {
		$this->startHtml();
		$func = $this->transformation_func;

		if(isset($this->transformation_func)) {
			$attributes = array();

			$attributes = $func($attributes);
			assert(count($attributes) == count($this->columns));

			$this->printRow($attributes);
		}
		$this->endHtml();
	}
}

?>
