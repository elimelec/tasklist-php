<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="index/css" href="css/tasks_style.css" /> 
		<title>Tasks</title>
	</head>

	<body>
	<div class="wrapper">




<?php

	include "connect.php";

	if (isset($_GET["list_id"])) {

		$list_id = $_GET["list_id"];

		$sql_select_tasks = "SELECT id, name, checked FROM tasks WHERE list_id = " . $list_id;
		$results = $mysqli->query($sql_select_tasks);
?>

<div class="content">
			<div class="whatever">
					<form action="<?php echo "lists.php"; ?>" method="POST">
					<input class="button_home" type="submit" value="[home]"></form>
					<form action="<?php echo "add_task.php?list_id= '" . $list_id . "' "; ?>" method="POST">
					<input class="button" type="submit" value="[add new task]"></form>
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
	}
?>

		</div>

	</div>
	</body>



</html>