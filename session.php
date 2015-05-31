<?php

include_once "sql.php";

function get_session_user_id() {
	return get_session(session_id())['user_id'];
}

function get_session_token() {
	return session_id();
}

session_start();
$session = get_session(session_id());

if ($_SERVER['REQUEST_URI'] == "/") {
  if ($session) {
    header("Location: items.php");
  }
}
else {
  if (!$session) {
    header("Location: /");
  }
}
