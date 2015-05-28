<?php

	include "sql.php";


	if(isset($_GET['list_id'])) {

		$list_id = $_GET['list_id'];
		$sql_select_list = " SELECT user FROM lists JOIN users ON users.id = user_id WHERE lists.id = $list_id";
		$result = mysqli_query($link, $sql_select_list);
		$result = mysqli_fetch_assoc($result);
		$username = $result['user'];

		delete_list($list_id);

		header("Location: lists.php?username=$username");
	}


?>
