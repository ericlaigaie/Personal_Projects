function grader() {

	grade = 0

	// get answer

	t_one = document.getElementById("true_one").checked
	f_one = document.getElementById("false_one").checked
	
	// verify that answer was given

	if(!t_one && !f_one) {
		alert("Please answer all 6 questions.")
		grade = 0
		return }

	// check answer and change grade

	else if (f_one) { grade = grade + 1 }


	// repeat for next 5 questions

	t_two = document.getElementById("true_two").checked
	f_two = document.getElementById("false_two").checked
	if(!t_two && !f_two) {
		alert("Please answer all 6 questions.")
		grade = 0
		return }

	else if (t_two) { grade = grade + 1 }


	a = document.getElementById("a_one")
	b = document.getElementById("b_one")
	c = document.getElementById("c_one")
	d = document.getElementById("d_one")
	if(!a.checked && !b.checked && !c.checked && !d.checked) {
		alert("Please answer all 6 questions.")
		grade = 0
		return }

	else if (b.checked && !a.checked && !c.checked && !d.checked) { grade = grade + 1 }


	a = document.getElementById("a_two")
	b = document.getElementById("b_two")
	c = document.getElementById("c_two")
	d = document.getElementById("d_two")
	if(!a.checked && !b.checked && !c.checked && !d.checked) {
		alert("Please answer all 6 questions.")
		grade = 0
		return }

	else if (c.checked && !a.checked && !b.checked && !d.checked) { grade = grade + 1 }

	
	blank_one = document.getElementById("blank_one").value
	if(blank_one == "") {
		alert("Please answer all 6 questions.")
		grade = 0
		return }

	else if (blank_one.toUpperCase() == "HTTP") { grade = grade + 1 }


	blank_two = document.getElementById("blank_two").value
	if(blank_one == "") {
		alert("Please answer all 6 questions.")
		grade = 0
		return }

	else if (blank_two.toLowerCase() == "favicon") { grade = grade + 1 }


	alert("Your grade is " + String(grade) + " / 6.")
	grade = 0
}