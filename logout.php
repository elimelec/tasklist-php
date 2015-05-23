<?php

include_once "session.php";
include_once "connect.php";

$sql = "DELETE FROM sessions WHERE token = '$session_token'";
mysqli_query($link, $sql);

session_destroy();
session_commit();

header("Location: /");
