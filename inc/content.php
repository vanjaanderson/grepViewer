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
//
if (!isset($_GET['id'])) {
	$_GET['id'] = "Name of the GREP here";
}
// cookie variables
if (!isset($_COOKIE['find']) && !isset($_COOKIE['replace'])) {
	$_COOKIE['find'] = "Find pattern";
	$_COOKIE['replace'] = "Replace with";
}
?>

<div id="view">
	<h2><?=$_GET['id'];?></h2>
	<h3>Find:</h3>
	<p id="find"><?=$_COOKIE['find'];?></p>
	<h3>Replace:</h3>
	<p id="replace"><?=$_COOKIE['replace'];?></p>
</div>