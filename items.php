<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";

function get_parent_id($parent = 0) {
	if (isset($_GET['parent'])) {
		$parent = intval($_GET['parent']);
	}
	return $parent;
}

$parent = get_parent_id();
$items = get_items($user_id, $parent);

page_header();
page_menu($parent);

foreach($items as $item) {
	page_item($item);
}

page_footer();
