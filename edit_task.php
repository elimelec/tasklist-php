<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";
include_once "controller.php";

$task_name = request_get("task_name");
$task_id = request_get("task_id");

$parent = 0;
if(not_empty($task_name, $task_id)) {
	$task = get_item_task($task_id);
	$task['name'] = $task_name;
	set_item_task_name($task);

	$parent = $task['parent'];
}
redirect("items/$parent");
