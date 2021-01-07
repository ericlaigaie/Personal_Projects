<!DOCTYPE html>
<html lang="en">
<head>
	<title>Healthy Habits</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="phase4.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
			$_SESSION["page"]="intake.php";
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
		<p> How much of what should you be eating every day? Most adults do not get the necessary nutrients for a healthy diet because they don't eat enough servings of each food group. For recommended intake of all age groups, visit <a href="https://health.gov/our-work/food-nutrition/2015-2020-dietary-guidelines/guidelines/appendix-7/">Health.gov</a>.</p>
	</div>

	<div id="nutritionInfo">
		<a href="https://www.heart.org/en/healthy-living/healthy-eating/eat-smart/nutrition-basics/suggested-servings-from-each-food-group" id = "healthLink">What should you be eating?</a>

		<table id = "intake" >

			<tr><th>Vegetables</th><td>5 servings / day</td></tr>
			<tr><th>Fruits</th><td>4 servings / day</td></tr>
			<tr><th>Grains</th><td>6 servings / day</td></tr>
			<tr><th>Dairy</th><td>3 servings / day</td></tr>
			<tr><th>Poultry, Meat, and Eggs</th><td>8-9 servings / week</td></tr>
			<tr><th>Fish and other Seafood</th><td>2-3 servings / week</td></tr>
			<tr><th>Nuts, Seeds, Legumes</th><td>5 servings / week</td></tr>
			<tr><th>Fats and Oils</th><td>3 servings / day</td></tr>
		</table>


	</div>
	</div>
	<footer id="footer">
		<p>UT Elements of Computing</p>
	</footer>
</div>
</body>
