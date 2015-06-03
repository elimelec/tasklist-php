<?php

include "sql.php";
include_once "controller.php";

function check_login_data($username, $password) {
	return not_empty($username, $password);
}

$username = post("username");
$password = post("password");

if(check_login_data($username, $password)) {
	$hash = md5($username . $password . time());

	$user = get_user($username, $password);
	$user_id = $user['id'];

	if ($user) {
		set_session($hash, $user_id);
		session_id($hash);
		session_start();
		session_commit();
		redirect("/items");
	}
	else {
		redirect("/");
	}
}
else {
	redirect("/");
}
