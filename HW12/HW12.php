<?php

	// open the file
	$f = "signup.txt";
	$my_file = fopen($f, "r");

	// establish a table
	$table = array("eight" => "<input type='text' name='eight'>",
			"nine" => "<input type='text' name='nine'>",
			"ten" => "<input type='text' name='ten'>",
			"eleven" => "<input type='text' name='eleven'>",
			"twelve" => "<input type='text' name='twelve'>",
			"one" => "<input type='text' name='one'>",
			"two" => "<input type='text' name='two'>",
			"three" => "<input type='text' name='three'>",
			"four" => "<input type='text' name='four'>",
			"five" => "<input type='text' name='five'>");

	// read each line of the file. Break down into time and name.
	if (filesize($f) != 0){
		while(!feof($my_file)) {

			$line = fgets($my_file);
			
			//split down each line
			$parts = preg_split("/[\s] + /", $line);

			$time = $parts[0];

			$name = "";
		
			//assign name values
			for($i = 1; $i < count($parts); $i++) {
				$name .= $parts[$i] . " ";
			};
			
			//check if there is a name in blank
			if (($time != "") && ($name != "")) {
				$table[$time] = $name;
			};
		};
	};

	// close the file
	fclose($my_file)
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign-In Sheet</title>
	<meta charset="UTF-8">
	<meta name="description" content="Sign-In Sheet">
	<meta name="author" content="Eric Laigaie">
	<link href="HW12.css" rel="stylesheet">
</head>

<body>
	<div id="header"> <h1> Sign-Up Sheet </h1> </div> <br>

<form method="POST" action = "sub.php">

<div id="table">
<table>
	<tr>
	<th> Time </th>
	<th> Name </th>
	</tr>

	<tr>
		<td>8:00 am</td>
		<td id="8"><?php echo $table['eight'] ?></td>
	</tr>
	<tr>
		<td>9:00 am</td>
		<td id="9"><?php echo $table['nine'] ?></td>
	</tr>
	<tr>
		<td>10:00 am</td>
		<td id="10"><?php echo $table['ten'] ?></td>
	</tr>
	<tr>
		<td>11:00 am</td>
		<td id="11"><?php echo $table['eleven'] ?></td>
	</tr>
	<tr>
		<td>12:00 pm</td>
		<td id="12"><?php echo $table['twelve'] ?></td>
	</tr>
	<tr>
		<td>1:00 pm</td>
		<td id="1"><?php echo $table['one'] ?></td>
	</tr>
	<tr>
		<td>2:00 pm</td>
		<td id="2"><?php echo $table['two'] ?></td>
	</tr>
	<tr>
		<td>3:00 pm</td>
		<td id="3"><?php echo $table['three'] ?></td>
	</tr>
	<tr>
		<td>4:00 pm</td>
		<td id="4"><?php echo $table['four'] ?></td>
	</tr>
	<tr>
		<td>5:00 pm</td>
		<td id="5"><?php echo $table['five'] ?></td>
	</tr>

</table>
</div>
	<br>

	<table>
		<tr>
			<td><input type="submit" id="button" value="Submit"></td>
		</tr>
	</table>

</form>

	<p>It's not quite working yet ;(. I'll see if I can fix it tomorrow. -Eric 11/4 </p>

</body>
</html>
