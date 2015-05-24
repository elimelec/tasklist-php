<?php

include_once "session.php";
include_once "page.php";
page_header();

?>

<div class="content flex shadow-border">
	<div class="login">
		<h4>Already have an account?</h4>
		<?php
			page_form();
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
page_footer();
?>
