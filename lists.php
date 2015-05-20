<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/theme.css">
		<title>Lists</title>
	</head>

	<body>
	<div class="wrapper">

<?php

	include_once "session.php";
	include_once "connect.php";

	if ($is_logged) {
		$sql_username = "SELECT user FROM users WHERE id = $user_id";
		$username = $mysqli->query($sql_username)->fetch_object()->user;
?>

		<div class="header">
			<?php echo "Welcome back, $username! You, awesome being. <br>"; ?>

		</div>

<?php
	
		$sql_select_lists = "SELECT id, name FROM lists WHERE user_id = " . $user_id;
		$results = $mysqli->query($sql_select_lists);
?>

	<div class="content">
			<div class="whatever">
					<form action="<?php echo "add_list.php?user_id= '" . $user_id . "' "; ?>" method="POST">
					<input class="button" type="submit" value="[add new list]">
					</form>
			</div>

			<div class="paper"> 			

<?php
		while($row = $results->fetch_assoc()) {
			$id = $row["id"];
			$name = $row["name"];
			echo "<p> $name <a href='tasks.php?list_id=$id'>[show tasks]</a> <a href='edit_list.php?list_id=$id'>[edit]</a> <a href='delete_list.php?list_id=$id'>[delete]</a> </p>";
		}
	}
	else {
		header("Location: /");
	}
?>
			</div>
	</div>
	</div>
	</body>



</html>