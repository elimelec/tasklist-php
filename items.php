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

function page_item($item) {
	switch($item['type']) {
		case "group":
			page_lists_list_item($item['id'], $item['name']);
			break;
		case "task":
			page_tasks_task_item($item['id'], $item['name'], $item['checked']);
			break;
	}
}

$parent = get_parent_id();
$items = get_items($user_id, $parent);

page_header();

foreach($items as $item) {
	page_item($item);
}

page_footer();
