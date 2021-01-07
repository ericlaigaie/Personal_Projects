var puzz1 = new Array("HW11images/puzzle1/img1-1.jpg", "HW11images/puzzle1/img1-2.jpg", "HW11images/puzzle1/img1-3.jpg", "HW11images/puzzle1/img1-4.jpg", "HW11images/puzzle1/img1-5.jpg", "HW11images/puzzle1/img1-6.jpg", "HW11images/puzzle1/img1-7.jpg", "HW11images/puzzle1/img1-8.jpg", "HW11images/puzzle1/img1-9.jpg", "HW11images/puzzle1/img1-10.jpg", "HW11images/puzzle1/img1-11.jpg", "HW11images/puzzle1/img1-12.jpg")
var puzz2 = new Array("HW11images/puzzle2/img2-1.jpg", "HW11images/puzzle2/img2-2.jpg", "HW11images/puzzle2/img2-3.jpg", "HW11images/puzzle2/img2-4.jpg", "HW11images/puzzle2/img2-5.jpg", "HW11images/puzzle2/img2-6.jpg", "HW11images/puzzle2/img2-7.jpg", "HW11images/puzzle2/img2-8.jpg", "HW11images/puzzle2/img2-9.jpg", "HW11images/puzzle2/img2-10.jpg", "HW11images/puzzle2/img2-11.jpg", "HW11images/puzzle2/img2-12.jpg")
var puzz3 = new Array("HW11images/puzzle3/img3-1.jpg", "HW11images/puzzle3/img3-2.jpg", "HW11images/puzzle3/img3-3.jpg", "HW11images/puzzle3/img3-4.jpg", "HW11images/puzzle3/img3-5.jpg", "HW11images/puzzle3/img3-6.jpg", "HW11images/puzzle3/img3-7.jpg", "HW11images/puzzle3/img3-8.jpg", "HW11images/puzzle3/img3-9.jpg", "HW11images/puzzle3/img3-10.jpg", "HW11images/puzzle3/img3-11.jpg", "HW11images/puzzle3/img3-12.jpg")


function imager() {

	window.Interval = setInterval(timer, 1000)

	puzz = Math.trunc(Math.random() * 3)
	if (puzz == 1) { puzzle = puzz1 }
	else if (puzz == 2) { puzzle = puzz2 }
	else { puzzle = puzz2 }

	let puzzler = [...puzzle]

	for(let i = puzzle.length - 1; i>0 ; i--) {
		var j = Math.floor(Math.random() * i)
		var temp = puzzle[i]
		puzzle[i] = puzzle[j]
		puzzle[j] = temp
	}

	for(j=0;j<12;j++) {
		tmp = j + 1
		
		var id = "img" + String(tmp)
		var pic = document.getElementById(id)
		pic.src = puzzle[j]
	}
}


function timer() { document.getElementById("time").innerHTML++ }

function done() { clearInterval(window.Interval) }

// The event handler function for grabbing the word
function grabbing(event) {

   event.preventDefault()

   // Set the global variable for the element to be moved
   theElement = event.currentTarget;

   // Determine the position of the word to be grabbed, first removing the units from left and top
   posX = parseInt(theElement.style.left);
   posY = parseInt(theElement.style.top);

   // Compute the difference between where it is and where the mouse click occurred
   diffX = event.clientX - posX;
   diffY = event.clientY - posY;

   // Now register the event handlers for moving and dropping the word
   document.addEventListener("mousemove", mover, true);
   document.addEventListener("mouseup", dropper, true);

}

// The event handler function for moving the word
function mover(event) {
   // Compute the new position, add the units, and move the word
   theElement.style.left = (event.clientX - diffX) + "px";
   theElement.style.top = (event.clientY - diffY) + "px";
}

// The event handler function for dropping the word
function dropper(event) {
   // Unregister the event handlers for mouseup and mousemove
   document.removeEventListener("mouseup", dropper, true);
   document.removeEventListener("mousemove", mover, true);
}

