<?php
include_once "sql.php";

$user_id = 0;
$hash = "";

function get_hash() {
	global $hash;
	return $hash;
}

function set_hash($h) {
	global $hash;
	$hash = $h;
}

function get_user_id() {
	global $user_id;
	return $user_id;
}

function set_user_id($id) {
	global $user_id;
	$user_id = $id;
}

function api($request) {
	if (preg_match('/^\/login\/([a-z]+)\/([a-z]+$)/', $request, $matches)) {
		login($matches[1], $matches[2]);
	}
	elseif (preg_match('/^\/items\/([0-9]+)\/([a-z0-9]+)$/', $request, $matches)) {
		extract_user_id($matches[2]);
		api_items($matches[1]);
	}
	elseif (preg_match('/^\/check\/([0-9]+)\/([a-z0-9]+)$/', $request, $matches)) {
		extract_user_id($matches[2]);
		api_check_task($matches[1]);
	}
	elseif (preg_match('/^\/delete\/([0-9]+)\/([a-z0-9]+)$/', $request, $matches)) {
		extract_user_id($matches[2]);
		api_delete($matches[1]);
	}
	elseif (preg_match('/^\/increment\/([0-9]+)\/([0-9]+)\/([a-z0-9]+)$/', $request, $matches)) {
		extract_user_id($matches[3]);
		api_increment($matches[1], $matches[2]);
	}
	else {
		echo_json(json_encode("error"));
	}
}

function api_increment($id, $episodes) {
	$serial = get_item_serial($id);
	$serial['current'] += $episodes;
	if ($serial['current'] > $serial['last'])
		$serial['current'] = $serial['last'];
	set_item_serial_current($serial);
	$hash = get_hash();
	$parent = $serial['parent'];
	redirect("/api/items/$parent/$hash");
}

function api_delete($id) {
	$item = get_item($id);
	$parent = $item['parent'];
	delete_item($id);
	$hash = get_hash();
	redirect("/api/items/$parent/$hash");
}

function api_check_task($id) {
	$task = get_item_task($id);
	$task['checked'] = $task['checked'] == 0 ? 1 : 0;
	set_item_task_check($task);
	$hash = get_hash();
	$parent = $task['parent'];
	redirect("/api/items/$parent/$hash");
}

function login($username, $password) {
	$hash = md5($username . $password . time());
	$user = get_user($username, $password);
	if ($user) {
		$user_id = $user['id'];
		set_session($hash, $user_id);
		$url = "/api/items/0/$hash";
		echo_json($url);
	}
}

function extract_user_id($hash) {
	$session = get_session($hash);
	$user_id = $session['user_id'];
	set_user_id($user_id);
	set_hash($hash);
}

function api_items($parent) {
	$items = get_items(get_user_id(), $parent);
	$hash = get_hash();
	$new_items = array();
	foreach($items as $item) {
		$action = "";
		$item_id = $item['id'];
		switch ($item['type']) {
			case "group":
				$action = "/items/$item_id/$hash";
				break;
			case "task":
				$action = "/check/$item_id/$hash";
				break;
			case "serial":
				$action = "/increment/$item_id/1/$hash";
				break;
		}
		$item['action'] = "/api".$action;
		$item['delete'] = "/api/delete/$item_id/$hash";
		$new_items[] = $item;
	}
	echo_json($new_items);
}

function echo_json($thing) {
	header("Content-Type: application/json");
	echo json_encode($thing, JSON_UNESCAPED_SLASHES);
}