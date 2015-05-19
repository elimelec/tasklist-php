<!DOCTYPE html>
<html>
	<head>
		<title>PufuList</title>
	</head>
	<body>
		<h1>PufuList</h1>
		<h3> Log in Test </h3>

		<form action="lists.php" method="GET">
			<label for="username">Username: </label>
			<input id="username" type="text" name="username">
			<input type="submit" value="Login">
		</form>

		<h3>Real Login</h3>
		<form action="login.php" method="POST">
			<label for="username">Username: </label>
			<input id="username" type="text" name="username">
			<br>
			<label for="password">Password: </label>
			<input id="password" type="password" name="password">
			<br>
			<input type="submit" value="Login">
		</form>

		<h3> Sign Up </h3>
		<form action="signup.php" method="POST">
			<label for="username">Username: </label>
			<input id="username" type="text" name="username"> <br>
			<label for="password">Password: </label>
			<input id="password" type="text" name="password"> <br>
			<label for="check_password">Check password: </label>
			<input id="check_password" type="text" name="check_password"> <br>
			<input type="submit" value="Sign Up">
		</form>	

	</body>
</html>
