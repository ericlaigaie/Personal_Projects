<?php session_start();	

	# pretty much copied from my last assignment
	# check if the form is filled out
	if ($_POST["username"]!=null and $_POST["passwd"]!=null) {

		# open passwd file
		$my_file = fopen("passwd.txt", "r");

		# assume register true
		$passed = true;

		# parse through file line by line. If line occupied, explode and find username. Then check if the id matches the form submission
		while (!feof($my_file)) {
			$new_line = fgets($my_file);
			if (trim($new_line) != "") {
				$pieces = explode(":", $new_line);
				if (trim(explode(":", $new_line)[0]) == $_POST["username"]) {

					# if the usernames are not unique, fail the test
					$passed = false;
				}
			}
		}
		# close file
		fclose($my_file);


		# if unique username
		if ($passed == true) {
			# open file and write to it. Then set cookie and start it. Direct the user to the quiz
			$my_file = fopen("passwd.txt", "a");
			fwrite($my_file, $_POST["username"] . ":" . $_POST["passwd"] . "\n");
			fclose($my_file);

			# initliaze some variables and send them to question 1
			$_SESSION["sess"] = "question1";
			$_SESSION["username"] = trim($_POST["username"]);
			$_SESSION["begin"] = time();
			$_SESSION["score"] = 0;

			echo '<script> window.location.href = "question1.php"; </script>';

		# alert the user that the id needs to be unique
		} else {
			echo "<script type='text/JavaScript'>
			alert('ID taken. Please choose another one.');
			</script>" ;
			echo '<script> window.location.href = "register.php"; </script>';
		}
	}
?>
