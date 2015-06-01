<?php

include_once "sql.php";
include_once "session.php";
include_once "page.php";
include_once "controller.php";

$item_name = get("item_name");
$parent = get("parent");
$type = get("type");

if(not_empty($item_name, $parent, $type)) {
	add_item($item_name, $type, $parent, get_session_user_id());
}

redirect("/items/$parent");
