<?php

include_once "connect.php";

session_start();
$session_token = session_id();

$sql = "SELECT * FROM sessions WHERE token = '$session_token'";
$result = $mysqli->query($sql);

$user_id = 0;

if ($result->num_rows === 1) {
  $user_id = $result->fetch_object()->user_id;
}
else {
  header("Location: /");
}
