<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/theme.css">
		<title>PufuList</title>
	</head>
	<body>
		<div>
			<header class="shadow-border--big">PufuList</header>

			<div class="content login-page shadow-border">
				<div class="login">
					<h4>Already have an account?</h4>
					<form action="login.php" method="POST">
						<input type="text" name="username" placeholder="User">
						<br>
						<input type="password" name="password" placeholder="Password">
						<br>
						<input class="shadow-border button--round button--small" type="submit" value="Login">
					</form>
				</div>

				<div class="register">
					<h4>Join today, It's free!</h4>
					<form action="signup.php" method="POST">
						<input id="username" type="text" name="username" placeholder="User">
						<br>

						<input id="password" type="text" name="password" placeholder="Password">
						<br>

						<input id="check_password" type="text" name="check_password" placeholder="Check Password"> <br>
						<input class="shadow-border button--round button--small" type="submit" value="Sign Up">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
