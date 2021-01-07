function reg() {
	var login = document.getElementById("login").value
	var password = document.getElementById("password").value
	var repeat = document.getElementById("repeat").value

	var loglength = loglength(login)
	if (loglength == false) { return false }

	var logchars = logchars(login)
	if (logchars == false) { return false }

	var logdigit = logdigit(login)
	if (logdigit == false) { return false }

	var passmatch = passmatch(password, repeat)
	if (passmatch == false) { return false }

	var passlength = passlength(password)
	if (passlength == false) { return false }

	var passChars = passChars(password)
	if (passChars == false) { return false }

	var passValid = passValid(login)
	if (passValid == false) { return false }

	return true


// login between 6 and 10, inclusive
function loglength(login) {
	if ((login.length < 6) || (login.length > 10)) { return false }
}
	

// login only contains letters and digits
function logchars(login) {
	var let_dig = login.match("^[A-Za-z0-9]+$")
	if (let_dig == false) { return false }
}
			

// login can't begin with a digit
function logdigit(login) {
	if(!isNaN(parseInt(login[0]))) { return false }
}


// password and repeat must match
function passmatch(password, repeat) {
	if (password != repeat) { return false }
}


// password must be between 6 and 10, inclusive
function passlength(password) {
	if ((password.length < 6) || (password.length > 10)) { return false }
}


// password only contains letters and digits
function passChars(password) {
	var let_dig = password.match("^[A-Za-z0-9]+$")
	if (let_dig == false) { return false }
}


// password must have at least: one lower case letter, one upper case letter, one digit
function passValid(password) {
	password = password.toString()
	var let_dig = /^[0-9a-zA-Z]+$/
	if(password.match(let_dig) == null) { return false }
}


// username and password clears all validators
	return true

}

function register() {
	var valid = reg()
	if (valid == true) { alert("User Validated") }
	else { alert("Invalid Username or Password") }
}

function clean() {
	document.getElementById("login").innerHTML = ""
	document.getElementById("password").innerHTML = ""
	document.getElementById("repeat").innerHTML = ""
}
