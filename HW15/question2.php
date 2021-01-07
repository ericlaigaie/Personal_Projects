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

			<tr><th> Question 2 </th></tr>
			<tr><td><br></td></tr>
			<tr><td> 2. An Apple MacBook is an example of a Linux system.</td></tr>
			<tr><td><label> (a) True <input name = "question2" type="radio" value="true" /></label>
			<label> (b) False <input name="question2" type="radio" value="false" /></td></tr>
			<tr><td><br></td></tr>
			<tr><td><input type="submit" id="button" value="Submit" /></td></tr>
		</table>

	</form>
	</div>
<?php
	if ($_SESSION["sess"] != "question2") {
		echo '<script> alert("error"); </script>';
		echo '<script> window.location.href = "'.$_SESSION["sess"].'.php"; </script>';
	}
?>

</body>
</html>
