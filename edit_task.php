<?php

include_once "session.php";
include_once "sql.php";
include_once "page.php";

if(isset($_POST['task_id']) && isset($_POST['task_name'])) {

	$task_name = $_POST['task_name'];
	$task_id = $_POST['task_id'];

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

	<div class="flex">
		<form action="edit_task.php" method="post">
			<input type="hidden" name = "task_id" value="<?=$task_id?>">
			<input id="task_name" type="text" name="task_name" value="<?=$task['name']?>" placeholder="Task Name">
			<input class="shadow-border button--round button--small" type="submit" value="Save">
		</form>
	</div>
	<?php
	page_footer();
}

?>
