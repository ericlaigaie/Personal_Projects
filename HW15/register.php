<?php session_start();
?>

<html lang="en">

<head>
	<title> Register </title>
	<meta charset="UTF-8">
	<meta name="description" content="Register">
	<meta name="author" content="Eric Laigaie">
	<link href="HW15.css" rel="stylesheet">
</head>

<body>

	<header>
		<h1> Register </h1>
	</header>

	<form action="register1.php" method="post">
<br>
	<div id="box">
	<table>
		<tr>
			<td class="d"> User ID </td>
			<td class="d"> <input type="text" name="username" /> </td>
		</tr>

		<tr><td><br /></td></tr>

		<tr>
			<td class="d"> Password </td>
			<td class="d"> <input type="text" name="passwd" /> </td>
		</tr>

		<tr><td><br /></td></tr>

		<tr>
			<td colspan="2"> <input type="submit" id="button" name="Register" /> </td>
		</tr>
	</table>
	</div>
	</form>
</body>
</html>
