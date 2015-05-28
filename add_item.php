<?php

include_once "sql.php";
include_once "session.php";
include_once "page.php";

if(isset($_POST['item_name']) && isset($_POST['parent']) && isset($_POST['type'])) {
	$item_name = $_POST['item_name'];
	$parent = $_POST['parent'];
	$type = $_POST['type'];

	add_item($item_name, $type, $parent, $user_id);
	header("Location:items.php?parent=" . intval($parent));
}
elseif(isset($_GET['parent'])) {
	$parent = $_GET['parent'];

	page_header("New");
	page_menu($parent, true);
	page_footer();
}

