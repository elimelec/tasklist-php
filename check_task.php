<?php

include "sql.php";

if (isset($_GET['task_id'])) {
	$task_id = $_GET['task_id'];

	$task = get_item_task($task_id);
	$task['checked'] = $task['checked'] == 0 ? 1 : 0;
	set_item_task_check($task);

	header("Location: items.php?parent=" . intval($task['parent']));
}
