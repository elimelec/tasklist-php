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

function page_index_login_form() {
	?>
		<form action="login.php" method="POST">
			<input type="text" name="username" placeholder="User">
			<br>
			<input type="password" name="password" placeholder="Password">
			<br>
			<input class="shadow-border button--round button--small right" type="submit" value="Login">
		</form>
	<?php
}

function page_index_register_form() {
	?>
		<form action="signup.php" method="POST">
			<input id="username" type="text" name="username" placeholder="User">
			<br>
			<input id="password" type="password" name="password" placeholder="Password">
			<br>
			<input id="check_password" type="password" name="check_password" placeholder="Check Password">
			<br>
			<input class="shadow-border button--round button--small right" type="submit" value="Sign Up">
		</form>
	<?php
}

/// login form BEGIN
$form_data = array();
$form_data['action'] = "login.php";

$form_inputs = array();

function get_page_form_input($type, $username, $placeholder, $new_line = true) {
	return array(
		'type' => $type,
		'name' => $username,
		'placeholder' => $placeholder,
		'new_line' => $new_line
	);
}

$form_data['inputs'] = array(
		get_page_form_input("text", "username", "User"),
		get_page_form_input("password", "password", "Password")
	);

$form_data['submit_value'] = "Login";
$form_data['submit_right_align'] = true;

/// login form END
function page_form() {
	global $form_data;
	?>
		<form action="<?=$form_data['action']?>" method="post">
			<?php
				foreach ($form_data['inputs'] as $input) {
					page_form_input($input);
				}
				page_form_submit($form_data);
			?>
		</form>
	<?php
}

function page_form_input($input) {
	$type = $input['type'];
	$name = $input['name'];
	$placeholder = $input['placeholder'];
	$new_line = $input['new_line'];
	?>
		<input type="<?=$type?>" name="<?=$name?>" placeholder="<?=$placeholder?>">
	<?php
		if ($new_line) {
			?>
				<br>
			<?php
		}
}

function page_form_submit($form_data) {
	$value = $form_data['submit_value'];
	$right = $form_data['submit_right_align'] ? "right" : "";
	?>
		<input class="shadow-border button--round button--small <?=$right?>" type="submit" value="<?=$value?>">
	<?php
}
