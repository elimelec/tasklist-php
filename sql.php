<?php

	$link = connect_mysql();

	function connect_mysql() {
		$host = "127.0.0.1";
		$password = "root";
		$user = "root";
		$db = "pufulist";

		$link = mysqli_connect($host, $user, $password, $db);

		if (mysqli_connect_errno()) {
			die(mysqli_connect_error());
		}

		return $link;
	}

	function get_items($user_id, $parent = 0) {
		$sql = "SELECT * FROM items WHERE user_id = $user_id AND parent = $parent";
		return assoc_items(query($sql));
	}

	function assoc_items($result) {
		$array = array();
		while ($row = mysqli_fetch_assoc($result)) {
			if($row['type'] == "task")
				$array[] = assoc_items_task($row);
			else
				$array[] = $row;
		}
		return $array;
	}

	function assoc_once($result) {
		return mysqli_fetch_assoc($result);
	}

	function assoc_items_task($task) {
		$task_id = $task['id'];
		$result = get_item_task($task_id);
		$task['checked'] = $result['checked'];
		return $task;
	}

	function get_item_task($task_id) {
		$sql = "SELECT * FROM items JOIN items_tasks ON item_id = items.id WHERE item_id = $task_id";
		return assoc_once(query($sql));
	}

	function set_item_task_check($task) {
		$checked = $task['checked'];
		$item_id = $task['item_id'];
		$sql = "UPDATE items_tasks SET checked = $checked WHERE item_id = $item_id";
		query($sql);
	}

	function set_item_task_name($task) {
		$name = $task['name'];
		$item_id = $task['item_id'];
		$sql = "UPDATE items SET name = '$name' WHERE id = $item_id";
		query($sql);
	}

	function get_item_group($group_id) {
		$sql = "SELECT * FROM items JOIN items_groups ON item_id = items.id WHERE item_id = $group_id";
		return assoc_once(query($sql));
	}

	function set_item_group_name($group) {
		$name = $group['name'];
		$item_id = $group['item_id'];
		$sql = "UPDATE items SET name = '$name' WHERE id = $item_id";
		query($sql);
	}

	function delete_session($token) {
		$sql = "DELETE FROM sessions WHERE token = '$token'";
		query($sql);
	}

	function get_user($username, $password = null) {
		$sql = "SELECT * FROM users WHERE user = '$username'";
		if ($password) {
				$sql = $sql . "AND password = '$password'";
		}
		$user = query($sql);
		$user = mysqli_fetch_assoc($user);
		return $user;
	}

	function add_user($username, $password) {
		$sql = "INSERT INTO users(user, password) VALUES('$username', '$password')";
		query($sql);
	}

	function get_new_user($username, $password) {
		add_user($username, $password);
		return get_user($username, $password);
	}

	function set_session($token, $user_id) {
		$sql = "INSERT INTO sessions(token, user_id) VALUES ('$token', $user_id)";
		query($sql);
	}

	function get_session($token) {
		$sql = "SELECT * FROM sessions WHERE token = '$token'";
		$session = query($sql);
		$session = mysqli_fetch_assoc($session);
		return $session;
	}

	function query($sql) {
		global $link;
		return mysqli_query($link, $sql);
	}

?>
