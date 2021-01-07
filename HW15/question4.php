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

			<tr><th> Question 4 </th></tr>
			<tr><td><br></td></tr>
			<tr><td> 4. This Internet layer is responsible for creating the packets that move across the network.</td></tr>
			<tr><td><label> (a) Physical <input name = "question4" type="checkbox" value="a" /></label></td></tr>
			<tr><td><label> (b) Data Link <input name = "question4" type="checkbox" value="b" /></label></td></tr>
			<tr><td><label> (c) Network <input name = "question4" type="checkbox" value="c" /></label></td></tr>
			<tr><td><label> (d) Transport <input name = "question4" type="checkbox" value="d" /></label></td></tr>
			<tr><td><br></td></tr>
			<tr><td><input type="submit" id="button" value="Submit" /></td></tr>
		</table>

	</form>
	</div>
<?php
	if ($_SESSION["sess"] != "question4") {
		echo '<script> alert("Error"); </script>';
		echo '<script> window.location.href = "'.$_SESSION["sess"].'.php"; </script>';
	}
?>

</body>
</html
