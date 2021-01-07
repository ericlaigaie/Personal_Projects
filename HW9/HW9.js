var imgs = new Array("agra_fort.jpg", "ajanta_ellora.jpeg", "akshardham_temple.jpg", "gateway_of_india.jpg", "hawa_mahal.jpeg", "mehrangarh_fort.jpg", "mysore_palace.jpeg", "qutub_minar.jpg", "sun_temple.jpg", "taj_mahal.jpeg", "victoria_memorial.jpg")

var show = setInterval("slides()", 3000) ; var i = 0

function slides()
	{ document.getElementById("img").setAttribute("src", imgs[i])
	i = (i+1) % imgs.length }

function start() { show = window.setInterval("slides()", 3000) }
function pause() { window.clearInterval(show) }