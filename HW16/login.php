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
	<?php session_start();

		if (isset($_SESSION['logout'])) {
			session_destroy();
		}

		# check the passwd.txt file for matching username / password
		# same code as the last couple projects pretty much
		if (isset($_POST["user"])) {
			
			$my_file = fopen("dbase/passwd.txt", "r");
			$success = false;
				
			while (!feof($my_file)) {
				$line = fgets($my_file);
					
				if (trim($line) != "") {
					if (trim(explode(":", $line)[0]) == $_POST["user"] 
					&& trim(explode(":", $line)[1]) == $_POST["password"]) {
						$success = true;
					}
				}
			}

			fclose($my_file);

			# if logged in, start sessions and point to homepage
			if ($success == true) {
				session_start();
				$_SESSION['user'] = $_POST['user'];

				echo '<script> window.location.href = "HW16.php"; </script>';
			} else {

				# if not logged in, alert the user
				echo '<script> alert("Login Information Incorrect.") </script>';
			}
		}
	?>

	<header><h1> Login </h1></header>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post" >
	<div>
	<table>
		<tr>
		<td> Username: </td> <td> <input type="text" name="user" required /> </td>
		</tr>
		<tr>
		<td> Password: </td> <td> <input type="password" name="password" required /> </td>
		</tr>
		<tr>
		<td> <input type="submit"  id="button" value="Submit" /> </td> <td> <input type="reset"  id="button" name="Reset" /> </td>
		</tr>
	</table>
	</div>
	</form>
</body>
</html>
