<?php

	include "connect.php";

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

		$sql = "SELECT * FROM users WHERE user = '$username'";
		$result = mysqli_query($link, $sql);
		$number_of_rows = mysqli_num_rows($result);

		if ($number_of_rows === 0) {
			$sql_insert_new_user = "INSERT INTO users(user, password) VALUES('$username', '$password')";
			mysqli_query($link, $sql_insert_new_user);

			$sql_select = "SELECT id FROM users WHERE user = '$username'";
			$result = mysqli_query($link, $sql_select);
			$result = mysqli_fetch_assoc($result);
			$user_id = $result['id'];

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
