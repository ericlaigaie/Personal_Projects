<?php
	# pull up SQL file
	$server = "fall-2020.cs.utexas.edu";
	$user = "cs329e_bulko_vnp337";
	$pwd = "room!muck!ritual";
	$database = "cs329e_bulko_vnp337";
	/*
	$server = "127.0.0.1";
	$user = "root";
	$pwd = "";
	$database = "mydb";
	*/
	$mysqli = new mysqli ($server, $user, $pwd, $database);
	//$mysqli = mysqli_connect($server, $user, $pwd, $database);
?>

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
		error_reporting(1);
		session_start();
		if(!isset($_GET['un'])){
			$un = $_SESSION['username'];
		}else{
			$un = $_GET['un'];
		}

		if (!isset ($_COOKIE["login"])) {
			session_start();
			$_SESSION["page"]="ratings.php";
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
				<a>NUTRITION</a>
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
		<p> Keep track of your average happiness, sleep time, and water intake and track your progess visually!</p>
	</div>

	<div id="contentRatings">
		<h2>Graphics</h2>
	<table>
		<tr>
		<td id="gauge">
			<script type="text/javascript">
				google.charts.load('current', {'packages':['gauge']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
  					var data = google.visualization.arrayToDataTable([['Label', 'Value'],
						<?php
							//$un = $_SESSION['username'];
							$query = "SELECT * from progressData WHERE un='$un'";
							$output = mysqli_query($mysqli, $query);
							if ($output->num_rows===0) {
								$happyScore = 0;
							} else {
								$happyScore = 0;
								$index = 0;
								while ($data = mysqli_fetch_array($output)) {
									$happyScore = $happyScore + $data['happy'];
									$index = $index + 1;
								}
								$happyScore = $happyScore / $index;
							}
							echo "['Happiness', $happyScore]";
						?>
					]);

  					var options = {
						max:  5, width: 200, height: 200,
						greenFrom: 3, greenTo: 5, yellowFrom: 1, yellowTo: 3,
						redFrom: 0, redTo:1, minorTicks: 2
					};
  					var chart = new google.visualization.Gauge(document.getElementById('gauge'));
  					chart.draw(data, options);
					}
			</script>
		</td>
		<td id="gauge1">
			<script type="text/javascript">

				google.charts.load('current', {'packages':['gauge']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
  					var data = google.visualization.arrayToDataTable([['Label', 'Value'],
						<?php
							//$un = $_SESSION['username'];
							$query = "SELECT * from progressData WHERE un='$un'";
							$output = mysqli_query($mysqli, $query);
							if ($output->num_rows===0) {
								$sleepScore = 0;
							} else {
								$sleepScore = 0;
								$index = 0;
								while ($data = mysqli_fetch_array($output)) {
									$sleepScore = $sleepScore + $data['sleep'];
									$index = $index + 1;
								}
								$sleepScore = $sleepScore / $index;
							}
							echo "['Sleep Time', $sleepScore]";
						?>

					]);

  					var options = {
						max: 12, width:200, height:200,
						greenFrom: 8, greenTo: 12, yellowFrom: 4, yellowTo: 8,
						redFrom: 0, redTo:4, minorTicks: 3
					};

  					var chart = new google.visualization.Gauge(document.getElementById('gauge1'));
  					chart.draw(data, options);
					}
			</script>
		</td>
		<td id="gauge2">
			<script type="text/javascript">

				google.charts.load('current', {'packages':['gauge']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
  					var data = google.visualization.arrayToDataTable([['Label', 'Value'],
						<?php
							//$un = $_SESSION['username'];
							$query = "SELECT * from progressData WHERE un='$un'";
							$output = mysqli_query($mysqli, $query);
							if ($output->num_rows===0) {
								$exerciseScore = 0;
							} else {
								$exerciseScore = 0;
								$index = 0;
								while ($data = mysqli_fetch_array($output)) {
									$exerciseScore = $exerciseScore + $data['exercise'];
									$index = $index + 1;
								}
								$exerciseScore = $exerciseScore / $index;
							}
							echo "['Exercise Time', $exerciseScore]";
						?>
					]);

  					var options = {
						max: 200, width:200, height:200,
						greenFrom: 60, greenTo: 200, yellowFrom: 30, yellowTo: 60,
						redFrom: 0, redTo:30, minorTicks: 5
					};

  					var chart = new google.visualization.Gauge(document.getElementById('gauge2'));
  					chart.draw(data, options);
					}
			</script>
		</td>
		</tr>
		<tr class="line">
		<td id="line" colspan="3">

			<script type="text/javascript">

				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
  					var data = google.visualization.arrayToDataTable(<?php
						//$un = $_SESSION['username'];
						$query = "SELECT date, weight from progressData WHERE un='$un'";
						$output = mysqli_query($mysqli, $query);
						$days = [];
						$weights = [];
						$index = 0;
						if ($output->num_rows===0) {
							$empty = 0;
						} else {
							$empty = 1;
							while ($data = mysqli_fetch_array($output)) {
								$days[$index] = $data['date'];
								$weights[$index] = $data['weight'];
								$index = $index + 1;
							}
						}
						$index = 0;
						$inputStr = "";
						foreach ($days as &$val){
							$dateFormatted = substr($val, 0, 2)."/".substr($val, 2, 2)."/".substr($val, 4, 2);
							$inputStr = $inputStr."['".$dateFormatted."', ".$weights[$index]."], ";
							$index = $index + 1;
						}
						$inputStr = substr($inputStr, 0, strlen($inputStr)-2);

						if ($empty == 0){
							echo "[['Day', 'Weight']]);";
						}else{
							echo "[['Day', 'Weight'],".$inputStr."]);";
						}
					?>

  					var options = {
						title: 'Body Weight', height: 400, curveType: 'function', hAxis: {slantedText:true, slantedTextAngle:45}, legend: {position:'bottom'}
					};

  					var chart = new google.visualization.LineChart(document.getElementById('line'));
  					chart.draw(data, options);
				}
			</script>
		</td>
		</tr><tr class="line">
		<td id="line_2" colspan="3">
			<script type="text/javascript">

				google.charts.load('current', {'packages':['corechart']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
  					var data = google.visualization.arrayToDataTable(
  					<?php
						//$un = $_SESSION['username'];
						$query = "SELECT date, sleep, happy from progressData WHERE un='$un'";
						$output = mysqli_query($mysqli, $query);
						$days = [];
						$sleep = [];
						$happy = [];
						$index = 0;
						if ($output->num_rows===0) {
							$empty = 0;
						} else {
							$empty = 1;
							while ($data = mysqli_fetch_array($output)) {
								$days[$index] = $data['date'];
								$sleep[$index] = $data['sleep'];
								$happy[$index] = $data['happy'];
								$index = $index + 1;
							}
						}
						$index = 0;
						$inputStr = "";
						foreach ($days as &$val){
							$dateFormatted = substr($val, 0, 2)."/".substr($val, 2, 2)."/".substr($val, 4, 2);
							$inputStr = $inputStr."['".$dateFormatted."', ".$sleep[$index].", ".$happy[$index]."], ";
							$index = $index + 1;
						}
						$inputStr = substr($inputStr, 0, strlen($inputStr)-2);
						if ($empty == 0){
							echo "[['Day', 'Sleep', 'Happiness']]);";
						}else{
							echo "[['Day', 'Sleep', 'Happiness'],".$inputStr."]);";
						}
					?>

  					var options = {
						title: 'Sleep Time vs. Happiness', curveType: 'function',  hAxis: {slantedText:true, slantedTextAngle:45}, legend: {position:'bottom'}
					};

  					var chart = new google.visualization.LineChart(document.getElementById('line_2'));
  					chart.draw(data, options);
					}
			</script>
		</td>
		</tr>

	</table>
	</div>



	</div>
	<footer id="footer">
		<p>UT Elements of Computing</p>
	</footer>
</div>
</body>
