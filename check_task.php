<?php

	include "connect.php";

	if (isset($_GET['task_id'])) {
		$task_id = $_GET['task_id'];
		$sql = 	"SELECT checked, list_id FROM tasks WHERE id = $task_id";

		$result = mysqli_query($link, $sql);
		$result = mysqli_fetch_assoc($result);

		$is_checked = $result['checked'];
		$list_id = $result['list_id'];

		$is_checked = $is_checked == 1 ? 0 : 1;

		$sql = "UPDATE tasks set checked = $is_checked WHERE id = $task_id";
		mysqli_query($link, $sql);

		header("Location: tasks.php?list_id=$list_id");
	}
