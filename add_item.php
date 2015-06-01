<?php

include_once "sql.php";
include_once "session.php";
include_once "page.php";
include_once "controller.php";

if(isset($_POST['item_name']) && isset($_POST['parent']) && isset($_POST['type'])) {
	$item_name = $_POST['item_name'];
	$parent = $_POST['parent'];
	$type = $_POST['type'];

	add_item($item_name, $type, $parent, get_session_user_id());
	redirect("/items/$parent");
}
