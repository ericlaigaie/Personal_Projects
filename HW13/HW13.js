// array of 8 pairs
var characters = new Array(["A", "A"], ["M", "M"], ["T", "T"], ["C", "C"], ["V", "V"],
		["W", "W"], ["R", "R"], ["S", "S"])

// initializing values that I'll need for this page
var tries = 0; var clicks = 0; var correct = 0; var id1; var id2; var button = new Array(16)

$(document).ready(function() {

	// checking different cases, assigning different methods to each

	$("button").click(function() {

		// check if button id is not null, adds a click
		if (this.id != id1) { clicks ++ }

		// check if clicks are under the limit
		if (clicks <= 2) { reveal(this.id) }

		// check if only one click and timeout ends
		if (clicks == 1 && !id1) {

			var time = setTimeout(function() {

				if (clicks == 1) {
					hide(id1)
					id1 = null
					clicks = 0
				}
			}, 5000)
			tries ++
			id1 = this.id

		// check for 2 clicks, calls function to check them
		} else if (clicks==2 && !id2) {

			clearTimeout(time)
			id2 = this.id
			var match = check(id1, id2)

			if (!match) {
				// if not matched, hide and reset values
				hide(id1); hide(id2)
				var timer = setTimeout(function() {
					id1 = null; id2 = null; clicks = 0
				}, 1000)

			} else {
				// if matched, disable buttons, check for win, and reset values
				$("#"+id1).addClass("disabled")
				$("#"+id2).addClass("disabled")
				correct = correct + 2

				// win condition
				if (correct == 16) {
					setTimeout(function() {
						alert("You won! Tries: " + tries + ".")
					}, 500)
				}

				// reset the id's and clicks
				id1 = null; id2 = null; clicks = 0
			}
		}
	})
})

function gamer() {
	// creates random number
	// using a number from 0-15 as id, not b01-b33. I find it easier to code
	var x = Math.floor(Math.random()*button.length)

	for (j=0; j<characters.length; j++) {

		for(i=0; i<characters[0].length; i++) {

			while(button[x]) {
				x = Math.floor(Math.random()*button.length)
			}

			// assigns the array of letters
			button[x] = characters[j][i]
		}
	}
}

function check(f, s) { return (button[f] == button[s]) }

function hide(id) { $("#"+id+" span").fadeOut(3000) }

function reveal(id) {
	// reveals the letter in button
	$("#"+id+" span").text(button[id]).hide()
	$("#"+id+" span").fadeIn()
}