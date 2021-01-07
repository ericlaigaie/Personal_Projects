<?php session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Quiz</title>
	<meta charset="UTF-8">
	<meta name="description" content="Quiz">
	<meta name="author" content="Eric Laigaie">
	<link href="HW15.css" rel="stylesheet">
</head>

<body>
	<header>
	<h3> Quiz Login </h3>
	</header>

	<br>

	<form method="post" action="login.php">
	<div id="box">
		<table>

			<tr>
			<td><label for="username"> Username: </label></td>
			<td><input type="text" name="username" id="username" /></td>
			</tr>
			<tr>
			<td><label for="passwd"> Password: </label></td>
			<td><input type="text" name="passwd" id="passwd" /></td>
			</tr>

			<tr>
			<td><input type="submit" id="button" value="Submit" />
			<td> <a href="register.php"> Don't have an account? </a> </td>
			</tr>

			<tr><td colspan="2">The login function isn't really working right now.</td></tr>
			<tr><td colspan="2"> I'm pretty sure the register portion is working just fine though.</td></tr>

		</table>
	</div>
	</form>

	<?php
		if (isset($_SESSION['sess'])) {
			echo '<script> window.location.href = "'.$_SESSION["sess"].'.php"; </script>';
		}
	?>
</body>
</html>

