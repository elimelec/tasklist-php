<?php

function page_header($title = "PufuList") {
	?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<base href="/">
			<link rel="stylesheet" type="text/css" href="css/theme.css">
			<title><?=$title?></title>
		</head>
		<body>
			<header class="shadow-border--big"><?=$title?></header>
			<div class="content shadow-border">
	<?php
}

function page_footer() {
	?>
			</div>
		<?php //FIXME: remove this link!!! ?>
		<footer class="center"><a href="//csac.ro" target="_blank">csac.ro</a> </footer>
		</body>
		</html>
	<?php
}

function page_item($item) {
	switch($item['type']) {
		case "group":
			page_item_group($item);
			break;
		case "task":
			page_item_task($item);
			break;
		case "serial":
			page_item_serial($item);
			break;
	}
}

function page_item_group($group) {
	?>
	<div class="list-item flex">
			<span class="list-item--name">
				<?=$group['name']?>
			</span>
		<a href="items/<?=$group['id']?>">
			<button >Show</button>
		</a>
		<a href="edit_group/<?=$group['id']?>">
			<button>Edit</button>
		</a>
		<a href="delete/<?=$group['id']?>">
			<button>Delete</button>
		</a>
	</div>
	<?php
}

function page_item_task($task) {
	$checked_string = $task['checked'] == 0 ? "[&nbsp;&nbsp;]" : "[x]";
	$check_uncheck_string = $task['checked'] == 0 ? "Check" : "Uncheck";
	?>
	<div class="list-item flex">
			<span class="list-item--checkbox">
				<?=$checked_string?>
			</span>
			<span class="list-item--name">
				<?=$task['name']?>
			</span>
		<a href="check/<?=$task['id']?>">
			<button> <?=$check_uncheck_string?> </button>
		</a>
		<a href="edit_task/<?=$task['id']?>">
			<button>Edit</button>
		</a>
		<a href="delete/<?=$task['id']?>">
			<button>Delete</button>
		</a>
	</div>
<?php
}

function page_item_serial($serial) {
	$last = $serial['last'];
	$current = $serial['current'];
	$progress = "[$current/$last]";
	?>
	<div class="list-item flex">
			<span class="list-item--checkbox">
				<?=$progress?>
			</span>
			<span class="list-item--name">
				<?=$serial['name']?>
			</span>
		<a href="increment/<?=$serial['id']?>/1">
			<button>+1</button>
		</a>
		<a href="increment/<?=$serial['id']?>/5">
			<button>+5</button>
		</a>
		<a href="increment/<?=$serial['id']?>/10">
			<button>+10</button>
		</a>
		<a href="edit_serial/<?=$serial['id']?>">
			<button>Edit</button>
		</a>
		<a href="delete/<?=$serial['id']?>">
			<button>Delete</button>
		</a>
	</div>
<?php
}

function page_menu($parent, $add_forms = false) {
	?>
	<div class="center flex">
		<?php
		page_menu_root_button();
		?>
		<div class="new-task">
			<?php
			if ($add_forms) {
				page_items_new_form($parent, "group");
				page_items_new_form($parent, "task");
				page_items_new_serial_form($parent, "serial");
			}
			else {
				page_menu_new_button($parent);
			}
			?>
		</div>
		<?php
		page_menu_logout_button();
		?>
	</div>
	<?php
}

function page_items_new_serial_form($parent, $type) {
	$form_data = array(
		'action' => "add_serial.php" ,
		'inputs' => array(
			get_page_form_hidden_input("type", $type),
			get_page_form_hidden_input("parent", $parent),
			get_page_form_text_input("item_name", "Serial Name", false),
			get_page_form_text_input("episodes", "Episodes", false),
		) ,
		'submit' => array(
			'value' => "New",
			'right' => false ,
		) ,
	);
	page_form($form_data);
}

function page_items_new_form($parent, $type) {
	$form_data = array(
		'action' => "add_item.php" ,
		'inputs' => array(
			get_page_form_hidden_input("type", $type),
			get_page_form_hidden_input("parent", $parent),
			get_page_form_text_input("item_name", "Name", false),
		) ,
		'submit' => array(
			'value' => "New",
			'right' => false ,
		) ,
	);
	page_form($form_data);
}

function page_menu_logout_button() {
	?>
		<div class="all-center">
			<a href="logout">
				<button class="shadow-border button--round button--small">Logout</button>
			</a>
		</div>
	<?php
}

function page_menu_root_button() {
	?>
	<div class="all-center">
		<a href="items">
			<button class="shadow-border button--round button--small">
				All Lists
			</button>
		</a>
	</div>
<?php
}

function page_menu_new_button($parent) {
	?>
	<a href="add/<?=$parent?>">
		<button class="shadow-border button--round button--small">New</button>
	</a>
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
