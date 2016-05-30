<!-- 
**********************************************************************************
	Description: View InDesign GREP's in your web browser.
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	Author: Vanja Maria Anderson
	Date: 2016-05-14
	Version: 1.0
	Website: http://vanjaswebb.se
	Development: https://github.com/vanjaanderson/
********************************************************************************** 
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description"    content="GREP Viewer" />
        <meta name="keywords"       content="Vanjas Webb, web development, web design" />
        <meta name="author"         content="Vanja Anderson" />
        <meta name="viewport"       content="width=device-width, initial-scale=1.0" />
        <meta name="apple-mobile-web-app-title" content="GREP Viewer" />
        <title>GREP Viewer</title>
        <link rel="icon" type="image/png" href="favicon.png" />
        <link rel="apple-touch-icon" type="image/png" href="apple-touch-icon.png" />
        <!-- CSS -->
        <link href="style/style.css" rel="stylesheet" />
    </head>
    <body>
        <section id="wrapper">
            <header>
                <h1>Viewer for InDesign GREPS</h1>
                <?php if (!isset($_COOKIE['path'])) {
                    echo '<form action="'.$_SERVER['PHP_SELF'].'" method="GET">
                        <label for="path">Location of your GREP directory: </label>
                        <input type="text" name="path" id="path" placeholder="Write your directory\'s name here" />
                        <input type="submit" value="Set location" />
                    </form>
                    <form action="'.$_SERVER['PHP_SELF'].' "method="GET">
                        <input type="hidden" name="delete_path">
                        <input type="submit" value="Delete location">
                    </form>';
                } ?>
            </header>
            <article id="main">