<?php

function page_header($title = "PufuList") {
	?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link rel="stylesheet" type="text/css" href="css/theme.css">
			<title><?=$title?></title>
		</head>
		<body>
		<header class="shadow-border--big"><?=$title?></header>
	<?php
}

function page_footer() {
	?>
		</body>
		</html>
	<?php
}

function page_lists_list_item($id, $name) {
	?>
		<div class="list-item flex">
			<span class="list-item--name">
				<?=$name?>
			</span>
			<a href="tasks.php?list_id=<?=$id?>">
				<button >Show</button>
			</a>
			<a href="edit_list.php?list_id=<?=$id?>">
				<button>Edit</button>
			</a>
			<a href="delete_list.php?list_id=<?=$id?>">
				<button>Delete</button>
			</a>
		</div>
	<?php
}

function page_tasks_task_item($id, $name, $checked) {
	$checked_string = $checked == 0 ? "[ ]" : "[x]";
	$check_uncheck_string = $checked == 0 ? "Check" : "Uncheck";
	?>
		<div class="list-item flex">
			<span class="list-item--checkbox">
				<?=$checked_string?>
			</span>
			<span class="list-item--name">
				<?=$name?>
			</span>
			<a href="check_task.php?task_id=<?=$id?>">
				<button> <?=$check_uncheck_string?> </button>
			</a>
			<a href="edit_task.php?task_id=<?=$id?>">
				<button>Edit</button>
			</a>
			<a href="delete_task.php?task_id=<?=$id?>">
				<button>Delete</button>
			</a>
		</div>
	<?php
}


function page_lists_menu() {
	?>
		<div class="center">
			<div class="flex">
				<div class="new-task">
					<form action="add_list.php" method="POST">
						<input type="text" name="list_name" placeholder="List name">
						<input class="shadow-border button--round button--small" type="submit" name="save" value="New">
					</form>
				</div>
				<?php
					page_menu_logout_button();
				?>
			</div>
		</div>
	<?php
}

function page_tasks_menu($list_id) {
	?>
		<div class="center">
			<div class="flex">
				<div class="all-lists">
					<a href="lists.php">
						<button class="shadow-border button--round button--small">All Lists</button>
					</a>
				</div>
				<div class="new-task">
					<form action="add_task.php" method="POST">
						<input type="hidden" name="list_id" value="<?=$list_id?>">
						<input type="text" name="task_name" placeholder="Task name">
						<input class="shadow-border button--round button--small" type="submit" name="save" value="New">
					</form>
				</div>
				<?php
					page_menu_logout_button();
				?>
			</div>
		</div>
	<?php
}

function page_menu_logout_button() {
	?>
		<div class="logout">
			<a href="logout.php">
				<button class="shadow-border button--round button--small">Logout</button>
			</a>
		</div>
	<?php
}
