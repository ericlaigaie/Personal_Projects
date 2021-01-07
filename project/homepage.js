var images = new Array(["images/better_sleep.jpeg", ""], ["images/cheap_exercise.jpg", ""], ["images/diet_image.jpg", ""])

var slideshow = setInterval("slides()", 3000)
var index = 0

function slides() {
	document.getElementById("img").setAttribute("src", images[index][0])
	index = (index+1) % images.length }

