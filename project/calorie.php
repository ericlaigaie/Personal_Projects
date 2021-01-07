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
	<script type = "text/javascript" src = "calorie.js"></script>

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
			$_SESSION["page"]="calorie.php";
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
			<p> Experiment with different combinations of recommended food groups by dragging and dropping them onto your plate!</p>
	</div>

	<div id="nutritionInfo">

		<img src="food_images/plate.png" alt="plate" height="400px"/>

		<table id = "foods" >

			<tr><th>Protein</th><td></td></tr>
			<tr><th>Vegetables</th><td></td></tr>
			<tr><th>Grains</th><td></td></tr>
			<tr><th>Dairy</th><td></td></tr>
			<tr><th>Nuts, Seeds, Legumes</th><td></td></tr>
		</table>


		<img id="food1" src="food_images/toast.png" height = "160px" style = "position: absolute; top: 930px; left:   600px;" onmousedown = "grabber(event);"/>
   <img id="food2" src="food_images/peanut.png" height = "140px" style = "position: absolute; top: 1200px; left:  620px;" onmousedown = "grabber(event);"/>
   <img id="food3" src="food_images/avocado.png" height = "120px" style = "position: absolute; top: 690px; left: 1190px;" onmousedown = "grabber(event);"/>
	 <img id="food4" src="food_images/sweetpotato.png" height = "120px" style = "position: absolute; top: 815px; left: 910px;" onmousedown = "grabber(event);"/>
	 <img id="food5" src="food_images/yogurt.png" height = "180px" style = "position: absolute; top: 1040px; left:  700px;" onmousedown = "grabber(event);"/>
	 <img id="food6" src="food_images/egg.png" height = "150px" style = "position: absolute; top: 675px; left: 620px;" onmousedown = "grabber(event);"/>
	 <img id="food7" src="food_images/broccoli.png" height = "120px" style = "position: absolute; top: 820px; left: 770px;" onmousedown = "grabber(event);"/>
	 <img id="food8" src="food_images/rice.png" height = "140px" style = "position: absolute; top: 940px; left: 780px;" onmousedown = "grabber(event);"/>
	 <img id="food9" src="food_images/chicken.png" height = "140px" style = "position: absolute; top: 685px; left: 1050px;" onmousedown = "grabber(event);"/>
	 <img id="food10" src="food_images/fish.png" height = "140px" style = "position: absolute; top: 680px; left: 780px;" onmousedown = "grabber(event);"/>
	 <img id="food11" src="food_images/shrimp.png" height = "140px" style = "position: absolute; top: 690px; left: 930px;" onmousedown = "grabber(event);"/>
	 <img id="food12" src="food_images/corn.png" height = "130px" style = "position: absolute; top: 815px; left: 1070px;" onmousedown = "grabber(event);"/>
	 <img id="food13" src="food_images/carrot.png" height = "130px" style = "position: absolute; top: 815px; left: 620px;" onmousedown = "grabber(event);"/>
	 <img id="food14" src="food_images/cheese.png" height = "130px" style = "position: absolute; top: 1080px; left: 610px;" onmousedown = "grabber(event);"/>
	 <img id="food15" src="food_images/beans.png" height = "120px" style = "position: absolute; top: 1210px; left:  780px;" onmousedown = "grabber(event);"/>
	 <img id="food16" src="food_images/rice.png" height = "140px" style = "position: absolute; top: 940px; left: 780px;" onmousedown = "grabber(event);"/>


		</div>



	</div>
	<footer id="footer">
		<p>UT Elements of Computing</p>
	</footer>
</div>
</body>
