<?php

include_once "session.php";
include_once "page.php";
page_header();

$login_page = function() {
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

$items_page = function() {
	function get_parent_id($parent = 0) {
		if (isset($_GET['parent'])) {
			$parent = intval($_GET['parent']);
		}
		return $parent;
	}

	$parent = get_parent_id();
	$items = get_items(get_session_user_id(), $parent);

	page_menu($parent);

	foreach($items as $item) {
		page_item($item);
	}
};


switch($_SERVER['REQUEST_URI']) {
	case "/":
		$login_page();
		break;
	case "/items":
		$items_page();
		break;
}


page_footer();
