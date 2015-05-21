<?php

include_once "session.php";
include_once "connect.php";

include_once "page.php";

$sql_username = "SELECT user FROM users WHERE id = $user_id";
$username = $mysqli->query($sql_username)->fetch_object()->user;

$sql_select_lists = "SELECT id, name FROM lists WHERE user_id = " . $user_id;
$results = $mysqli->query($sql_select_lists);

page_header("Lists");
?>

<div class="content shadow-border">
		<div class="center">
				<form action="<?="add_list.php"?>" method="POST">
					<input type="text" name="list_name" placeholder="List name">
					<input class="shadow-border button--round button--small" type="submit" name="save" value="New">
				</form>
		</div>

		<div class="lists">
			<?php
				while($row = $results->fetch_assoc()) {
					$id = $row["id"];
					$name = $row["name"];
					page_lists_list_item($id, $name);
				}
			?>
		</div>
</div>

<?php
page_footer();
?>
