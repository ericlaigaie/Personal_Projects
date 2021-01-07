var viewClick;
var un;

$(document).ready(function() {
    $(document).on('submit', '#viewData', function() {
	if (viewClick == 1){
		var ajaxRequest;
		ajaxRequest = new XMLHttpRequest();

		ajaxRequest.onreadystatechange = function(){
			if(ajaxRequest.readyState == 4){
				var ajaxDisplay = document.getElementById('sqlUpdates');
				ajaxDisplay.innerHTML = ajaxRequest.responseText;
			}
		}
		un = findGetParameter("un");
		$queryString = "?un=" + un;
		ajaxRequest.open("GET", "view.php"+$queryString, true);
		ajaxRequest.send(null);
		return false;
	}
	});
});

function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    var items = location.search.substr(1).split("&");
    for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
    }
    return result;
}