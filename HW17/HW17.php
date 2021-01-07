<html lang="en">

<head>
	<title> AJAX User Verification </title>
	<meta charset="UTF-8">
	<meta name="description" content="AJAX">
	<meta name="author" content="Eric Laigaie">
	<link href="HW17.css" rel="stylesheet">
</head>

<body>

	<script>
		function ajax() {
			var ajaxRequest;
			ajaxRequest = new XMLHttpRequest();

			ajaxRequest.onreadystatechange=function() {
				if (ajaxRequest.readyState == 4) {
					var ajaxDisplay = document.getElementById("ajax-area");
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
				}
			}

			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;

			ajaxRequest.open("POST", "ajax.php", true);
			ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			ajaxRequest.send("username=" + username + "&password=" + password);
		}
	</script>

	<header><h1> Register Form </h1></header><br>

	<div id="form"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<br>
	<table>
		<tr>
		<td> Username </td> <td> <input type="text" id="username" /> </td>
		</tr>
		<tr><td colspan="2"><br /></td></tr>
		<tr>
		<td> Passsword </td> <td> <input type="text" id="password" /> </td>
		</tr>
		<tr><td colspan="2"><br /></td></tr>
		<tr>
		<td> <input type="button" value="Submit" class="button" onclick="ajax()" /> <td> <input type="reset" value="Reset" class="button" /> </td>
		</tr>
	</table>
	</form>
	</div>
	<br>

	<div id="ajax-area"> <br> <br>
	</div>

</body>
</html>