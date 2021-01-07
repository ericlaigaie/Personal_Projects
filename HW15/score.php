<?php session_start();

# if time is run out
if (time() - $_SESSION['begin'] > 900) {
	# run grader to check final grade
	grader();
	echo "Time limit reached. Score: ".$_SESSION['score'].".";
	session_unset();
	# destroy session
	session_destroy();
}

# check question 1. The rest of these are fairly identical
elseif ($_SESSION['sess'] == "question1") {
	# if the quizzee got the question right, add ten points
	if ($_POST['question1'] == "false") {
		$_SESSION['score'] = $_SESSION['score'] + 10;
	}
	# run grader to update score
	grader();
	# reassign session to the next question and navigate to that page
	$_SESSION['sess'] = "question2";
	echo '<script> window.location.href = "question2.php"; </script>';
}

elseif ($_SESSION['sess'] == "question2") {
	if ($_POST['question2'] == "true") {
		$_SESSION['score'] = $_SESSION['score'] + 10;
	}
	grader();
	$_SESSION['sess'] = "question3";
	echo '<script> window.location.href = "question3.php";</script>';
}

elseif ($_SESSION['sess'] == "question3") {
	if ($_POST['question3'] == "b") {
		$_SESSION['score'] = $_SESSION['score'] + 10;
	}
	grader();
	$_SESSION['sess'] = "question4";
	echo '<script> window.location.href = "question4.php";</script>';
}

elseif ($_SESSION['sess'] == "question4") {
	if ($_POST['question4'] == "c") {
		$_SESSION['score'] = $_SESSION['score'] + 10;
	}
	grader();
	$_SESSION['sess'] = "question5";
	echo '<script> window.location.href = "question5.php";</script>';
}

elseif ($_SESSION['sess'] == "question5") {
	if (trim(strtolower($_POST['question5'])) == "HTTP") {
		$_SESSION['score'] = $_SESSION['score'] + 10;
	}
	grader();
	$_SESSION['sess'] = "question6";
	echo '<script> window.location.href = "question6.php";</script>';
}

elseif ($_SESSION['sess'] == "question6") {
	if (trim(strtolower($_POST['question6'])) == "favicon") {
		$_SESSION['score'] = $_SESSION['score'] + 10;
	}
	grader();
	unset($_SESSION['sess']);
	echo 'Your final score is '.$_SESSION["score"].' / 60.';
}

function grader() {

	# create new array to organize scores
	$new = array();

	# open up file to read
	$myfile = fopen("results.txt", "r");


	while (!feof($myfile)) {
		$liner = fgets($myfile);
		$split = preg_split("/:/", $liner);
		if ($_SESSION['username'] != $split[0]) {
			array_push($new, $liner);
		}
	}

	fclose($myfile);

	# push to array the format for grading in the .txt file
	array_push($new, $_SESSION['username'].":".$_SESSION['score']."\n");
	$myfile = fopen('results.txt', "w");

	# for each line, put the scores in da file
	foreach ($new as $line) {
		if ($line != "\n") {
			fputs($myfile, $line);
		}
	}

	fclose($myfile);
}

?>
