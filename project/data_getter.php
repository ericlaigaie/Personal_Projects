<?php


	$list = []

	# pull up SQL file
	$server = "fall-2020.cs.utexas.edu";
	$user = "cs329e_bulko_vnp337";
	$pwd = "room!muck!ritual";
	$database = "cs329e_bulko_vnp337";
	$mysqli = new mysqli ($server, $user, $pwd, $database);

	if ($mysqli->connect_errno) {
		die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
	}

	$un = $_SESSION['username']

	$contents = "SELECT date, weight, cal, exercise, sleep, happy FROM progressData WHERE un='$un' ORDER by convert(date, date, 103) ASC";
	$output = $mysqli ->query($contents);

	echo $output

	

?>

