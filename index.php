<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--		<link rel="stylesheet" type="index/css" href="css/style.css">-->
		<link rel="stylesheet" type="text/css" href="css/theme.css">
	</head>
	<body>
		<div>
			<header class="shadow-border--big">PufuList</header>

			<div class="content login-page shadow-border">
				<div class="login">
					<h4>Already have an account?</h4>
					<form action="login.php" method="POST">
						<label for="username">Username: </label>
						<input id="username" type="text" name="username">
						<br>
						<label for="password">Password: </label>
						<input id="password" type="password" name="password">
						<br>
						<input class="shadow-border button--round button--small" type="submit" value="Login">
					</form>
				</div>

				<div class="register">
					<h4>Join today, It's free!</h4>
					<form action="signup.php" method="POST">
						<label for="username">Username: </label>
						<input id="username" type="text" name="username"> <br>
						<label for="password">Password: </label>
						<input id="password" type="text" name="password"> <br>
						<label for="check_password">Check password: </label>
						<input id="check_password" type="text" name="check_password"> <br>
						<input class="shadow-border button--round button--small" type="submit" value="Sign Up">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
