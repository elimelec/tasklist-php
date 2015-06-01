<?php

function not_empty() {
	$args = func_get_args();
	foreach ($args as $arg) {
		if (is_null($arg) || $arg == "") {
			return false;
		}
	}
	return true;
}

function request($name) {
	if (isset($_GET[$name])) {
		return $_GET[$name];
	}
	elseif (isset($_POST[$name])) {
		return $_POST[$name];
	}
	else {
		return null;
	}
}

function redirect($url) {
	header("Location: $url");
	exit;
}

function controller_print_page($request) {
	$login = function() {
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

	$items = function($parent = 0) {
		$items = get_items(get_session_user_id(), $parent);

		page_menu($parent);

		foreach($items as $item) {
			page_item($item);
		}
	};

	$logout = function() {
		delete_session(get_session_token());
		session_destroy();
		session_commit();

		redirect("/");
	};

	$add = function($parent = 0) {
		page_menu($parent, true);
	};

	$edit_task = function($task_id) {
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

	$edit_group = function($group_id) {
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

	$delete = function($item_id) {
		$item = get_item($item_id);
		delete_item($item_id);

		$parent = $item['parent'];
		redirect("/items/$parent");
	};

	$check_task = function($task_id) {
		$task = get_item_task($task_id);
		$task['checked'] = $task['checked'] == 0 ? 1 : 0;
		set_item_task_check($task);
		$parent = $task['parent'];

		redirect("/items/$parent");
	};

	if (preg_match('/^\/$/', $request)) {
		$login();
	}
	elseif (preg_match('/^\/logout$/', $request)) {
		$logout();
	}
	elseif (preg_match('/^\/items$/', $request)) {
		$items();
	}
	elseif (preg_match('/^\/items\/([0-9]+)$/', $request, $matches)) {
		$items($matches[1]);
	}
	elseif (preg_match('/^\/add\/([0-9]+)$/', $request, $matches)) {
		$add($matches[1]);
	}
	elseif (preg_match('/^\/edit_task\/([0-9]+)$/', $request, $matches)) {
		$edit_task($matches[1]);
	}
	elseif (preg_match('/^\/edit_group\/([0-9]+)$/', $request, $matches)) {
		$edit_group($matches[1]);
	}
	elseif (preg_match('/^\/delete\/([0-9]+)$/', $request, $matches)) {
		$delete($matches[1]);
	}
	elseif (preg_match('/^\/check\/([0-9]+)$/', $request, $matches)) {
		$check_task($matches[1]);
	}
}
