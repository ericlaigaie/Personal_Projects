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

			<tr><th> Question 1 </th></tr>
			<tr><td><br></td></tr>
			<tr><td> 1. "URL" stands for "Universal Reference Link".</td></tr>
			<tr><td><label> (a) True <input name = "question1" type="radio" value="true" /></label>
			<label> (b) False <input name="question1" type="radio" value="false" /></td></tr>
			<tr><td><br></td></tr>
			<tr><td><input type="submit" id="button" value="Submit" /></td></tr>
		</table>

	</form>
	</div>

<?php
	if ($_SESSION["sess"] != "question1") {
		echo '<script> alert("Error"); </script>';
		echo '<script> window.location.href = "'.$_SESSION["sess"].'.php"; </script>';
	}
?>

</body>
</html>

