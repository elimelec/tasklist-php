<?php

include_once "session.php";
include_once "connect.php";

include_once "page.php";


if (!isset($_GET['list_id'])) {
	header("Location: lists.php");
	die();
}

$list_id = $_GET['list_id'];
$sql_select_tasks = "SELECT id, name, checked FROM tasks WHERE list_id = " . $list_id;
$results = $mysqli->query($sql_select_tasks);

page_header("Tasks");
?>

<div class="content">
	<div class="whatever">
			<form action="<?php echo "lists.php"; ?>" method="POST">
			<input class="button_home" type="submit" value="[home]"></form>
			<form action="<?php echo "add_task.php?list_id= '" . $list_id . "' "; ?>" method="POST">
			<input class="button" type="submit" value="[add new task]"></form>
	</div>
	<div class="center">
			<form action="<?="add_task.php"?>" method="POST">
				<input type="hidden" name="list_id" value="<?=$list_id?>">
				<input type="text" name="task_name" placeholder="Task name">
				<input class="shadow-border button--round button--small" type="submit" name="save" value="New">
			</form>
	</div>
	<div class="paper">
		<?php
			while($row = $results->fetch_assoc()) {
				$id = $row["id"];
				$name = $row["name"];
				$checked = $row["checked"];

				$checked_string = $checked == 0 ? "[ ]" : "[x]";
				echo "<p> $checked_string $name <a href='check_task.php?task_id=$id'> [check/uncheck] </a> <a href='edit_task.php?task_id=$id'>[edit]</a> <a href='delete_task.php?task_id=$id'>[delete]</a> </p>";

				}
			?>
	</div>
</div>

<?php
page_footer();
?>
