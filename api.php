<?php

function api($request) {
	if (preg_match('/^\/items\/([0-9]+)$/', $request, $matches)) {
		api_items($matches[1]);
	}
}

function api_items($parent) {
	// FIXME: don't hardcode user id!
	$items = get_items(1, $parent);
	echo json_encode($items);
}