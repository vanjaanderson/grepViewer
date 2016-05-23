function getGrep($id) {
	// Check for response
	if (window.XMLHttpRequest) {
		// If Gecko browser (all browsers except IE < 7)
		xhr = new XMLHttpRequest();
	} else {
		// Else if IE <7
		xhr = new ActiveXObject('Microsoft.XMLHTTP');
	}
	// Check the state of change (if it's ready)
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			// Put content from item.php....
			document.getElementById('viewfind').innerHTML = xhr.responseText;
		}
	}
	// Take the content from functions parameter and make it an http-request
	xhr.open('GET', 'functions.php?file=' + $id, true);

	// Send content
	xhr.send();
}