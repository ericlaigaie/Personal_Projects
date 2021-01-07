<!DOCTYPE html>
<html lang="en">
<head>
	<title>Healthy Habits</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="Stylesheets/exercises.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
</head>

	<?php
		if (!isset ($_COOKIE["login"])) {
			session_start();
			$_SESSION["page"]="exercises.html";
			header("Location: login.php");
		} else {
			session_destroy();
		}
	?>


<body>
	<header id="top">
		<a href="index.html"><img id="logo" src="logo.PNG" alt="Healthy Habits Logo"></a>
		<h1 id="titlehh">Healthy Habits</h1>
	</header>
	<div id="navHoriz">
		<ul id="nav">
			<li><a href="calendar.php">CALENDAR</a></li>
			<li><a href="exercises.php">EXERCISES</a></li>
			<li><a href="diet.php">DIET</a></li>
			<li><a href="ratings.php">DAILY RATINGS</a></li>
			<li><a href="progress.php">PROGRESS INPUT</a></li>
		</ul>
	</div>
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

				<p style="font-size:30px;"><b>About</b></p>
				<p> Develop and maintain healthy habits with the help of our website. Create an exercise routine, diet,
				     and daily journal to change your life forever.</p>
		</div>

		<div id="rightnav">
			<p> <a href="temp.html">Article</a> </p>

			<p> <a href="temp.html">Article</a> </p>

			<p> <a href="temp.html">Article</a> </p>
		</div>

		<div id="content">
			<h2>Exercises</h2>
				<div class="modulesExercise">
					<h3>Exercise Plan for Weight Loss: </h3>
					<ul id="MainExerciseList">
						<li>Monday: Lower Body
							<ul class="SubExerciseList">
								<li>3 x 10 Squats</li>
								<li>3 x 10 Lunges</li>
								<li>3 x 6 Kettlebell Deadlift</li>
								<li>2 x 10 Glute Bridge</li>
							</ul>
						</li><br>
						<li>Tuesday: HIIT Cardio
							<ul class="SubExerciseList">
								<li>10 minute warmup jog</li>
								<li>45 minutes HIIT</li>
								<li>Static stretches</li>
							</ul>
						</li><br>
						<li>Wednesday: Upper Body
							<ul class="SubExerciseList">
								<li>3 x 10 Single-arm Chest Press</li>
								<li>3 x 10 Bent-over Row</li>
								<li>3 x 10 Pushups</li>
								<li>15 minute jog</li>
							</ul>
						</li><br>
						<li>Thursday: Cardio
							<ul class="SubExerciseList">
								<li>60 minutes of steady-pace cardio</li>
							</ul>
						</li><br>
						<li>Friday: Full Body
							<ul class="SubExerciseList">
								<li>10 minute warmup jog</li>
								<li>30 minutes rowing</li>
								<li>3 x 25 Crunches</li>
								<li>Static stretches</li>
							</ul>
						</li><br>
						<li>Saturday: Rest</li><br>
						<li>Sunday: Rest</li>
					</ul>
				</div>
				<br>
				<div class="modules">
					<h3>Exercise Plan for Muscle Gain: </h3>
					<ul id="MainExerciseList">
						<li>Monday: Chest
							<ul id="SubExerciseList">
								<li>3 x 10 Chess Press</li>
								<li>3 x 10 Incline Chest Press</li>
								<li>3 x 12 Dumbbell Flys</li>
								<li>3 x 10 Tricep Pulldown</li>
							</ul>
						</li><br>
						<li>Tuesday: Back
							<ul id="SubExerciseList">
								<li>3 x 10 Barbell Bent-over Row</li>
								<li>3 x 10 Lat Pulldown</li>
								<li>3 x 10 Reverse Flys</li>
								<li>3 x 10 Dumbbell Shrugs</li>
							</ul>
						</li><br>
						<li>Wednesday: Rest</li><br>
						<li>Thursday: Legs
							<ul id="SubExerciseList">
								<li>3 x 10 Barbell Squats</li>
								<li>3 x 10 Barbell Lunges</li>
								<li>3 x 10 Seated Leg Press</li>
								<li>3 x 10 Glute Press</li>
							</ul>
						</li><br>
						<li>Friday:
							<ul id="SubExerciseList">
								<li>3 x 10 Shoulder Press</li>
								<li>3 x 10 Shoulder Dumbbell Flys</li>
								<li>3 x 10 Lateral Raise</li>
								<li>3 x 10 Upright Row</li>
							</ul>
						</li><br>
						<li>Saturday: Rest</li><br>
						<li>Sunday: Rest</li>
					</ul>
				</div>
				<br>
				<div class="modules">
					<h3>Exercise Plan for Endurance Training: </h3>
					<ul>
						<li>Monday: 2 Mile Run</li>
						<li>Tuesday: 4 Mile Run</li>
						<li>Wednesday: Rest</li>
						<li>Thursday: 5 Hill Sprints</li>
						<li>Friday: 2 Mile Run</li>
						<li>Saturday: 4 Mile Run</li>
						<li>Sunday: Rest</li>
					</ul>
				</div>
				<div id="footer">
					<h3> <a href="contact.html">Contact Us</a> </h3>
				</div>
		</div>

		
		</div>
	</div>
</body>
