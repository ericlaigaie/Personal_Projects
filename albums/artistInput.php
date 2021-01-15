<!DOCTYPE html>

<head>
	<title>Music Database</title>
	<meta charset="UTF-8">

	<meta name="description" content="Music Database">
	<meta name="author" content="Eric Laigaie">

	<link href="input.css" rel="stylesheet">
	<script src="input.js" defer></script>
</head>

<body>

<div class="form">
	<form method="get" id="songInputForm">
		<p>Artist:<input type="text" name="artist" /></p>
		<br>
		<input type="submit" id="submit" value="Submit"/>
	</form>
</div>

<div id="moreInputs">
	<p> Want to input songs/albums of this artist? </p>
	<p> <a href="songInput.php">Input a song</a> </p>
	<p> <a href="albumInput.php">Input albums</a> </p>
</div>

<div id="dataView">
	<a href="myData.php">View my database</a>
</div>

</body>
</html>