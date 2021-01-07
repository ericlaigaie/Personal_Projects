function validate() {

	var name = document.getElementById("name").value
	var email = document.getElementById("email").value
	var comment = document.getElementById("comment").value

	var validEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
	if email.match(validEmail) {}
	else { alert("Invalid email address") }

	var validString = /^[a-z0-9]+$/i
	if name.match(validString) {}
	else { alert("Invalid name") }
	if comment.match(validString) {}
	else { alert("Invalid message") }
}