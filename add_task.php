<?php

include_once "sql.php";
include_once "session.php";

if(isset($_POST['task_name']) && isset($_POST['list_id'])) {
	$task_name = $_POST['task_name'];
	$list_id = $_POST['list_id'];

	$sql_add = "INSERT INTO tasks(name, checked, list_id) VALUES('$task_name', 0, $list_id)";
	$added_task = mysqli_query($link, $sql_add);
}

header("Location: tasks.php?list_id=" . intval($list_id));
