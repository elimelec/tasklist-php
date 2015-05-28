<?php

include "sql.php";

$parent = 0;

if(isset($_GET['item_id'])) {
	$item_id = $_GET['item_id'];

	$item = get_item($item_id);
	delete_item($item_id);

	$parent = $item['parent'];
}
header("Location: items.php?parent=$parent");
