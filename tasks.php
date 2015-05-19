<?php

	include "connect.php";

	if (isset($_GET["list_id"])) {

		$list_id = $_GET["list_id"];

		$sql_select_tasks = "SELECT id, name, checked FROM tasks WHERE list_id = " . $list_id;
		$results = $mysqli->query($sql_select_tasks);

		echo "<a href='lists.php'>[home]</a><br>";
		echo "<a href='add_task.php?list_id=$list_id'>[add new task]</a> <br>";
		while($row = $results->fetch_assoc()) {
			$id = $row["id"];
			$name = $row["name"];
			$checked = $row["checked"];

			$checked_string = $checked == 0 ? "[ ]" : "[x]";
			echo "$checked_string $name <a href='check_task.php?task_id=$id'> [check/uncheck] </a> <a href='edit_task.php?task_id=$id'>[edit]</a> <a href='delete_task.php?task_id=$id'>[delete]</a> <br>";

		}
	}
?>
