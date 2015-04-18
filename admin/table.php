<?php
include("../check.php");

class Table {
	var $columns;
	var $db_table;
	var $db_rows;
	var $transformation_func;

	function __construct($table, $columns, $db_rows) {
		assert(is_array($columns));
		assert(is_array($db_rows));

		$this->columns = $columns;
		$this->db_table = $table;
		$this->db_rows = $db_rows;
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

		foreach($this->db_rows as $row) {
			$attributes = array();
			if(isset($this->transformation_func)) {
				$attributes = $func($row);
				assert(count($attributes) == count($this->columns));
			} else {
				$attributes = $row;
			}

			$this->printRow($attributes);
		}
		$this->endHtml();
	}
}

?>
