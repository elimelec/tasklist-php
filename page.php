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
					<?php
						page_lists_new_form();
					?>
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
					<?php
						page_tasks_new_form($list_id);
					?>
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
	$form_data = array(
		'action' => "login.php" ,
		'inputs' => array(
				get_page_form_text_input("username", "User"),
				get_page_form_password_input("password", "Password")
			) ,
		'submit' => array(
				'value' => "Login",
				'right' => true ,
			) ,
	);
	page_form($form_data);
}

function page_index_register_form() {
	$form_data = array(
		'action' => "signup.php" ,
		'inputs' => array(
				get_page_form_text_input("username", "User") ,
				get_page_form_password_input("password", "Password") ,
				get_page_form_password_input("check_password", "Check Password") ,
			) ,
		'submit' => array(
			'value' => "Sign Up" ,
			'right' => true ,
		) ,
	);
	page_form($form_data);
}

function page_lists_new_form() {
	$form_data = array(
		'action' => "add_list.php" ,
		'inputs' => array(
			get_page_form_text_input("list_name", "List name", false) ,
			) ,
		'submit' => array(
			'value' => "New" ,
			'right' => false ,
		) ,
	);
	page_form($form_data);
}

function page_tasks_new_form($list_id) {
	$form_data = array(
		'action' => "add_task.php" ,
		'inputs' => array(
			get_page_form_hidden_input("list_id", $list_id),
			get_page_form_text_input("task_name", "Task name", false) ,
			) ,
		'submit' => array(
			'value' => "New" ,
			'right' => false ,
		) ,
	);
	page_form($form_data);
}

function get_page_form_hidden_input($name, $value) {
	return get_page_form_input("hidden", $name, "", $value, false);
}

function get_page_form_text_input($name, $placeholder = "", $new_line = true) {
	return get_page_form_input("text", $name, $placeholder, "", $new_line);
}

function get_page_form_password_input($name, $placeholder = "", $new_line = true) {
	return get_page_form_input("password", $name, $placeholder, "", $new_line);
}

function get_page_form_input($type, $name, $placeholder = "", $value = "", $new_line = true) {
	return array(
		'type' => $type,
		'name' => $name,
		'placeholder' => $placeholder,
		'value' => $value,
		'new_line' => $new_line,
	);
}

function page_form($form_data) {
	?>
		<form action="<?=$form_data['action']?>" method="post">
			<?php
				foreach ($form_data['inputs'] as $input) {
					page_form_input($input);
				}
				page_form_submit($form_data['submit']);
			?>
		</form>
	<?php
}

function page_form_input($input) {
	$type = $input['type'];
	$name = $input['name'];
	$placeholder = $input['placeholder'];
	$value = $input['value'];
	$new_line = $input['new_line'];
	?>
		<input type="<?=$type?>" name="<?=$name?>" placeholder="<?=$placeholder?>" value="<?=$value?>">
	<?php
		if ($new_line) {
			?>
				<br>
			<?php
		}
}

function page_form_submit($submit) {
	$value = $submit['value'];
	$right = $submit['right'] ? "right" : "";
	?>
		<input class="shadow-border button--round button--small <?=$right?>" type="submit" value="<?=$value?>">
	<?php
}
