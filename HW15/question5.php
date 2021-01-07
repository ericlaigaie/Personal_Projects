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
	<div id="box">
	<form method="post" action="score.php">
		<table>

			<tr><th> Question 5 </th></tr>
			<tr><td><br></td></tr>
			<tr><td> 5. ______ is a networking protocol that runs over TCP/IP and governs communication between web browsers and web servers.</td></tr>
			<tr><td><label> <input name="question5" /></label></td></tr>
			<tr><td><br></td></tr>
			<tr><td><input type="submit" id="button" value="Submit" /></td></tr>
		</table>

	</form>
	</div>
<?php
	if ($_SESSION["sess"] != "question5") {
		echo '<script> alert("Error"); </script>';
		echo '<script> window.location.href = "'.$_SESSION["sess"].'.php"; </script>';
	}
?>

</body>
</html>
