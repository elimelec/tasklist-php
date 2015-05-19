<?php

	include "connect.php";


	if(isset($_GET['list_id'])) {

		$list_id = $_GET['list_id'];
		$sql_select_list = " SELECT user FROM lists JOIN users ON users.id = user_id WHERE lists.id = $list_id";
		$username = $mysqli->query($sql_select_list)->fetch_object()->user;

		$sql_delete_tasks = "DELETE FROM tasks WHERE list_id =" .$list_id;
		$delete_tasks = $mysqli->query($sql_delete_tasks);

		$sql_delete_list = "DELETE FROM lists WHERE id='". $list_id."'";
		$result = $mysqli->query($sql_delete_list);

		header("Location: lists.php?username=$username");
	}


?>