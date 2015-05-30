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

	function add_item($name, $type, $parent, $user_id) {
		$hash = md5("web" . $name . $type . $parent . time());
		$sql = "INSERT INTO items(hash, name, type, parent, user_id) VALUES ('$hash', '$name', '$type', $parent, $user_id)";
		query($sql);

		$new_item = get_item_hash($hash);
		switch($new_item['type']) {
			case "task":
				add_item_task($new_item);
				break;
			case "group":
				add_item_group($new_item);
				break;
		}
	}

	function add_item_task($item) {
		$item_id = $item['id'];
		$sql = "INSERT INTO items_tasks(item_id) VALUES ($item_id)";
		query($sql);
	}

	function add_item_group($item) {
		$item_id = $item['id'];
		$sql = "INSERT INTO items_groups(item_id) VALUES ($item_id)";
		query($sql);
	}

	function get_item($item_id) {
		$sql = "SELECT * FROM items WHERE id = $item_id";
		return assoc_once(query($sql));
	}

	function get_item_hash($hash) {
		$sql = "SELECT * FROM items WHERE hash = '$hash'";
		return assoc_once(query($sql));
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

	function delete_item($item_id) {
		$sql = "DELETE FROM items WHERE id = $item_id";
		query($sql);

		$sql = "DELETE FROM items WHERE parent = $item_id";
		query($sql);

		$sql = "DELETE FROM items_groups WHERE item_id = $item_id";
		query($sql);

		$sql = "DELETE FROM items_tasks WHERE item_id = $item_id";
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
		return assoc_once(query($sql));
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
		return assoc_once(query($sql));
	}

	function query($sql) {
		global $link;
		return mysqli_query($link, $sql);
	}
