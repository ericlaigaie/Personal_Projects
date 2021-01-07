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
		<h1> Register </h1>
	</header>

	<?php

	# check if the form is filled out
	if ($_POST["id"]!=null and $_POST["password"]!=null) {

		# open passwd file
		$my_file = fopen("passwd.txt", "r");

		# assume register true
		$passed = true;

		# parse through file line by line. If line occupied, explode and find username. Then check if the id matches the form submission
		while (!feof($my_file)) {
			$new_line = fgets($my_file);
			if (trim($new_line) != "") {
				$pieces = explode(":", $new_line);
				if (trim(explode(":", $new_line)[0]) == $_POST["id"]) {

					# if the usernames are not unique, fail the test
					$passed = false;
				}
			}
		}
		# close file
		fclose($my_file);


		# if unique username
		if ($passed == true) {
			# open file and write to it. Then set cookie and start it. Direct the user to the correct article
			$my_file = fopen("passwd.txt", "a");
			fwrite($my_file, $_POST["id"] . ":" . $_POST["password"] . "\n");
			fclose($my_file);
			setcookie("login", true, time()+120, "/");
			session_start();
			header("Location: " . $_SESSION["page"]);

		# alert the user that the id needs to be unique
		} else {
			echo "<script type='text/JavaScript'>
			alert('ID taken. Please choose another one.');
			</script>" ;
		}
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
			<td colspan="2"> <input type="submit" id="button" name="Register" /> </td>
		</tr>
	</table>
	</form>
</body>
</html>

