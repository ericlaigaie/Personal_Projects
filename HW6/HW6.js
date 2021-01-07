function calculate() {
	var p = document.getElementById("p").value
	var i = document.getElementById("i").value
	var n = document.getElementById("n").value


	if (isNaN(p) || isNaN(i)  || isNaN(n) || p < 0 ||  i < 0 ||  n < 0) {
		alert("Invalid Input")
	
	} else {
		var r = i / 12
		Math.round(n)


		var numerator = (p * r) 
		var denominator = 1 - (1 / Math.pow((1+r), n))
		var Monthly = numerator / denominator
		var Sum = Monthly * n
		var Total_Interest = Sum - p
		
		var month_pays = document.getElementById("payment")
		month_pays.innerHTML = "$" + Monthly.toFixed(2)

		var summed_up = document.getElementById("sum")
		summed_up.innerHTML = "$" + Sum.toFixed(2)

		var total_paid = document.getElementById("total")
		total_paid.innerHTML = "$" + Total_Interest.toFixed(2)
		
	}

}

function clean() {
	document.getElementById("payment").innerHTML = ""
	document.getElementById("sum").innerHTML = ""
	document.getElementById("total").innerHTML = ""
	document.getElementById("payment").innerHTML = ""
	document.getElementById("sum").innerHTML = ""
	document.getElementById("total").innerHTML = ""
}