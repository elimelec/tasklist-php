<?php

include_once "sql.php";

session_start();
$session_token = session_id();
$session = get_session($session_token);

$user_id = 0;

if ($_SERVER['SCRIPT_NAME'] == "/index.php") {
  if ($session) {
    header("Location: lists.php");
  }
}
else {
  if ($session) {
    $user_id = $session['user_id'];
  }
  else {
    header("Location: /");
  }
}
