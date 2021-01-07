<html lang="en">

<head>
	<title> Healthy Habits - Register </title>
	<meta charset="UTF-8">
	<meta name="description" content="Healthy Habits - Register">
	<meta name="author" content="Eric Laigaie">
	<link rel="stylesheet" href="phase4.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
</head>

<body>
	<div id="login">
		<header>
			<h1> Register </h1>
		</header>

		<?php
		error_reporting(1);
		# check if the form is filled out
		if (isset($_POST['Register'])){
		if ($_POST["id"]!=null and $_POST["password"]!=null) {

			# pull up SQL file
			/*
			$server = "127.0.0.1";
			$user = "root";
			$pwd = "";
			$database = "mydb";
			*/
			$server = "fall-2020.cs.utexas.edu";
			$user = "cs329e_bulko_vnp337";
			$pwd = "room!muck!ritual";
			$database = "cs329e_bulko_vnp337";
			$mysqli = new mysqli ($server, $user, $pwd, $database);

			if ($mysqli->connect_errno) {
				die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
			}

			$user = $_POST['id'];
			$passwd = $_POST['password'];
			$contents = "SELECT un, pw FROM users WHERE un='$user'";
			$output = $mysqli ->query($contents);

			# if no data from that user, add them to database
			if ($output->num_rows === 0) {
				$inserter = "INSERT INTO users (un, pw) VALUES ('$user', '$passwd')";
				$mysqli->query($inserter);
				setcookie("login", true, time()+6000, "/");
				session_start();
				header("Location: index.php?un=<?php echo $un ?>");
			# if not unique username, alert the user
			} else {
				echo '<script> alert("Username already taken. Please choose another."); </script>';
			}
		} else {
			echo '<script> alert("Please complete the form before registering."); </script>';
		}}
		else{}
		?>

		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<br>
			<table>
				<tr>
					<td class="d"> User ID </td>
					<td class="d"> <input type="text" name="id" style="width:250px;" /> </td>
				</tr>

				<tr><td><br /></td></tr>

				<tr>
					<td class="d"> Password </td>
					<td class="d"> <input type="password" name="password" style="width:250px;" /> </td>
				</tr>

				<tr><td><br /></td></tr>

				<tr>
					<td class="d"> <input type="submit" id="button" name="Register" /> </td>
					<td class="d"> <a href="login.php"> Already have an account? Login here. </a> </td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>

