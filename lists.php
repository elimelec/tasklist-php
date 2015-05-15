<?php

	include "connect.php";

	if (isset($_GET["username"])) {
		echo "Welcome back, " . $_GET["username"] . "! You, awesome being. <br>";

		$username = $_GET["username"];

		$sql_select = "SELECT id FROM users WHERE user = '" . $username . "'";				
		$user_id = $mysqli->query($sql_select)->fetch_object()->id;

		$sql_select_lists = "SELECT id, name FROM lists WHERE user_id = " . $user_id;
		$results = $mysqli->query($sql_select_lists);

		while($row = $results->fetch_assoc()) {
			$id = $row["id"];
			$name = $row["name"];
			echo "<a href='tasks.php?user_id=$user_id&list_id=$id'>$name</a><br>";
		}
	}
?>
