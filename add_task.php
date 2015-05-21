<?php

include_once "connect.php";
include_once "session.php";

if(isset($_POST['save'])) {
	$task_name = $_POST['task_name'];
	$list_id = $_POST['list_id'];

	$sql_add = "INSERT INTO tasks(name, checked, list_id) VALUES('$task_name', 0, $list_id)";
	$added_task = $mysqli->query($sql_add);
}

header("Location: tasks.php?list_id=" . intval($list_id));
