var imgs = new Array("GalaxyCluster", "InteractingGalaxies", "M51", "M104", "NGC1300", "NGC6217")
var caps = new Array("GalaxyCluster", "InteractingGalaxies", "M51", "M104", "NGC1300", "NGC6217")

function imager() {
	var rand_number = Math.floor(Math.random() * 6)
	var rand_img = imgs[rand_number] + ".jpg"
	var rand_cap = caps[rand_number]
	$("#randImg").attr("src", rand_img)
	$("#caption").text(rand_cap)
}