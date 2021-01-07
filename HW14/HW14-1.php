<html lang="en">

<head>
	<title> Login / Register </title>
	<meta charset="UTF-8">
	<meta name="description" content="Login / Register">
	<meta name="author" content="Eric Laigaie">
	<link href="HW14.css" rel="stylesheet">
</head>

<body>
	<?php
		if (!isset ($_COOKIE["login"])) {
			session_start();
			$_SESSION["page"]="HW14-1.php";
			header("Location: login.php");
		} else {
			session_destroy();
		}
	?>

	<header>
		<h1> Joe Biden Wins Presidency </h1>
		<p>11/13/2020</p>
	</header>

<br>

	<div class="d">
		<p>Biden secured 306 votes in the Electoral College, making him the next President of the United States.</p>
	</div>

<br>

	<div class="r">
		<a href="HW14.php"> Homepage </a>
	</div>

</body>
</html>
	