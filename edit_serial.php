<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";
include_once "controller.php";

$serial_name = post("serial_name");
$episodes = post("episodes");
$serial_id = post("serial_id");

$parent = 0;
if(not_empty($serial_name, $serial_id, $episodes)) {
	$serial = get_item_serial($serial_id);
	$serial['name'] = $serial_name;
	$serial['last'] = $episodes;
	update_serial($serial);

	$parent = $serial['parent'];
}
redirect("items/$parent");
