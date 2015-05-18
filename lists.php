<?php

	include "connect.php";

	if (isset($_GET["username"])) {
		echo "Welcome back, " . $_GET["username"] . "! You, awesome being. <br>";

		$username = $_GET["username"];

		$sql_select = "SELECT id FROM users WHERE user = '" . $username . "'";				
		$user_id = $mysqli->query($sql_select)->fetch_object()->id;

		$sql_select_lists = "SELECT id, name FROM lists WHERE user_id = " . $user_id;
		$results = $mysqli->query($sql_select_lists);

		echo "<a href='add_list.php?user_id=$user_id'>[add new list]</a> <br>";
		while($row = $results->fetch_assoc()) {
			$id = $row["id"];
			$name = $row["name"];
			echo "$name <a href='tasks.php?list_id=$id'>[show tasks]</a> <a href='edit_list.php?list_id=$id'>[edit]</a> <a href='delete_list.php?list_id=$id'>[delete]</a> <br>";
		}
	}
?>
