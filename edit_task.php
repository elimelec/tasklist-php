<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";

if(isset($_GET['submit'])) {

	$task_name = $_GET['task_name'];
	$task_id = $_GET['task_id'];

	$task = get_task($task_id);
	$list_id = $task['list_id'];

	$task['name'] = $task_name;

	update_task($task);

	header("Location: tasks.php?list_id=$list_id");
}

elseif(isset($_GET['task_id'])) {
	$task_id = $_GET['task_id'];

	$task = get_task($task_id);
	page_header("Edit Task");
	?>

	<form method="GET">
		<input type="hidden" name = "task_id" value="<?=$task_id?>">
		<label for="task_name">Task name: </label>
		<input id="task_name" type="text" name="task_name" value="<?=$task['name']?>">
		<input type="submit" name="submit" value="Ok">
	</form>

	<?php
	page_footer();
}

?>
