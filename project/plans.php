<!DOCTYPE html>
<html lang="en">
<head>
	<title>Healthy Habits</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="plans.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>

	<?php
		error_reporting(0);
		session_start();
		if(!isset($_GET['un'])){
			$un = $_SESSION['username'];
		}else{
			$un = $_GET['un'];
		}

		if (!isset ($_COOKIE["login"])) {
			session_start();
			$_SESSION["page"]="plans.php";
			header("Location: login.php");
		} else {
			session_destroy();
		}

		if(array_key_exists('logout', $_POST)) {
			logout();
		}

		function logout(){
			if (isset ($_COOKIE["login"])) {
				setcookie("login", true, time() -3600);
				header("Location: login.php");
			}
			session_destroy();
		}
	?>

<body>
	<header id="top">
		<div class="topHeader" id="t1">
			<a href="index.php?un=<?php echo $un ?>"><img id="logo" src="images/logotemp.png" alt="Healthy Habits Logo"></a>
		</div>
		<div class="topHeader" id="t2">
			<h1 id="titlehh">HEALTHY HABITS</h1>
		</div>
		<div class="topHeader" id="t3">
			<form id="logoutReg" method="post">
				<input type="submit" name="logout" value="Logout">
			</form>
		</div>
	</header>

	<div id="navHoriz">
		<ul class="nav">
			<li><a href="plans.php?un=<?php echo $un ?>">PLANS</a></li>
			<li><a href="ratings.php?un=<?php echo $un ?>">DAILY RATINGS</a></li>
			<li><a href="progress.php?un=<?php echo $un ?>">PROGRESS INPUT</a></li>
			<li >
				<a >NUTRITION</a>
				<ul id="subnav" class="nav">
					<li><a href="nutrition.php?un=<?php echo $un ?>">RECOMMENDED INTAKE</a></li>
          			<li><a href="calorie.php?un=<?php echo $un ?>">CHOOSE YOUR PLATE</a></li>
				</ul>
			</li>

			<li> <a href="contact.php?un=<?php echo $un ?>">CONTACT</a> </lo>
		</ul>
	</div>
	<div id="container">
		<div id="leftnav">
				<p id = "about" style="font-size:30px;"><b>ABOUT</b></p>
				<p> Choose a exercise and diet regimen that's right for you. Our three plans also include a recommended example diet and easy recipes.</p>
		</div>

		<div id="content">
			<h2>Plans</h2>
			<form id="planForm" action="#" method="POST">
				<input type="submit" name="WeightLoss" value="Weight Loss" class="planButton">
				<input type="submit" name="MuscleGain" value="Muscle Gain" class="planButton">
				<input type="submit" name="Endurance" value="Endurance Training" class="planButton">
			</form>

		<?php
			if(array_key_exists('WeightLoss', $_POST)) {
				WeightLoss();
			}

			function WeightLoss(){
				echo '<div class="modulesExercise">
						<h3>Exercise Plan for Weight Loss: </h3>

						<ul class="MainExerciseList">
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
						<section class = "video">


						<iframe width="420" height="315"
									src="https://www.youtube.com/embed/njKwu3dqD0Y?controls=0">
							</iframe>
							</section>
					</div>


					<div class="modulesExercise">
						<h3>Diet Plan for Weight Loss: </h3>
						<ul class="MainExerciseList">
							<li>Breakfast:
								<ul class="SubExerciseList">
									<li>Option 1: 2 Hard Boiled Eggs, 1 Cup Berries, 1 Piece Whole Grain Toast</li>
									<li>Option 2: Whole Grain English muffin topped with 1 tbsp peanut butter, 1 cup grapes</li>
									<li>Option 3: 1 cup Berries, 1 Banana, 1/2 Cup Oats, 1 Cup Almong Milk, Ice</li>
								</ul>
							</li><br>
							<li>Snacks (2 per day):
								<ul class="SubExerciseList">
									<li>1 Cup sliced cucumbers</li>
									<li>1 Cup Greek Yogurt with Honey</li>
									<li>1 Banana</li>
								</ul>
							</li><br>
							<li>Lunch:
								<ul class="SubExerciseList">
									<li>Option 1: Chicken Quinoa Soup</li>
									<li>Option 2: Egg Salad Sandwich</li>
									<li>Option 3: Lettuce Wraps</li>
									<li>Option 4: Turkey Pitas</li>
								</ul>
							</li><br>
							<li>Dinner:
								<ul class="SubExerciseList">
									<li>Option 1: Roasted Chicken Thighs, Asparagus, Cheesy Quinoa</li>
									<li>Option 2: Chicken and Veggie Soup Salad</li>
									<li>Option 3: Beer-Braised Pot Roast, Roasted Broccoli</li>
								</ul>
							</li><br>
						</ul>

					</div>';
			}

			if(array_key_exists('MuscleGain', $_POST)) {
				MuscleGain();
			}

			function MuscleGain(){
				echo '<div class="modulesExercise">
					<h3>Exercise Plan for Muscle Gain: </h3>
					<ul class="MainExerciseList">
						<li>Monday: Chest
							<ul class="SubExerciseList">
								<li>3 x 10 Chess Press</li>
								<li>3 x 10 Incline Chest Press</li>
								<li>3 x 12 Dumbbell Flys</li>
								<li>3 x 10 Tricep Pulldown</li>
							</ul>
						</li><br>
						<li>Tuesday: Back
							<ul class="SubExerciseList">
								<li>3 x 10 Barbell Bent-over Row</li>
								<li>3 x 10 Lat Pulldown</li>
								<li>3 x 10 Reverse Flys</li>
								<li>3 x 10 Dumbbell Shrugs</li>
							</ul>
						</li><br>
						<li>Wednesday: Rest</li><br>
						<li>Thursday: Legs
							<ul class="SubExerciseList">
								<li>3 x 10 Barbell Squats</li>
								<li>3 x 10 Barbell Lunges</li>
								<li>3 x 10 Seated Leg Press</li>
								<li>3 x 10 Glute Press</li>
							</ul>
						</li><br>
						<li>Friday:
							<ul class="SubExerciseList">
								<li>3 x 10 Shoulder Press</li>
								<li>3 x 10 Shoulder Dumbbell Flys</li>
								<li>3 x 10 Lateral Raise</li>
								<li>3 x 10 Upright Row</li>
							</ul>
						</li><br>
						<li>Saturday: Rest</li><br>
						<li>Sunday: Rest</li>
					</ul>

					<section class = "video">


					<iframe width="420" height="315"
								src="https://www.youtube.com/embed/95846CBGU0M?controls=0">
						</iframe>
						</section>

				</div>
				<div class="modulesExercise">
						<h3>Diet Plan for Muscle Gain: </h3>
						<ul class="MainExerciseList">
							<li>Breakfast:
								<ul class="SubExerciseList">
									<li>Option 1: 4-6 Egg Omelette with Spinach and Mushrooms</li>
									<li>Option 2: Protein Pancakes with 1 tbsp Honey</li>
									<li>Option 3: Large bowl of Oatmeal and Nuts</li>
								</ul>
							</li><br>
							<li>Snacks:
								<ul class="SubExerciseList">
									<li>Greak Yogurt with Nuts or Berries</li>
									<li>Protein Shake</li>
									<li>Nut Butter toast with Banana</li>
								</ul>
							</li><br>
							<li>Lunch:
								<ul class="SubExerciseList">
									<li>Option 1: Chicken Breast with broccoli</li>
									<li>Option 2: Chicken Breast with avocado</li>
									<li>Option 3: Meatballs with Cucumbers</li>
									<li>Option 4: Chicken Breast Caeser Salad</li>
								</ul>
							</li><br>
							<li>Dinner:
								<ul class="SubExerciseList">
									<li>Option 1: Chicken or Pork with 1 cup of rice and veggies</li>
									<li>Option 2: Salmon with 1 cup of rice and broccoli</li>
									<li>Option 3: Pasta with Ham and tomatoes</li>
								</ul>
							</li><br>
						</ul>
					</div>';
			}

			if(array_key_exists('Endurance', $_POST)) {
				Endurance();
			}

			function Endurance(){
				echo '<div class="modulesExercise">
						<h3>Exercise Plan for Endurance Training: </h3>
							<ul class="MainExerciseList">
								<li>Monday: 2 Mile Run</li>
								<li>Tuesday: 4 Mile Run</li>
								<li>Wednesday: Rest</li>
								<li>Thursday: 5 Hill Sprints</li>
								<li>Friday: 2 Mile Run</li>
								<li>Saturday: 4 Mile Run</li>
								<li>Sunday: Rest</li>
							</ul>

							<section class = "video">


							<iframe width="420" height="315"
										src="https://www.youtube.com/embed/5uVaKjtJHN8?controls=0">
								</iframe>
								</section>
						</div>



						<div class="modulesExercise">
						<h3>Diet Plan for Endurance Training: </h3>
						<ul class="MainExerciseList">
							<li>Breakfast:
								<ul class="SubExerciseList">
									<li>Option 1: Oats with berries and pecans</li>
									<li>Option 2: Eggs and fruit</li>
									<li>Option 3: Ham & Egg sandwich with fruit</li>
								</ul>
							</li><br>
							<li>Snacks:
								<ul class="SubExerciseList">
									<li>Chocolate Almond Shake</li>
									<li>Protein Shake</li>
									<li>Yogurty and Banana</li>
								</ul>
							</li><br>
							<li>Lunch:
								<ul class="SubExerciseList">
									<li>Option 1: Chicken Fajita Salad</li>
									<li>Option 2: Rice Cake with Turkey and Avocado</li>
									<li>Option 3: Chef Salad</li>
								</ul>
							</li><br>
							<li>Dinner:
								<ul class="SubExerciseList">
									<li>Option 1: Pot Roast and Veggies</li>
									<li>Option 2: Loaded Baked Sweet potato</li>
									<li>Option 3: Chicken Enchilada soup</li>
								</ul>
							</li><br>
						</ul>
					</div>';
			}
		?>
		</div>
		<footer id="footer">
			<p>UT Elements of Computing</p>
		</footer>
	</div>

</body>
