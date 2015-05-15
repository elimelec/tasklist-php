<?php

	include "connect.php";

	if(isset($_GET['save'])) {

		$list_name = $_GET['list_name'];
		$user_id = $_GET['user_id'];
		$sql_add = "INSERT INTO lists(name, user_id) VALUES('$list_name', $user_id)";
		$added_list = $mysqli->query($sql_add);

		echo "List added!";
	}

	elseif (isset($_GET["user_id"])) {

		$user_id = $_GET["user_id"];

?>

		<form method="GET">
			<input type="hidden" name = "user_id" value="<?php echo $user_id; ?>">
			<label for="list_name">List name: </label>
			<input id="list_name" type="text" name="list_name">
			<input type="submit" name="save" value="Save">
		</form>

		<?php
	}
?>