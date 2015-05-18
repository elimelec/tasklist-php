<?php

	include "connect.php";

	if (isset($_GET['task_id'])) {
		$task_id = $_GET['task_id'];
		$sql = 	"SELECT checked FROM tasks WHERE id = $task_id";
		
		$is_checked = $mysqli->query($sql)->fetch_object()->checked;
		var_dump($is_checked);
		$is_checked = $is_checked == 1 ? 0 : 1;

		$sql = "UPDATE tasks set checked = $is_checked WHERE id = $task_id";
		$mysqli->query($sql);

		echo "Checked/Unchecked task";
	}
