<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";

if(isset($_POST['group_id']) && isset($_POST['group_name'])) {

	$list_name = $_POST['group_name'];
	$group_id = $_POST['group_id'];

	$group = get_item_group($group_id);
	$group['name'] = $list_name;
	set_item_group_name($group);

	$parent = $group['parent'];
	header("Location: items/$parent");
}
elseif(isset($_GET['group_id'])) {
	$group_id = $_GET['group_id'];

	$group = get_item_group($group_id);

	page_header("Edit List");
	?>
	<div class="flex">
		<form action="edit_group.php" method="post">
			<input type="hidden" name = "group_id" value="<?=$group_id?>">
			<input type="text" name="group_name" value="<?=$group['name']?>" placeholder="Group name">
			<input class="shadow-border button--round button--small" type="submit" value="Save">
		</form>
	</div>
	<?php
	page_footer();
}

?>
