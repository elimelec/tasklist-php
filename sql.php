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

	function query($sql) {
		global $link;
		mysqli_query($link, $sql);
	}

?>
