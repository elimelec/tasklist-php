<?php

include_once "sql.php";
include_once "session.php";

if(isset($_POST['save'])) {

	$list_name = $_POST['list_name'];

	if ($list_name !== "") {
		$sql_add = "INSERT INTO lists(name, user_id) VALUES('$list_name', $user_id)";
		$added_list = mysqli_query($link, $sql_add);
	}
}

header("Location: lists.php");
