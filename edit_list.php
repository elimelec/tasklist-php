<?php

	include "connect.php";

	if(isset($_GET['submit'])) {

		$list_name = $_GET['list_name'];
		$list_id = $_GET['list_id'];

		$sql_select_list = " SELECT user FROM lists JOIN users ON users.id = user_id WHERE lists.id = $list_id";
		$username = $mysqli->query($sql_select_list)->fetch_object()->user;

		$sql_update = "UPDATE lists SET name= '" . $list_name . "' WHERE id='" . $list_id. "'";
		$edited_list = $mysqli->query($sql_update);

		header("Location: lists.php?username=$username");
	}

	elseif(isset($_GET['list_id'])) {

			$list_id = $_GET['list_id'];
			$sql_select_list_name = "SELECT name FROM lists where lists.id = '" . $list_id . "'";
			$list_name = $mysqli->query($sql_select_list_name)->fetch_object()->name;
		?>

		<form method="GET">
			<input type="hidden" name = "list_id" value="<?php echo $list_id; ?>">
			<label for="list_name">List name: </label>
			<input id="list_name" type="text" name="list_name" value="<?php echo $list_name; ?>">
			<input type="submit" name="submit" value="Ok">
		</form>

		<?php
	}

?>
