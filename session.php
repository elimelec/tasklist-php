<?php

include_once "sql.php";
include_once "controller.php";

function get_session_user_id() {
	return get_session(session_id())['user_id'];
}

function get_session_token() {
	return session_id();
}

session_start();
$session = get_session(session_id());

if (preg_match('/^\/api/', $_SERVER['REQUEST_URI'])) {
	//Do nothing
}
elseif ($_SERVER['REQUEST_URI'] == "/") {
  if ($session) {
	  redirect("/items");
  }
}
else {
  if (!$session) {
	  redirect("/");
  }
}
