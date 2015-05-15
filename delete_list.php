<?php

	include "connect.php";


	if(isset($_GET['list_id'])) {

		$list_id = $_GET['list_id'];
		$sql_select_list = "SELECT name FROM lists WHERE id='". $list_id."'";
		$list_name = $mysqli->query($sql_select_list)->fetch_object()->name;

		$sql_delete_tasks = "DELETE FROM tasks WHERE list_id =" .$list_id;
		$delete_tasks = $mysqli->query($sql_delete_tasks);


		$sql_delete_list = "DELETE FROM lists WHERE id='". $list_id."'";
		$result = $mysqli->query($sql_delete_list);

		echo "List: $list_name was deleted";

	}


?>