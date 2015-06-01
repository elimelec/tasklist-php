<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";
include_once "controller.php";

if(isset($_POST['task_id']) && isset($_POST['task_name'])) {

	$task_name = $_POST['task_name'];
	$task_id = $_POST['task_id'];

	$task = get_item_task($task_id);
	$parent = $task['parent'];

	$task['name'] = $task_name;

	set_item_task_name($task);

	redirect("items/$parent");
}