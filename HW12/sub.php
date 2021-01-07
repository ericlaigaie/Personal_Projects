<?php

//open the file
$f = "signup.txt";
$my_file = fopen($f, "a");


//initialize the posts
$eight = $_POST['eight'];
$nine = $_POST['nine'];
$ten = $_POST['ten'];
$eleven = $_POST['eleven'];
$twelve = $_POST['twelve'];
$one = $_POST['one'];
$two = $_POST['two'];
$three = $_POST['three'];
$four = $_POST['four'];
$five = $_POST['five'];


$table = array("eight" => $eight, "nine" => $nine, "ten" => $ten, "eleven" => $eleven,
		"twelve" => $twelve, "one" => $one, "two" => $two, "three" => $three,
		"four" => $four, "five" => $five);

// run through the table elements
foreach ($table as $i => $name) {
	// if no signee, put textbox in table
	if($name == "") {
		$table[$i] = "<input type='text' name=$i>";
	};

	// if signee, put name in table
	if($name != "") {
		$s = $i . " " . $name . "\n";
		fwrite($my_file, $s);
	};
};

// close file
fclose($my_file);

// reference home file
include "HW12.php";

?>