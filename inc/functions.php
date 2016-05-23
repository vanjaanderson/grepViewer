<?php
// scan a defined folder for files and make links of them
function return_links_on_folder_content($folder) {
	$content = scandir($folder);
	// set id number for each item
	$nr = 0;
	// write content in a nav
	echo '<nav>';
	foreach ($content as $key => $value) {
		// filter off hidden files before processing files
		if ($value != "." && $value != ".." && $value != ".DS_Store") {
			// get name of grep (files name minus extension (-4))
			$name = substr($value, 0,-4);
			// 
			convert_characters_to_sv($name);
		}
		$nr++;
	}
	echo '</nav>';
}
// convert å, ä and ö in file names links
function convert_characters_to_sv($filename) {
	$res1 = preg_replace("/Ü/", "å", $filename);
	$res2 = preg_replace("/Ñ/", "ä", $res1);
	$res3 = preg_replace("/î/", "ö", $res2);
	$res4 = preg_replace("/Ò/", "±", $res3); // cleaned name
	// print link in html
	if (isset($_COOKIE['path'])) {
		echo '<a href="'.$_SERVER['PHP_SELF'].'?q='.$res4.'&amp;file='.$filename.'">'.$res3.'</a><br />';
	}
}
// parse xml and print in html
function parse_xml_file($file) {
	$xml = simplexml_load_file($_COOKIE['path']."/".$file);

	$_COOKIE['find'] = $xml->Description->FindExpression[0]['value'];
	$_COOKIE['replace'] = $xml->Description->ReplaceExpression[0]['value'];
}
// delete cookie "path"
function delete_cookie() {
	setcookie("path", "", time() - 3600);
}

parse_xml_file($_GET['file'].".xml");

?>