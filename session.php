<?php

include_once "connect.php";

session_start();
$session_token = session_id();

$sql = "SELECT * FROM sessions WHERE token = '$session_token'";
$result = mysqli_query($link, $sql);

$user_id = 0;

$num_rows = $result->num_rows;
if ($_SERVER['SCRIPT_NAME'] == "/index.php") {
  if ($num_rows === 1) {
    header("Location: lists.php");
  }
}
else {
  if ($num_rows === 1) {
    $user_id = $result->fetch_object()->user_id;
  }
  else {
    header("Location: /");
  }
}
