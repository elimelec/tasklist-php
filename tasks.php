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

<div class="content shadow-border">
	<div class="center">
		<div class="flex">
			<div class="all-lists">
				<a href="lists.php">
					<button class="shadow-border button--round button--small">All Lists</button>
				</a>
			</div>
			<div class="new-task">
				<form action="add_task.php" method="POST">
					<input type="hidden" name="list_id" value="<?=$list_id?>">
					<input type="text" name="task_name" placeholder="Task name">
					<input class="shadow-border button--round button--small" type="submit" name="save" value="New">
				</form>
			</div>
		</div>
	</div>
	<div class="lists">
		<?php
			while($row = $results->fetch_assoc()) {
				$id = $row["id"];
				$name = $row["name"];
				$checked = $row["checked"];

				page_tasks_task_item($id, $name, $checked);
			}
		?>
	</div>
</div>

<?php
page_footer();
?>
