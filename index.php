<?php

include_once "session.php";
include_once "page.php";
page_header();

?>

<div class="content flex shadow-border">
	<div class="login">
		<h4>Already have an account?</h4>
		<form action="login.php" method="POST">
			<input type="text" name="username" placeholder="User">
			<br>
			<input type="password" name="password" placeholder="Password">
			<br>
			<input class="shadow-border button--round button--small right" type="submit" value="Login">
		</form>
	</div>

	<div class="register">
		<h4>Join today, It's free!</h4>
		<form action="signup.php" method="POST">
			<input id="username" type="text" name="username" placeholder="User">
			<br>
			<input id="password" type="password" name="password" placeholder="Password">
			<br>
			<input id="check_password" type="password" name="check_password" placeholder="Check Password">
			<br>
			<input class="shadow-border button--round button--small right" type="submit" value="Sign Up">
		</form>
	</div>
</div>

<?php
page_footer();
?>
