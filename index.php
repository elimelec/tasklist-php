<?php

include_once "session.php";
include_once "page.php";
page_header();

$page_login = function() {
?>
<div class="flex">
	<div class="login">
		<h4>Already have an account?</h4>
		<?php
			page_index_login_form();
		?>
	</div>
	<div class="register">
		<h4>Join today, It's free!</h4>
		<?php
		page_index_register_form();
		?>
	</div>
</div>
<?php
};

$page_items = function($parent = 0) {
	$items = get_items(get_session_user_id(), $parent);

	page_menu($parent);

	foreach($items as $item) {
		page_item($item);
	}
};

$page_logout = function() {
	delete_session(get_session_token());
	session_destroy();
	session_commit();

	header("Location: /");
};

$page_add_item = function($parent = 0) {
	page_menu($parent, true);
};

$page_edit_task = function($task_id) {
	$task = get_item_task($task_id);
	?>

	<div class="flex">
		<form action="edit_task.php" method="post">
			<input type="hidden" name = "task_id" value="<?=$task_id?>">
			<input id="task_name" type="text" name="task_name" value="<?=$task['name']?>" placeholder="Task Name">
			<input class="shadow-border button--round button--small" type="submit" value="Save">
		</form>
	</div>
	<?php
};

$page_edit_group = function($group_id) {
	$group = get_item_group($group_id);
	?>
	<div class="flex">
		<form action="edit_group.php" method="post">
			<input type="hidden" name = "group_id" value="<?=$group_id?>">
			<input type="text" name="group_name" value="<?=$group['name']?>" placeholder="Group name">
			<input class="shadow-border button--round button--small" type="submit" value="Save">
		</form>
	</div>
	<?php
};

$page_delete_item = function($item_id) {
	$item = get_item($item_id);
	delete_item($item_id);

	$parent = $item['parent'];
	header("Location: /items/$parent");
};

$page_check_task = function($task_id) {
	$task = get_item_task($task_id);
	$task['checked'] = $task['checked'] == 0 ? 1 : 0;
	set_item_task_check($task);
	$parent = $task['parent'];

	header("Location: /items/$parent");
};

$request = $_SERVER['REQUEST_URI'];
if (preg_match('/^\/$/', $request)) {
	$page_login();
}
elseif (preg_match('/^\/logout$/', $request)) {
	$page_logout();
}
elseif (preg_match('/^\/items$/', $request)) {
	$page_items();
}
elseif (preg_match('/^\/items\/([0-9]+)$/', $request, $matches)) {
	$page_items($matches[1]);
}
elseif (preg_match('/^\/add\/([0-9]+)$/', $request, $matches)) {
	$page_add_item($matches[1]);
}
elseif (preg_match('/^\/edit_task\/([0-9]+)$/', $request, $matches)) {
	$page_edit_task($matches[1]);
}
elseif (preg_match('/^\/edit_group\/([0-9]+)$/', $request, $matches)) {
	$page_edit_group($matches[1]);
}
elseif (preg_match('/^\/delete\/([0-9]+)$/', $request, $matches)) {
	$page_delete_item($matches[1]);
}
elseif (preg_match('/^\/check\/([0-9]+)$/', $request, $matches)) {
	$page_check_task($matches[1]);
}

page_footer();
