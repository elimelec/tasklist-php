<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";

if(isset($_GET['submit'])) {

	$list_name = $_GET['list_name'];
	$list_id = $_GET['list_id'];

	$list = get_list($list_id);
	$list['name'] = $list_name;
	update_list($list);

	header("Location: lists.php");
}
elseif(isset($_GET['list_id'])) {
	$list_id = $_GET['list_id'];

	$list = get_list($list_id);
	page_header("Edit List");
	?>
	<div class="flex">
		<form method="GET">
			<input type="hidden" name = "list_id" value="<?=$list_id?>">
			<input id="list_name" type="text" name="list_name" value="<?=$list['name']?>" placeholder="List name">
			<input class="shadow-border button--round button--small" type="submit" name="submit" value="Save">
		</form>
	</div>
	<?php
	page_footer();
}

?>
