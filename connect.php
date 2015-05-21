<?php

	$host = "localhost";
	$password = "root";
	$user = "root";
	$db = "pufulist";


	$mysqli = new mysqli($host, $user, $password, $db);

	if($mysqli->connect_error) {
		die(mysqli_connect_error());
	}

?>