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

		$sql = "SELECT * FROM users WHERE user = '$username' AND password = '$password'";
		$result = mysqli_query($link, $sql);
		$number_of_rows = mysqli_num_rows($result);
		$user = mysqli_fetch_assoc($result);
		$user_id = $user['id'];

		if ($number_of_rows === 1) {
			$sql_insert = "INSERT INTO sessions(token, user_id) VALUES ('$hash', $user_id)";
			mysqli_query($link, $sql_insert);
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
