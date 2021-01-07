<!DOCTYPE html>
<html lang="en">
<head>
	<title>Healthy Habits</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="phase4.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
	<script src="progress.js"></script>
</head>

	<?php
		error_reporting(1);
		session_start();
		if(!isset($_GET['un'])){
			$un = $_SESSION['username'];
		}else{
			$un = $_GET['un'];
		}
		$_SESSION['username'] = $un;
		if (!isset ($_COOKIE["login"])) {
			session_start();
			$_SESSION["page"]="progress.php";
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
		/*
		$server = "127.0.0.1";
		$user = "root";
		$pwd = "";
		$database = "mydb";
		*/

		$server = "fall-2020.cs.utexas.edu";
		$user = "cs329e_bulko_vnp337";
		$pwd = "room!muck!ritual";
		$database = "cs329e_bulko_vnp337";

		$mysqli = new mysqli ($server, $user, $pwd, $database);

		if ($mysqli->connect_errno) {
			die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
		}

		$weight = $_GET["weight"];
		$cal = $_GET["calories"];
		$exercise = $_GET["exercise"];
		$sleep = $_GET["sleep"];
		$happy = $_GET["happy"];
		$clicked = $_GET["clicked"];
		if ($clicked == 'Submit'){
			if (($weight == '') || ($cal == '') || ($exercise == '') || ($sleep == '')){
				echo "<script> alert('Please fill in all answers before submitting');</script>";
			}else{
				$date = getdate();
				if (strlen($date[mday]) == 1){
					$day = "0".$date[mday];
				}
				if (strlen($date[mon]) == 1){
					$mon = "0".$date[mon];
				}else {$mon = $date[mon];}

				$today = $mon.$day.$date[year];
				$sql = "SELECT date FROM progressData WHERE date='$today' and un='$un'";
				$dates = $mysqli->query($sql);

				if ($dates->num_rows != 0) {
  					$sql = "UPDATE progressData SET weight='$weight', cal='$cal', exercise='$exercise', sleep='$sleep', happy='$happy' WHERE date='$today' and un='$un'";
  					if ($mysqli->query($sql) === TRUE) {
	  					echo "Progress successfully updated";
					} else {
 						echo "Error: " . $sql . "<br>" . $mysqli->error;
					}
				}else{
					$sql = "INSERT INTO progressData (date, un, weight, cal, exercise, sleep, happy) VALUES ('$today', '$un', '$weight', '$cal', '$exercise', '$sleep', '$happy')";
					if ($mysqli->query($sql) === TRUE) {
	  					echo "Progress successfully inserted";
					} else {
	 					echo "Error: " . $sql . "<br>" . $mysqli->error;
					}
				}
			}
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
		<p> Update to track your progress and see how you're improving! </p>
	</div>

	<div id="content">

		<h2>Enter Your Progress</h2>

			<div id="ProgressForm">
				<form method="get" id="progForm">
					<p><b>Weight (lbs): </b><input type="number" name='weight' id="weight" placeholder="Enter your weight" min="0"></p>
					<p><b>Caloric Intake: </b><input type="number" name='calories' id="calories" placeholder="Enter your caloric intake for the day" min="0"></p>
					<p><b>Exercise Time (min): </b><input type="number" name='exercise' id="exercise" placeholder="Enter your exercise time for the day" min="0" max="200"></p>
					<p><b>Sleep Time (hrs): </b><input type="number" name='sleep' id="sleep" placeholder="Enter your sleep time for the day" min="0" max="24"></p>
					<p><b>Happiness Score: </b><br>
						<select id="happyness" name="happy">
							<option type="radio" value="1" id="nvh"/> Not Very Happy (1)</option>
							<option type="radio" value="2" id="su"/> Somewhat Unhappy (2)</option>
							<option type="radio" value="3" id="n"/> Neutral (3)</option>
	                        <option type="radio" value="4" id="sh"/> Somewhat Happy (4)</option>
							<option type="radio" value="5" id="vh"/> Very Happy (5)</option>
						</select>
					</p>
					<input type="hidden" name="un" value="<?php echo $un ?>">
					<input type="submit" name="clicked" id="Submit" value="Submit"/>
					<input type="button" id="Clear" value="Clear"/>
				</form>
				<form id="viewData" method="get">
					<input type="hidden" name="un" value="<?php echo $un ?>">
					<input type="submit" id="View" onclick="viewClick=1;" name="View" value="View My Progress"/>
				</form><br>
				<div id="sqlUpdates">
				</div>
			</div>
		</div>
	</div>
</div>
	<footer id="footer">
	<p>UT Elements of Computing</p>
	</footer>
</body>
</html>
