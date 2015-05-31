<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";

if(isset($_POST['group_id']) && isset($_POST['group_name'])) {

	$list_name = $_POST['group_name'];
	$group_id = $_POST['group_id'];

	$group = get_item_group($group_id);
	$group['name'] = $list_name;
	set_item_group_name($group);

	$parent = $group['parent'];
	header("Location: items/$parent");
}
