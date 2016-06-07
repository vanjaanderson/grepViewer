<?php
// scan a defined folder for files and make links of them
function return_links_on_folder_content($folder) {
	$content = scandir($folder);
	// increment the content (in case you need it)
	$nr = 0;
	// write content in a nav
	echo '<nav>';
	foreach ($content as $key => $value) {
		// filter off hidden files before processing
		if ($value != "." && $value != ".." && $value != ".DS_Store") {
			// get name of grep (files name minus extension (-4))
			$name = substr($value, 0,-4);
			// replace some swedish characters
			convert_characters_to_sv($name);
		}
		$_GET['nr'] = $nr++;
	}
	echo '</nav>';
}
// convert å, ä and ö in file names links
function convert_characters_to_sv($filename) {
	$res1 = preg_replace("/Ü/", 	"å", $filename);
	$res2 = preg_replace("/Ñ/", 	"ä", $res1);
	$res3 = preg_replace("/î/", 	"ö", $res2);
	$res4 = preg_replace("/Ò/", 	"±", $res3);
	// print link in html
	parse_xml_file($filename .".xml");
	// AJAX solution
	echo '<a href="#" onclick="getGrep(\''.$_GET['nr'].'\',\''.$res4.'\',\''.$_COOKIE["find"].'\',\''.$_COOKIE["replace"].'\')">'.$res4.'</a><br />';
}
// parse xml and print in html
function parse_xml_file($file) {
	$xml = simplexml_load_file($_COOKIE['path']."/".$file);
	// replace backslashes with html entities (result escapes them for passing in url (GET))
	$_COOKIE['replace'] = preg_replace("/\\\\/", "&bsol;&bsol;", $xml->Description->ReplaceExpression[0]['value']);
	$_COOKIE['find'] = preg_replace("/\\\\/", "&bsol;&bsol;", $xml->Description->FindExpression[0]['value']);
}
// delete cookie "path"
function delete_cookie() {
	setcookie("path", "", time() - 3600);
}
?>