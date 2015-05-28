<?php

include_once "sql.php";
include_once "session.php";

$parent = 0;

if(isset($_POST['item_name']) && isset($_POST['parent'])) {
	$item_name = $_POST['item_name'];
	$parent = $_POST['parent'];

	add_item($item_name, "task", $parent);
}

header("Location:items.php?parent=" . intval($parent));
