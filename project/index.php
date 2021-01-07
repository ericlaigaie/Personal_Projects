<html lang="en">
<head>
	<title>Healthy Habits</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="phase4.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<script src="homepage.js"></script>
</head>

<?php
	session_start();
	if(!isset($_GET['un'])){
		$un = $_SESSION['username'];
	}else{
		$un = $_GET['un'];
	}

	error_reporting(1);
	if (!isset ($_COOKIE["login"])) {
			session_start();
			$_SESSION["page"]="index.php";
			header("Location: login.php");
		} else {
			session_destroy();
		}

	if(array_key_exists('logout', $_POST)) {
		logout();
	}
	
	function logout(){
		if (isset ($_COOKIE["login"])) {
			setcookie("login", true, time() - 3600);
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
				<a>NUTRITION</a>
				<ul id="subnav" class="nav">
					<li><a href="nutrition.php?un=<?php echo $un ?>">RECOMMENDED INTAKE</a></li>
          			<li><a href="calorie.php?un=<?php echo $un ?>">THE CALORIE COUNTER</a></li>
				</ul>
			</li>

			<li> <a href="contact.php?un=<?php echo $un ?>">CONTACT</a> </lo>
		</ul>
	</div>

<div id="container">
	<div id="leftnav">
		<p id = "about" style="font-size:30px;"><b>ABOUT</b></p>
		<p> Develop and maintain healthy habits with the help of our website. Create an exercise routine, diet,
			and daily journal to change your life forever.</p>
	</div>
		<div id="slideshow">
				<a href="">
				<img id="img" src="images/diet_image.jpg" alt="Slideshow" />
				</a>
		</div>
	</div>
	</div>
</div>

<footer id="footer">
	<p>UT Elements of Computing</p>
</footer>

</body>
</html>
