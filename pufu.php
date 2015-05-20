<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="index/css" href="css/style.css" /> 
		
	</head>
	<body>

		<! --wrappper: id = "wrapper"-- >
		<div>
		<div class="header">
			<! header>
			<div class="logo"><img src="images/logomic.jpg" alt="logo"></div>
		</div>

			<!main>
			<div class="main">  
		
		<div class="formset_left">
		<h4>Already have an account?</h4>
		<form action="login.php" method="POST">
			<label for="username">Username: </label>
			<input id="username" type="text" name="username">
			<br>
			<label for="password">Password: </label>
			<input id="password" type="password" name="password">
			<br>
			<input class="button" type="submit" value="Login">
		</form>
		</div>
		<div class="formset_right">
		<h4>Join today, It's free!</h4>
		<form action="signup.php" method="POST">
			<label for="username">Username: </label>
			<input id="username" type="text" name="username"> <br>
			<label for="password">Password: </label>
			<input id="password" type="text" name="password"> <br>
			<label for="check_password">Check password: </label>
			<input id="check_password" type="text" name="check_password"> <br>
			<input class="button" type="submit" value="Sign Up">
		</form>
			</div>
		</div>
	</div>

	</body>
</html>
