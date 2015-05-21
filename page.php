<?php

function page_header($title = "PufuList") {
	include "header.php";
}

function page_footer() {
	include "footer.php";
}

function page_lists_list_item($id, $name) {
	?>
		<div class="list-item flex">
			<span class="list-item--name">
				<?=$name?>
			</span>
			<a href="tasks.php?list_id=<?=$id?>">
				<button >Show</button>
			</a>
			<a href="edit_list.php?list_id=<?=$id?>">
				<button>Edit</button>
			</a>
			<a href="delete_list.php?list_id=<?=$id?>">
				<button>Delete</button>
			</a>
		</div>
	<?php
}

function page_tasks_task_item($id, $name, $checked) {
	$checked_string = $checked == 0 ? "[ ]" : "[x]";
	$check_uncheck_string = $checked == 0 ? "Check" : "Uncheck";
	?>
		<div class="list-item flex">
			<span class="list-item--checkbox">
				<?=$checked_string?>
			</span>
			<span class="list-item--name">
				<?=$name?>
			</span>
			<a href="check_task.php?task_id=<?=$id?>">
				<button> <?=$check_uncheck_string?> </button>
			</a>
			<a href="edit_task.php?task_id=<?=$id?>">
				<button>Edit</button>
			</a>
			<a href="delete_task.php?task_id=<?=$id?>">
				<button>Delete</button>
			</a>
		</div>
	<?php
}
