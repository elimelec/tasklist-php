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

	function get_list($list_id) {
		$sql = "SELECT * FROM lists WHERE id = $list_id";
		$list = query($sql);
		$list = mysqli_fetch_assoc($list);
		return $list;
	}

	function update_list($list) {
		$sql = "UPDATE lists SET name = '{$list['name']}' WHERE id = {$list['id']}";
		query($sql);
	}

	function get_task($task_id) {
		$sql = "SELECT * FROM tasks WHERE id = $task_id";
		$task = query($sql);
		$task = mysqli_fetch_assoc($task);
		return $task;
	}

	function get_items($user_id, $parent = 0) {
		$sql = "SELECT *
			FROM items
		JOIN
			(SELECT name, item_id FROM items_groups
			UNION
			SELECT name, item_id FROM items_tasks) as all_items
			ON items.id = all_items.item_id
		WHERE user_id = $user_id AND parent = $parent";
		return assoc(query($sql));
	}

	function assoc($result) {
		$array = array();
		while ($row = mysqli_fetch_assoc($result))
			$array[] = $row;
		return $array;
	}

	function update_task($task) {
		$sql = "UPDATE tasks SET name = '{$task['name']}' WHERE id = {$task['id']}";
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
