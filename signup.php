<?php

include "sql.php";
include_once "controller.php";

function checkSignUpData($username, $password, $check_password) {
	return
		not_empty($username, $password, $check_password) &&
		passwordsMatch($password, $check_password);
}

function passwordsMatch($password, $check_password) {
	return $password === $check_password;
}

$username = request_get("username");
$password = request_get("password");
$check_password = request_get("check_password");

if(checkSignUpData($username, $password, $check_password)) {
	$hash = md5($username . $password . time());

	$user = get_user($username);
	if (!$user) {
		$user = get_new_user($username, $password);
		$user_id = $user['id'];

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
