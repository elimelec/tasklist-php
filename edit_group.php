<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";
include_once "controller.php";

$list_name = post("group_name");
$group_id = post("group_id");

$parent = 0;
if(not_empty($list_name, $group_id)) {
	$group = get_item_group($group_id);
	$group['name'] = $list_name;
	set_item_group_name($group);

	$parent = $group['parent'];
}
redirect("/items/$parent");
