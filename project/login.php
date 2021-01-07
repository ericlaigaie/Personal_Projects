<html lang="en">

<head>
	<title> Healty Habits Login </title>
	<meta charset="UTF-8">
	<meta name="description" content="Healthy Habits Login">
	<meta name="author" content="Eric Laigaie">
	<link rel="stylesheet" href="phase4.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
	<div id="login">
		<header>
			<h1> Login </h1>
		</header>


		<?php
		session_start();
		error_reporting(1);		
		if (isset($_POST['Login'])){
		if ($_POST["id"]!=null and $_POST["password"]!=null) {

			# pull up SQL file - arbitrary comment for github push refresh
			/*$server = "127.0.0.1";
			$user = "root";
			$pwd = "";
			$database = "mydb";*/

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

			$contents = "SELECT un, pw FROM users WHERE un='$user' and pw='$passwd'";
			$output = $mysqli ->query($contents);

			if ($output->num_rows===0) {
				echo '<script> alert("Username or password incorrect."); </script>';
			} else {
				setcookie("login", true, time() + 6000, "/");
				$_SESSION['username'] = $user;
				header("Location: index.php");
				exit();
			}
		} else {
			echo '<script> alert("Please complete form before logging in."); </script>';
		}}
		else {}
		?>

		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<br>
			<table>
				<tr>
					<td class="d"> User ID </td>
					<td class="d"> <input type="text" name="id" /> </td>
				</tr>

				<tr><td><br /></td></tr>

				<tr>
					<td class="d"> Password </td>
					<td class="d"> <input type="password" name="password" /> </td>
				</tr>

				<tr><td><br /></td></tr>

				<tr>
					<td class="d"> <input type="submit" id="button" value="Login" name="Login"/> </td>
					<td class="d"> <a href="register.php"> Don't have an account? </a> </td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
