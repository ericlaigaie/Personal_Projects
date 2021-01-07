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

	<header><h1> Update Student Record </h1></header>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div>
	<table>
		<tr>
		<td> Student ID </td> <td> <input type="text" name="id" required />
		</tr>
		<tr>
		<td> Last Name </td> <td> <input type="text" name="last" />
		</tr>
		<tr>
		<td> First Name </td> <td> <input type="text" name="first" />
		</tr>
		<tr>
		<td> Major </td> <td> <input type="text" name="major" />
		</tr>
		<tr>
		<td> GPA </td> <td> <input type="text" name="gpa" />
		</tr>
		<tr>
		<td colspan="2"> <input type="submit"  id="button" value="Submit" /> </td>
		</tr>
	</table>
	</div>
	</form>
	<br>
	<?php
		$server = "fall-2020.cs.utexas.edu";
		$user = "cs329e_bulko_erl778";
		$password = "Lice=Mummy3canyon";
		$database = "cs329e_bulko_erl778";

		# just like the other pages, pretty uniform up to here
		$sql = new mysqli ($server, $user, $password, $database);

		# scans form to check if requirements are met
		if (isset($_POST['id']) && $_POST['last']=="" && $_POST['first']=="" && $_POST['major']=="" && $_POST['gpa']=="") {
			echo '<script> alert("Please fill out at least one of Last, First, Major, or GPA."); </script>';
		}

		# updates form for each entry that is filled out
		else if (isset($_POST['id'])) {
			$id=$_POST['id']; $last=$_POST['last']; $first=$_POST['first']; $major=$_POST['major']; $gpa=$_POST['gpa'];

			if ($last != "") {
				$new = "UPDATE student_records SET LAST = '$last' WHERE ID = $id";
				$newer = $sql->query($new);
			}
			if ($first != "") {
				$new = "UPDATE student_records SET FIRST = '$first' WHERE ID = $id";
				$newer = $sql->query($new);
			}
			if ($major != "") {
				$new = "UPDATE student_records SET MAJOR = '$major' WHERE ID = $id";
				$newer = $sql->query($new);
			}
			if ($gpa != "") {
				$new = "UPDATE student_records SET GPA = '$gpa' WHERE ID = $id";
				$newer = $sql->query($new);
			}
		}

		# collect all data from table and print it
		$line = 'SELECT * FROM student_records';
		$output = $sql->query($line);

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
	?>
</body>
</html>