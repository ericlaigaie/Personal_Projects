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
		<p>Album title:<input type="text" name="albumTitle" /></p>
		<p>Artist:<input type="text" name="artist" /></p>
		<p>What songs are on this album? Please separate songs with a ", ".<input type="textbox" name="songs" /></p>
		<br>
		<input type="submit" id="submit" value="Submit"/>
	</form>
</div>

<div id="dataView">
	<a href="myData.php">View my database</a>
</div>

</body>
</html>