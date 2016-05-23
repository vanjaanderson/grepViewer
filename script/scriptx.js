var find = document.getElementById('viewfind');
var link = document.getElementById('grep4');

// create an XMLHttpRequest object 
var hxr;
if (window.XMLHttpRequest) {
	xhr = new XMLHttpRequest();
} else {
	// IE < 7
	xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

// In-built property onreadystatechange 
xhr.onreadystatechange = function() {
  if(xhr.readyState === 4) {
    find.style.color = 'red';
    if(xhr.status === 200) { 
      find.innerHTML = xhr.responseText;
    } else {
      find.innerHTML = 'An error occurred during your request: ' +  xhr.status + ' ' + xhr.statusText;
    } 
  }
}
 
xhr.open('GET', 'GREPAR/Avstava ej Appendix.xml');
 
link.addEventListener('Click', function() {
  // this.style.display = 'none';
  xhr.send();
});