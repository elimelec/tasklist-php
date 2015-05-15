<?php

	include "connect.php";

	if(isset($_GET['submit'])) {

		$task_name = $_GET['task_name'];
		$task_id = $_GET['task_id'];
		$sql_update = "UPDATE tasks SET name= '" . $task_name . "' WHERE id='" . $task_id. "'";
		$edited_task = $mysqli->query($sql_update);

		echo "Task updated!";
	}

	elseif(isset($_GET['task_id'])) {

			$task_id = $_GET['task_id'];
			$sql_select_task_name = "SELECT name FROM tasks where tasks.id = '" . $task_id . "'";
			$task_name = $mysqli->query($sql_select_task_name)->fetch_object()->name;
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


