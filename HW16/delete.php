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

	# check for log in
	<?php session_start();

		if (!isset($_SESSION['user'])) {
			echo '<script> window.location.href = "login.php"; </script>';
		}
	?>

	<header><h1> Delete Student Record </h1></header>
	<br>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div>
	<table>
		<tr>
		<td> Student ID </td> <td> <input type="text" name="id" required />
		</tr>
		<tr>
		<td> <input type="submit" name="view" id="button" value="Submit" /> </td>
		</tr>
	</table>
	</div>
	</form>
	<br>

	<?php
		# initialize the sql variables
		$server = "fall-2020.cs.utexas.edu";
		$user = "cs329e_bulko_erl778";
		$password = "Lice=Mummy3canyon";
		$database = "cs329e_bulko_erl778";

		# sign into the server
		$sql = new mysqli ($server, $user, $password, $database);

		# if the id form is filled out
		if (isset($_POST['id'])) {
			$student = $_POST['id'];

			# delete student
			$delete = "DELETE FROM student_records WHERE ID=$id";
			$action = $sql->query($delete);
		}
		# update rows of data
		$printer = "SELECT * FROM student_records";
		$output = $sql->query($printer);
		
		# printing the table through echos
		echo '	<div>
			<table>
				<tr>
				<th> ID </th> <th> LAST </th> <th> FIRST </th> <th> MAJOR </th> <th> GPA </th>
				</tr> ';

			# fetching the rows to format and print
			while ($row = $output->fetch_row()) {
					echo "
						<tr>
						<td> ".$row[0]." </td> <td> ".$row[1]." </td> <td> ".$row[2]." </td> <td> ".$row[3]." </td> <td> ".$row[4]." </td>
						</tr> ";
			}
		echo '</table></div>';

	?>
</body>
</html>