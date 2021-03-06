<?php

include_once "sql.php";
include_once "session.php";
include_once "page.php";
include_once "controller.php";

$item_name = post("item_name");
$parent = post("parent");
$type = post("type");

if(not_empty($item_name, $parent, $type)) {
	add_item($item_name, $type, $parent, get_session_user_id());
}

redirect("/items/$parent");
