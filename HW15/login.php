<?php
	session_start();


		# open file and set passed test to false
		$my_file = fopen("passwd.txt", "r");
		$passed = false;
		$repeat = false;

		# parse through file by each line, check for any occupied spaces.
		while (!feof($my_file)) {
			$new_line = fgets($my_file);
			if (trim($new_line) != "") {
				# if a line is occupied, find the username and password. Then match the file contents to the form
				$pieces = explode(":", $new_line);
				if (trim(explode(":", $new_line)[0]) == $_POST["username"] && trim(explode(":", $new_line)[1]) == $_POST["passwd"]) {
					$repeat = true;
					$passed = true;
				}
			}
		}
		# close file
		fclose("my_file");

		if ($passed == true) {
			if (repeat == true) {
				$myfile = fopen("results.txt", "r");
				$grade = 0;
				while (!feof($file)) {
					$liner = fgets($myfile);
					$split = preg_split("/:/", $liner);
					if (trim($_POST["username"]) == trim($split[0])) {
						$grade = trim($split[1]);
						break;
					}
				}
				echo '<script> window.location.href = "HW15.php";
					alert("You have already completed this quiz. Score: ".$grade.".";);
					</script>';
			} else {
				echo '<script> window.location.href = "HW15.php"; alert("Login Information Incorrect.") </script>';
			}
		} else {
	
			# if all correct variables, make sure the variables are correct and send them on their way to question 1

			$_SESSION["username"] = trim($_POST["username"]);
			$_SESSION["begin"] = time();
			$_SESSION["sess"] = "question1";
			$_SESSION["score"] = 0;

			echo '<script> window.location.href = "question1.php"; </script>';
		}
	?>