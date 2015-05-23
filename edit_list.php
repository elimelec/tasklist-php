<?php

	include "sql.php";

	if(isset($_GET['submit'])) {

		$list_name = $_GET['list_name'];
		$list_id = $_GET['list_id'];

		$sql_select_list = "SELECT user FROM lists JOIN users ON users.id = user_id WHERE lists.id = $list_id";
		$result = mysqli_query($link, $sql_select_list);
		$result = mysqli_fetch_assoc($result);
		$username = $result['user'];

		$sql_update = "UPDATE lists SET name = '$list_name' WHERE id = $list_id";
		mysqli_query($link, $sql_update);

		header("Location: lists.php?username=$username");
	}

	elseif(isset($_GET['list_id'])) {
			$list_id = $_GET['list_id'];

			$sql_select_list_name = "SELECT name FROM lists WHERE lists.id = $list_id";
			$result = mysqli_query($link, $sql_select_list_name);
			$result = mysqli_fetch_assoc($result);
			$list_name = $result['name'];
		?>

		<form method="GET">
			<input type="hidden" name = "list_id" value="<?=$list_id?>">
			<label for="list_name">List name: </label>
			<input id="list_name" type="text" name="list_name" value="<?=$list_name?>">
			<input type="submit" name="submit" value="Ok">
		</form>

		<?php
	}

?>
