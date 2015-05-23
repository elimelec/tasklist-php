<?php

include_once "sql.php";
include_once "session.php";

if(isset($_POST['save'])) {

	$list_name = $_POST['list_name'];

	if ($list_name !== "") {
		add_list($list_name, $user_id);
	}
}

header("Location: lists.php");
