var X = 0

function turned(current) {

	// get value of current button
	var changer = document.getElementById(current).value

	// verify that the current button is currently empty
	if (changer == " ") {
		if (X % 2 == 0) { document.getElementById(current).value = "X" }
		else { document.getElementById(current).value = "O" }
	}
	else { return }
	
	// read all table values again

	var one_one = document.getElementById("one_one").getAttribute("value")
	var one_two = document.getElementById("one_two").getAttribute("value")
	var one_three = document.getElementById("one_three").getAttribute("value")
	var two_one = document.getElementById("two_one").getAttribute("value")
	var two_two = document.getElementById("two_two").getAttribute("value")
	var two_three = document.getElementById("two_three").getAttribute("value")
	var three_one = document.getElementById("three_one").getAttribute("value")
	var three_two = document.getElementById("three_two").getAttribute("value")
	var three_three = document.getElementById("three_three").getAttribute("value")

	// list all winner cases
	var winner = ""

	// all rows
	if (one_one == one_two && one_two == one_three && one_one != " ") { winner = one_one }
	else if (two_one == two_two && two_two == two_three && two_one != " ") { winner = two_one }
	else if (three_one == three_two && three_two == three_three && three_one != " ") { winner = three_one }

	// all columns

	if (one_one == two_one && two_one == three_one && one_one != " ") { winner = one_one }
	if (one_two == two_two && two_two == three_two && one_two != " ") { winner = one_two }
	if (one_three == two_three && two_three == three_three && one_three != " ") { winner = one_three }

	// diagonals
	if (one_one == two_two && two_two == three_three && one_one != " ") { winner = one_one }
	if (one_three == two_two && two_two == one_three && one_three != " ") { winner = one_three }

	// make window alert if winner exists
	if (winner != "") {
		var val = winner
		var rest = " has won!"
		var complete = val.concat(rest)
		alert(complete)
	}

	// change the scoreboard
	if (winner == "X") { document.getElementById("x_wins").innerHTML++ }
	if (winner == "O") { document.getElementById("o_wins").innerHTML++ }

	X = X + 1
}

function clean() {
	X = 0
	document.getElementById("one_one").value = " "
	document.getElementById("one_two").value = " "
	document.getElementById("one_three").value = " "
	document.getElementById("two_one").value = " "
	document.getElementById("two_two").value = " "
	document.getElementById("two_three").value = " "
	document.getElementById("three_one").value = " "
	document.getElementById("three_two").value = " "
	document.getElementById("three_three").value = " "
}