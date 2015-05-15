<?php

	include "connect.php";

	if (isset($_GET['task_id'])) {
		$task_id = $_GET['task_id'];

		$sql_select_task = "SELECT name FROM tasks WHERE id = " . $task_id;
		$task_name = $mysqli->query($sql_select_task)->fetch_object()->name;

		$sql_delete_task = "DELETE FROM tasks WHERE id =" .$task_id;
		$delete_result = $mysqli->query($sql_delete_task);

		echo "Task with name $task_name was deleted";

	}

