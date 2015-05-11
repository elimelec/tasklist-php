<?php

	include "connect.php";

	if (isset($_GET["list_id"])) {

		$list_id = $_GET["list_id"];

		$sql_select_tasks = "SELECT id, name, checked FROM tasks WHERE list_id = " . $list_id;
		$results = $mysqli->query($sql_select_tasks);

		while($row = $results->fetch_assoc()) {
			$id = $row["id"];
			$name = $row["name"];
			$checked = $row["checked"];

			$checked_string = $checked == 0 ? "[ ]" : "[x]";
			echo "$checked_string   $name <br>";

		}
	}
?>
