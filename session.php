<?php
  include_once "connect.php";

  session_start();
  $sesion_token = session_id();

  $sql = "SELECT * FROM sessions WHERE token = '$sesion_token'";
  $result = $mysqli->query($sql);

  $is_logged = false;
  $user_id = 0;

  if ($result->num_rows === 1) {
    $is_logged = true;
    $user_id = $result->fetch_object()->user_id;
  }