<?php
// Check if cookie is set
if (isset($_COOKIE['path'])) {
	return_links_on_folder_content($_COOKIE['path']);
}
else if (isset($_POST['path']) && ($_POST['path']!="")) {
	setcookie("path", $_POST['path']);
	// redirect (refresh page)
	header('Location: '.$_SERVER['REQUEST_URI']);
	// navigation links based on folder "GREPAR"s content
	return_links_on_folder_content($_POST['path']);
}
else if (!isset($_POST['path']) || ($_POST['path']=="")) {
	// return_links_on_folder_content("/Users/vason/Sites/grepViewer/GREPAR");
	echo '<p id="feedback" class="center">For the viewer to work, please set a location!</p>';
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
<p class="footnote">&ast; In MacOsX, the path to the GREP location is: <span class="highlight">/Applications/Adobe InDesign</span> VersionNumber<span class="highlight">/Presets/Find-Change Queries/GREP</span>. Otherwise, you can use the preinstalled folder <span class="highlight">GREPS</span>, just write &rdquo;GREPS&rdquo; in the input box. The location remains until you delete it (in a delicous cookie).</p>
<p class="footnote bottom">Source for the GREP examples: <a href="http://indesignsecrets.com/favorite-grep-expressions-you-can-use.php">InDesignSecrets</a>.</p>