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

if ($_SERVER['SCRIPT_NAME'] == "/index.php") {
  if ($session) {
    header("Location: items.php");
  }
}
else {
  if (!$session) {
    header("Location: /");
  }
}
