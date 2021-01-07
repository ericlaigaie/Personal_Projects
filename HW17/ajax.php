<?php

	# make sure form is filled out - primary key username
	if ($_POST["username"] != "") {

		error_reporting(E_ALL);
		ini_set("display_errors", "on");

		#enter the sql database

		$server = 'fall-2020.cs.utexas.edu';
		$user = 'cs329e_bulko_erl778';
		$password = 'Lice=Mummy3canyon';
		$dbase = 'cs329e_bulko_erl778';

		$mysqli = new mysqli ($server, $user, $password, $dbase);
		$new_data = json_decode(file_get_contents("php://input"));

		#grab data from the post form
		$username = $_POST['username'];
		$password = $_POST['password'];

		#create command and query all data from table
		$command = "SELECT * FROM passwords";
		$output = $mysqli->query($command);

		#tangible is the variable representing if a username is in the table
		$tangible = false;

		#walk through each row of the table looking for the username from the form
		while ($new_row = $output->fetch_row()) {
			if ($new_row[0] == $username) {
				if ($new_row[1] == $password) {

					#if both username and password match
					$tangible = true;
					echo "Username and password confirmed. <br>";
				} else {
					#if only username matches
					$tangible = true;
					$new_password = "UPDATE passwords SET password = '$password' WHERE username = '$username'";
					$querying = $mysqli->query($new_password);
					echo "Password changed. <br>";
				}
			}
		}

		#if there is no matching username
		if ($tangible == false) {
			
			#insert username and password
			$insert = "INSERT INTO passwords VALUES ('$username', '$password')";
			$querying = $mysqli->query($insert);
			echo "New user registered. <br>";
		}
	}
?>