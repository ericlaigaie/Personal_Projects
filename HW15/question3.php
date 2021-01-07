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

			<tr><th> Question 3 </th></tr>
			<tr><td><br></td></tr>
			<tr><td> 3. Which of these do NOT contribute to a packet delay in a packet switching network?</td></tr>
			<tr><td><label> (a) Processing delay at a router <input name = "question3" type="checkbox" value="a" /></label></td></tr>
			<tr><td><label> (b) CPU workload on a client <input name = "question3" type="checkbox" value="b" /></label></td></tr>
			<tr><td><label> (c) Transmission delay along a communications link <input name = "question3" type="checkbox" value="c" /></label></td></tr>
			<tr><td><label> (d) Propagation delay <input name = "question3" type="checkbox" value="d" /></label></td></tr>
			<tr><td><br></td></tr>
			<tr><td><input type="submit" id="button" value="Submit" /></td></tr>
		</table>

	</form>
	</div>
<?php
	if ($_SESSION["sess"] != "question3") {
		echo '<script> alert("Error"); </script>';
		echo '<script> window.location.href = "'.$_SESSION["sess"].'.php"; </script>';
	}
?>

</body>
</html>
