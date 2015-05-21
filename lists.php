<?php

include_once "session.php";
include_once "connect.php";

include_once "page.php";

if ($is_logged) {
	$sql_username = "SELECT user FROM users WHERE id = $user_id";
	$username = $mysqli->query($sql_username)->fetch_object()->user;

	$sql_select_lists = "SELECT id, name FROM lists WHERE user_id = " . $user_id;
	$results = $mysqli->query($sql_select_lists);
}
else {
	header("Location: /");
}

page_header();
?>

<div class="content">
		<div class="whatever">
				<form action="<?="add_list.php"?>" method="POST">
					<input type="text" name="list_name" placeholder="List name">
					<input class="button" type="submit" name="save" value="New">
				</form>
		</div>

		<div class="paper">
			<?php
				while($row = $results->fetch_assoc()) {
					$id = $row["id"];
					$name = $row["name"];
					echo "<p> $name <a href='tasks.php?list_id=$id'>[show tasks]</a> <a href='edit_list.php?list_id=$id'>[edit]</a> <a href='delete_list.php?list_id=$id'>[delete]</a> </p>";
				}
			?>
		</div>
</div>

<?php
page_footer();
?>
