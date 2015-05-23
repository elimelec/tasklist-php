<?php

	$host = "localhost";
	$password = "root";
	$user = "root";
	$db = "pufulist";


	$link = mysqli_connect($host, $user, $password, $db);

	if (mysqli_connect_errno()) {
		die(mysqli_connect_error());
	}

?>
