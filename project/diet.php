<!DOCTYPE html>
<html lang="en">
<head>
	<title>Healthy Habits</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="phase4.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
</head>

	<?php
		if (!isset ($_COOKIE["login"])) {
			session_start();
			$_SESSION["page"]="diet.html";
			header("Location: login.php");
		} else {
			session_destroy();
		}
	?>


<body>
	<header id="top">
		<a href="index.html"><img id="logo" src="logo.PNG" alt="Healthy Habits Logo"></a>
		<h1 id="titlehh">healthy habits</h1>
	</header>
	<div id="navHoriz">
		<ul id="nav">
			<li><a href="calendar.php">CALENDAR</a></li>
			<li><a href="exercises.php">EXERCISES</a></li>
			<li><a href="diet.php">DIET</a></li>
			<li><a href="ratings.php">DAILY RATINGS</a></li>
			<li><a href="progress.php">PROGRESS INPUT</a></li>
		</ul>
<div id="container">




	<div id="leftnav">
		<!-- <div id="lefttop">
			<p style="font-size:30px"><b>Explore</b></p>
			<p> <a href="calendar.html">Calendar</a> </p>
			<p> <a href="exercises.html">Exercises</a> </p>
			<p> <a href="diet.html">Diet</a> </p>
			<p> <a href="ratings.html">Daily Ratings</a> </p>
			<p> <a href="progress.html">Progress Input</a> </p>
		</div> -->

			<p style="font-size:30px; t"><b>About</b></p>
			<p> Develop and maintain healthy habits with the help of our website. Create an exercise routine, diet,
			     and daily journal to change your life forever.</p>

	</div>


	<div id="rightnav">
		<p> <a href="temp.html">Article</a> </p>

		<p> <a href="temp.html">Article</a> </p>

		<p> <a href="temp.html">Article</a> </p>

	</div>


	<div id="content">
		<h2>Diets</h2>
			<div class="modules">
				<p>Diet 1 - description of diet, maybe clicking on this module will take you to a more detailed page</p>
			</div>
			<br>
			<div class="modules">
				<p>Diet 2</p>
			</div>
			<br>
			<div class="modules">
				<p>Diet 3</p>
			</div>
	</div>

	<footer id="footer">
		<h3> <a href="contact.html">Contact Us</a> </h3>
	</div>
</div>
</body>
