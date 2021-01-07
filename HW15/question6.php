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

			<tr><th> Question 6 </th></tr>
			<tr><td><br></td></tr>
			<tr><td> 6. A small icon displayed in a browser table that identifies a website is called a ______.</td></tr>
			<tr><td><label> <input name="question6" /></label></td></tr>
			<tr><td><br></td></tr>
			<tr><td><input type="submit" id="button" value="Submit" /></td></tr>
		</table>

	</form>
	</div>
<?php
	if (!isset($_SESSION['sess'])) {
		echo '<script> alert("Finished Quiz."); </script>';
		echo '<script> window.location.href = "HW15.php";</script>';
	}

	else if ($_SESSION["sess"] != "question6") {
		echo '<script> alert("Error"); </script>';
		echo '<script> window.location.href = "'.$_SESSION["sess"].'.php"; </script>';
	}
?>

</body>
</html>
