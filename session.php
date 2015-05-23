<?php

include_once "connect.php";

session_start();
$session_token = session_id();

$sql = "SELECT * FROM sessions WHERE token = '$session_token'";
$result = mysqli_query($link, $sql);
$num_rows = mysqli_num_rows($result);

$user_id = 0;

$num_rows = mysqli_num_rows($result);
if ($_SERVER['SCRIPT_NAME'] == "/index.php") {
  if ($num_rows === 1) {
    header("Location: lists.php");
  }
}
else {
  if ($num_rows === 1) {
    $object = mysqli_fetch_assoc($result);
    $user_id = $object['user_id'];
  }
  else {
    header("Location: /");
  }
}
