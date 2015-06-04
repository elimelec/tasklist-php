<?php
include_once "sql.php";

$user_id = 0;

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
	else {
		echo json_encode("error");
	}
}

function login($username, $password) {
	$hash = md5($username . $password . time());
	$user = get_user($username, $password);
	if ($user) {
		$user_id = $user['id'];
		set_session($hash, $user_id);
		echo json_encode($hash);
	}
}

function extract_user_id($hash) {
	$session = get_session($hash);
	$user_id = $session['user_id'];
	set_user_id($user_id);
}

function api_items($parent) {
	$items = get_items(get_user_id(), $parent);
	header("Content-Type: application/json");
	echo json_encode($items);
}