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
	?>
	<div><?=$item['id'].": ".$item['hash']."/".$item['parent']."/".$item['user_id']?></div>
	<?php
}

$parent = get_parent_id();
$items = get_items($user_id, $parent);

page_header();

foreach($items as $item) {
	page_item($item);
}

page_footer();
