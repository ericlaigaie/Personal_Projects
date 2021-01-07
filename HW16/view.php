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

		if (!isset($_SESSION['user'])) {
			echo '<script> window.location.href = "login.php"; </script>';
		}
	?>

	<header><h1> View Student Record </h1></header>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div>
	<table>
		<tr>
		<td> Student ID </td> <td> <input type="text" name="id" />
		</tr>
		<tr>
		<td> Last Name </td> <td> <input type="text" name="last" />
		</tr>
		<tr>
		<td> First Name </td> <td> <input type="text" name="first" />
		</tr>
		<tr>
		<td> <input type="submit" name="view"  id="button" value="Submit" /> </td> <td> <input type="submit" id="button" name="all_records" value="View All Student Records" /> </td>
		</tr>
	</table>
	</div>
	</form>
	<br>

	<?php

		if (isset($_POST["view"]) || isset($_POST["all_records"])) {
			$server = "fall-2020.cs.utexas.edu";
			$user = "cs329e_bulko_erl778";
			$password = "Lice=Mummy3canyon";
			$database = "cs329e_bulko_erl778";
			$id = $_POST['id'];
			$last = $_POST['last'];
			$first = $_POST['first'];

			# standard starting point for SQL
			$sql = new mysqli ($server, $user, $password, $database);


			# just show all data
			if (isset($_POST['all_records'])) {
				$action = "SELECT * FROM student_records ORDER BY LAST";
			}

			# bunch of branches to determine which combination of entries are full
			else if (isset($_POST["view"])) {
				if ($id=="" && $first=="" && $last=="") {
					$action = "SELECT * FROM student_records";
				}
				else if ($id=="" && $last=="") {
					$action = "SELECT * FROM student_records WHERE FIRST='$first'";
				}
				else if ($last=="" && $first=="") {
					$action = "SELECT * FROM student_records WHERE ID=$id";
				}
				else if ($first=="" && $id=="") {
					$action = "SELECT * FROM student_records WHERE LAST='$last'";
				}
				else if ($id=="") {
					$action = "SELECT * FROM student_records WHERE LAST='$last' AND FIRST='$first'";
				}
				else if ($first=="") {
					$action = "SELECT * FROM student_records WHERE LAST='$last' AND ID=$id";
				}
				else if ($last=="") {
					$action = "SELECT * FROM student_records WHERE FIRST='$first' AND ID=$id";
				} else{
					$action = "SELECT * FROM student_records WHERE LAST='$last' AND ID=$id AND FIRST='$first'";
				}
			}
			# collect all data and prints (0 rows safeguard)
			$output = $sql->query($action);
			if (mysqli_num_rows($output) == 0) { echo '<div> <p>No Student Record Found</p></div>'; }
			else {
				echo '	<div>
					<table>
						<tr>
						<th> ID </th> <th> LAST </th> <th> FIRST </th> <th> MAJOR </th> <th> GPA </th>
						</tr> ';

						while ($row = $output->fetch_row()) {
							echo "
								<tr>
								<td> ".$row[0]." </td> <td> ".$row[1]." </td> <td> ".$row[2]." </td> <td> ".$row[3]." </td> <td> ".$row[4]." </td>
								</tr> ";
						}
				echo '</table></div>';
			}
		}
	?>
</body>
</html>