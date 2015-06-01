<?php

include_once "sql.php";
include_once "session.php";
include_once "page.php";
include_once "controller.php";

$item_name = request("item_name");
$parent = request("parent");
$type = request("type");

if(not_null($item_name, $parent, $type)) {
	add_item($item_name, $type, $parent, get_session_user_id());
}

redirect("/items/$parent");
