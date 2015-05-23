<?php

include_once "session.php";
include_once "sql.php";

include_once "page.php";


if (!isset($_GET['list_id'])) {
	header("Location: lists.php");
	die();
}

$list_id = $_GET['list_id'];
$sql_select_tasks = "SELECT id, name, checked FROM tasks WHERE list_id = $list_id";
$results = mysqli_query($link, $sql_select_tasks);

page_header("Tasks");
?>

<div class="content shadow-border">
	<?php
		page_tasks_menu($list_id);
	?>
	<div class="lists">
		<?php
			while($row = mysqli_fetch_assoc($results)) {
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
