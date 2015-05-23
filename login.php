<?php

	include "connect.php";

	if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] != "" && $_POST['password'] != "") {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$hash = md5($username . $password . time());

		$sql = "select * from users where user = '$username' and password = '$password'";
		$number_of_rows = mysqli_query($link, $sql)->num_rows;

		$sql_select = "SELECT id FROM users WHERE user = '$username'";
		$user_id = mysqli_query($link, $sql_select)->fetch_object()->id;

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
