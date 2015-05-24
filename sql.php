<?php

	$host = "localhost";
	$password = "root";
	$user = "root";
	$db = "pufulist";

	$link = mysqli_connect($host, $user, $password, $db);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	}

	function add_list($list_name, $user_id) {
		$sql = "INSERT INTO lists(name, user_id) VALUES('$list_name', $user_id)";
		query($sql);
	}

	function delete_list($list_id) {
		$sql = "DELETE FROM tasks WHERE list_id = $list_id";
		query($sql);

		$sql = "DELETE FROM lists WHERE id = $list_id";
		query($sql);
	}

	function get_lists($user_id) {
		$sql = "SELECT * FROM lists WHERE user_id = $user_id";
		return query($sql);
	}

	function get_task($task_id) {
		$sql = "SELECT * FROM tasks WHERE id = $task_id";
		$task = query($sql);
		$task = mysqli_fetch_assoc($task);
		return $task;
	}

	function query($sql) {
		global $link;
		return mysqli_query($link, $sql);
	}

?>
