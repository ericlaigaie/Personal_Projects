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

	if ($mysqli->connect_errno) {
		die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
	}

	$un = $_SESSION['username'];

	$sql = "SELECT date, weight, cal, exercise, sleep, happy FROM progressData WHERE un='$un'";
			$output = $mysqli->query($sql);
			if ($output->num_rows > 0) {
  				while($line = $output->fetch_assoc()) {
    					echo "<span>Date: ".substr($line["date"], 0, 2)."/".substr($line["date"], 2, 2)."/".substr($line["date"], 4).", Weight: ".$line["weight"].", Caloric Intake: ".$line["cal"].", Exercise Time: ".$line["exercise"].", Sleep Time: ".$line["sleep"].", Happiness Score: ".$line["happy"]."</span><br>";
  				}
			} else {
  				echo "No data in table.";
			}
?>