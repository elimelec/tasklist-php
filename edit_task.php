<?php

	include "connect.php";

	if(isset($_GET['submit'])) {

		$task_name = $_GET['task_name'];
		$task_id = $_GET['task_id'];

		$sql = "SELECT list_id FROM tasks WHERE id = $task_id";
		$result = mysqli_query($link, $sql);
		$result = mysqli_fetch_object($result);
		$list_id = $result->list_id;

		$sql_update = "UPDATE tasks SET name = '$task_name' WHERE id = $task_id";
		mysqli_query($link, $sql_update);

		header("Location: tasks.php?list_id=$list_id");
	}

	elseif(isset($_GET['task_id'])) {

			$task_id = $_GET['task_id'];
			$sql = "SELECT name FROM tasks where tasks.id = $task_id";
			$result = mysqli_query($link, $sql);
			$result = mysqli_fetch_object($result);
			$task_name = $result->name;
		?>

		<form method="GET">
			<input type="hidden" name = "task_id" value="<?php echo $task_id; ?>">
			<label for="task_name">Task name: </label>
			<input id="task_name" type="text" name="task_name" value="<?php echo $task_name; ?>">
			<input type="submit" name="submit" value="Ok">
		</form>

		<?php
	}

?>
