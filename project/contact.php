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

<html lang="en">

<head>
	<title>Contact Us - Healthy Habits</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="contact.css">
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>

<body id="contactBody">
	<div>
		<header class="name">
			<h1 id="contactTitle">CONTACT US</h1>
		</header>


		<div class="modules">
			<h4>ERIC LAIGAIE</h4>
			<p>Economics student at UT Austin. Also studying Computing and Statistical Modeling.</p>
			<p><a href="mailto:ericlaigaie@gmail.com">ericlaigaie@gmail.com</a></p>
			<p><a href="https://fall-2020.cs.utexas.edu/cs329e-bulko/erl778.index.html">Eric's 329e Projects</a></p>
		</div>

		<div class="modules">
			<h4>VISHAL PATEL</h4>
			<p>Mechanical Engineering student at UT Austin with interests in Computer Science</p>
			<p><a href="mailto:vishalp3015@gmail.com">vishalp3015@gmail.com</a></p>
			<p><a href="https://fall-2020.cs.utexas.edu/cs329e-bulko/vnp337/index.html">Vishal's 329e Projects</a></p>
		</div>
		<div class="modules">
			<h4>ELENA LIEM</h4>
			<p>Radio-Television-Film and French Language student at UT Austin with minors in Computer Science and Digital Arts </p>
			<p><a href="mailto:eal2724@gmail.com">eal2724@gmail.com</a></p>
			<p><a href="https://fall-2020.cs.utexas.edu/cs329e-bulko/eal2724/index.html">Elena's 329e Projects</a></p>
		</div>
		<div class="modules">
			<h4 style="font-size: 30px;">Contact Form</h4>
			<form href="#" id="contactForm">
				<input type="text" placeholder="Name" name="name" id="name"><br>
				<input type="text" placeholder="Email" name="email" id="email"><br>
				<textarea placeholder="Comment" name="comment" id="comment" rows="8"></textarea><br>
				<input type="button" value="Submit" onclick = "validate()">
				<input type="reset" value="Clear">
			<form>
		</div>
		<br>

		<div>
			<p> <a href="index.php?un=<?php echo $un ?>">Homepage</a> </p>

		</div>

		<script type="text/javascript">
			function validate() {

				var name = document.getElementById("name").value
				var email = document.getElementById("email").value
				var comment = document.getElementById("comment").value

				var validEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
				var validString = /^[a-z\d\-_\s]+$/i
				if (!email.match(validEmail)) { alert("Invalid email address") }
				else if (!name.match(validString)) { alert("Invalid name") }
				else if (!comment.match(validString)) { alert("Invalid message") }
				else {
					window.open('mailto: healthyHabitsUTAustin@gmail.com?subject='+ name + '&body=' + comment);
				}
			}
		</script>
	</div>
</body>

</html>
