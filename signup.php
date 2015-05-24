<?php

	include "sql.php";

	function checkSignUpData() {
		return
			isset($_POST['username']) &&
			isset($_POST['password']) &&
			isset($_POST['check_password']) &&
			$_POST['username'] != "" &&
			$_POST['password'] != "" &&
			$_POST['check_password'] != "";
	}

	function passwordsMatch() {
		return $_POST['password'] === $_POST['check_password'];
	}

	if(checkSignUpData() && passwordsMatch()) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$hash = md5($username . $password . time());

		$user = get_user($username);
		if (!$user) {
			$sql_insert_new_user = "INSERT INTO users(user, password) VALUES('$username', '$password')";
			mysqli_query($link, $sql_insert_new_user);

			$user = get_user($username);
			$user_id = $user['id'];

			set_session($hash, $user_id);
			session_id($hash);
			session_start();
			session_commit();
			header("Location: lists.php");
		}
		else {
			echo "Check you login data";
		}
	}
	else {
		echo "Check you login data";
	}
