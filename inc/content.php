<?php
// Check if cookie is set
if (isset($_COOKIE['path'])) {
	return_links_on_folder_content($_COOKIE['path']);
}
else if (isset($_POST['path']) && ($_POST['path']!="")) {
	setcookie("path", $_POST['path']);
	// navigation links based on folder "GREPAR"s content
	return_links_on_folder_content($_POST['path']);
} 
else if (!isset($_POST['path']) || ($_POST['path']=="")) {
	// return_links_on_folder_content("/Users/vason/Sites/grepViewer/GREPAR");
	echo '<p id="feedback" class="center">Set a location, PLEASE!</p>';
}
// Check if location delete button is clicked
if (isset($_POST['delete_path'])) {
	delete_cookie();
}
?>

<div id="view">
	<h2>Name of GREP here</h2>
	<h3>Find:</h3>
	<p id="find">Find pattern</p>
	<h3>Replace:</h3>
	<p id="replace">Replace with</p>
</div>