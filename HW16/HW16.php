<!DOCTYPE html>
<html lang="en">

<head>
	<title>SQL</title>
	<meta charset="UTF-8">
	<meta name="description" content="SQL">
	<meta name="author" content="Eric Laigaie">
	<link href="HW16.css" rel="stylesheet">
</head>

<body>

	<?php
		session_start();

		# branching for each form option. Points the user to the correct page
		if (!isset($_SESSION["user"])) {
			echo '<script> window.location.href = "login.php"; </script>';
		} else {
			if (isset($_POST["insert"])) {
				echo '<script> window.location.href = "insert.php"; </script>';
			} else if (isset($_POST["update"])) {
				echo '<script> window.location.href = "update.php"; </script>';
			} else if (isset($_POST["delete"])) {
				echo '<script> window.location.href = "delete.php"; </script>';
			} else if (isset($_POST["view"])) {
				echo '<script> window.location.href = "view.php"; </script>';
			} else if (isset($_POST["logout"])) {
				echo '<script> alert("Thanks for using my database!"); </script>';
				$_SESSION['logout'] = true;
				echo '<script> window.location.href = "login.php"; </script>';
			}
		}
	?>

	<header><h1> SQL Form Options </h1></header>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div>
	<table>
		<tr>
		<td><input type="submit" name="insert" id="button" value="Insert Student Record" /></td>
		</tr>
		<tr>
		<td><input type="submit" name="update" id="button" value="Update Student Record" /></td>
		</tr>
		<tr>
		<td><input type="submit" name="delete" id="button" value="Delete Student Record" /></td>
		</tr>
		<tr>
		<td><input type="submit" name="view" id="button" value="View Student Record" /></td>
		</tr>
		<tr>
		<td><input type="submit" name="logout" id="button" value="Logout" /></td>
		</tr>
	</table>
	</div>
	</form>
</body>
</html>

