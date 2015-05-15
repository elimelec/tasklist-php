<?php

	include "connect.php";

	if(isset($_GET['save'])) {

		$task_name = $_GET['task_name'];
		$list_id = $_GET['list_id'];
		$sql_add = "INSERT INTO tasks(name, checked, list_id) VALUES('$task_name', 0, $list_id)";
		$added_task = $mysqli->query($sql_add);

		echo "Task added!";
	}

	elseif (isset($_GET["list_id"])) {

		$list_id = $_GET["list_id"];

?>

		<form method="GET">
			<input type="hidden" name = "list_id" value="<?php echo $list_id; ?>">
			<label for="task_name">Task name: </label>
			<input id="task_name" type="text" name="task_name">
			<input type="submit" name="save" value="Save">
		</form>

		<?php
	}
?>