<?php

include_once "session.php";
include_once "sql.php";

include_once "page.php";

$sql_select_lists = "SELECT id, name FROM lists WHERE user_id = $user_id";
$results = mysqli_query($link, $sql_select_lists);

page_header("Lists");
?>

<div class="content shadow-border">
	<?php
		page_lists_menu();
	?>
	<div class="lists">
		<?php
			while($row = mysqli_fetch_assoc($results)) {
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
