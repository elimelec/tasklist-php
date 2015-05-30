<?php

include "sql.php";

function check_login_data() {
	return
		isset($_POST['username']) &&
		isset($_POST['password']) &&
		$_POST['username'] != "" &&
		$_POST['password'] != "";
}

if(check_login_data()) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$hash = md5($username . $password . time());

	$user = get_user($username, $password);
	$user_id = $user['id'];

	if ($user) {
		set_session($hash, $user_id);
		session_id($hash);
		session_start();
		session_commit();
		header("Location: items.php");
	}
	else {
		echo "Check you login data";
	}
}
else {
	echo "Check you login data";
}
