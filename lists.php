<?php

	include_once "session.php";
	include_once "connect.php";

	if ($is_logged) {
		$sql_username = "SELECT user FROM users WHERE id = $user_id";
		$username = $mysqli->query($sql_username)->fetch_object()->user;

		echo "Welcome back, $username! You, awesome being. <br>";

		$sql_select_lists = "SELECT id, name FROM lists WHERE user_id = " . $user_id;
		$results = $mysqli->query($sql_select_lists);

		echo "<a href='add_list.php?user_id=$user_id'>[add new list]</a> <br>";
		while($row = $results->fetch_assoc()) {
			$id = $row["id"];
			$name = $row["name"];
			echo "$name <a href='tasks.php?list_id=$id'>[show tasks]</a> <a href='edit_list.php?list_id=$id'>[edit]</a> <a href='delete_list.php?list_id=$id'>[delete]</a> <br>";
		}
	}
	else {
		header("Location: /");
	}
?>
