<?php

include_once "session.php";
include_once "page.php";
include_once "controller.php";
include_once "api.php";


$request = $_SERVER['REQUEST_URI'];
if (preg_match('/^\/api/', $request)) {
	$request = substr($request, 4);
	api($request);
}
else {
	controller_print_page($request);
}
