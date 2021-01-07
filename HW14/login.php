<html lang="en">

<head>
	<title> Login / Register </title>
	<meta charset="UTF-8">
	<meta name="description" content="Login / Register">
	<meta name="author" content="Eric Laigaie">
	<link href="HW14.css" rel="stylesheet">
</head>

<body>
	<header>
		<h1> Login </h1>
	</header>

	<?php
		# open file and set passed test to false
		$my_file = fopen("passwd.txt", "r");
		$passed = false;

		# parse through file by each line, check for any occupied spaces.
		while (!feof($my_file)) {
			$new_line = fgets($my_file);
			if (trim($new_line) != "") {

				# if a line is occupied, find the username and password. Then match the file contents to the form
				$pieces = explode(":", $new_line);
				if (trim(explode(":", $new_line)[0]) == $_POST["id"]
					&& trim(explode(":", $new_line)[1]) == $_POST["password"]) {

					# if the id and password match what was submitted in the form, login successful
					$passed = true;
				}
			}
		}
		# close file
		fclose("my_file");

		# if logged in
		if ($passed == true) {
			# set cookie and start the timer
			setcookie("login", true, time() + 120, "/");
			session_start();
			header("Location: ".$_SESSION["page"]);

		# if login failed, alert the user
		} else if ($_POST["id"] != null and $_POST["password"] != null) {
			echo '<script type="text/JavaScript"> alert("Username or Password incorrect.") </script>';
		}
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
			<td class="d"> <input type="text" name="password" /> </td>
		</tr>

		<tr><td><br /></td></tr>

		<tr>
			<td> <input type="submit" id="button" value="Login" /> </td>
			<td class="d"> <a href="register.php"> Don't have an account? </a> </td>
		</tr>
	</table>
	</form>
</body>
</html>