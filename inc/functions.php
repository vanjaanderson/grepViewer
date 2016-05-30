<?php

// scan a defined folder for files and make links of them
function return_links_on_folder_content($folder) {
	$content = scandir($folder);
	// increment the content
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
		$_GET['nr'] = $nr++;
	}
	echo '</nav>';
}
// convert å, ä and ö in file names links
function convert_characters_to_sv($filename) {
	$res1 = preg_replace("/Ü/", "å", $filename);
	$res2 = preg_replace("/Ñ/", "ä", $res1);
	$res3 = preg_replace("/î/", "ö", $res2);
	$res4 = preg_replace("/Ò/", "±", $res3);
	$res5 = preg_replace("/\+/", " ", $res4); // cleaned name
	// print link in html
	if (isset($_COOKIE['path'])) {
		echo '<a id="'.$_GET['nr'].'" href="'.$_SERVER['PHP_SELF'].'?id='.$res5.'&amp;file='.$filename.'">'.$res5.'</a><br />';
	}
	if (isset($_GET['file'])) {
		parse_xml_file($_GET['file'] .".xml");
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

?>