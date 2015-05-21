<?php

	include "connect.php";

	if (isset($_GET['task_id'])) {
		$task_id = $_GET['task_id'];

		$sql_select_task = "SELECT list_id FROM tasks WHERE id = " . $task_id;
		$list_id = $mysqli->query($sql_select_task)->fetch_object()->list_id;

		$sql_delete_task = "DELETE FROM tasks WHERE id =" .$task_id;
		$delete_result = $mysqli->query($sql_delete_task);
		
		header("Location: tasks.php?list_id=$list_id");

	}

