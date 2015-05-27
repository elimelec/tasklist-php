<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";

if(isset($_POST['list_id']) && isset($_POST['list_name'])) {

	$list_name = $_POST['list_name'];
	$list_id = $_POST['list_id'];

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
		<form action="edit_list.php" method="post">
			<input type="hidden" name = "list_id" value="<?=$list_id?>">
			<input id="list_name" type="text" name="list_name" value="<?=$list['name']?>" placeholder="List name">
			<input class="shadow-border button--round button--small" type="submit" value="Save">
		</form>
	</div>
	<?php
	page_footer();
}

?>
