<?php

function page_header($title = "PufuList") {
	include "header.php";
}

function page_footer() {
	include "footer.php";
}

function page_lists_list_item($id, $name) {
	?>
		<div class="list-item">
			<span class="list-item--name">
				<?=$name?>
			</span>
			<a href="tasks.php?list_id=<?=$id?>">
				<button >Show</button>
			</a>
			<a href="edit_list.php?list_id=<?=$id?>">
				<button class="button--round button--small">Edit</button>
			</a>
			<a href="delete_list.php?list_id=<?=$id?>">
				<button class="button--round button--small">Delete</button>
			</a>
		</div>
	<?php
}
