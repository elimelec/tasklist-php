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

$items_page = function($parent = 0) {
	$items = get_items(get_session_user_id(), $parent);

	page_menu($parent);

	foreach($items as $item) {
		page_item($item);
	}
};

$request = $_SERVER['REQUEST_URI'];
if (preg_match('/^\/$/', $request)) {
	$login_page();
}
elseif (preg_match('/^\/items$/', $request)) {
	$items_page();
}
elseif (preg_match('/^\/items\/([0-9]+)$/', $request, $matches)) {
	$items_page($matches[1]);
}

page_footer();
