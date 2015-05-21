<?php

include_once "session.php";
include_once "connect.php";

$sql = "DELETE FROM sessions WHERE token = '$sesion_token'";
$mysqli->query($sql);

session_destroy();
session_commit();

header("Location: /");
