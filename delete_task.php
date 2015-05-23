<?php

	include "connect.php";

	if (isset($_GET['task_id'])) {
		$task_id = $_GET['task_id'];

		$sql_select_task = "SELECT list_id FROM tasks WHERE id = $task_id";
		$result = mysqli_query($link, $sql_select_task);
		$result = mysqli_fetch_assoc($result);
		$list_id = $result['list_id'];

		$sql_delete_task = "DELETE FROM tasks WHERE id = $task_id";
		mysqli_query($link, $sql_delete_task);

		header("Location: tasks.php?list_id=$list_id");

	}
