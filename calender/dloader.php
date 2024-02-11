<?php
/*= file downloader script =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.

this script tells the http server and client browser that the requested file is coming 
back as an application attachment to be saved as a file rather than to be rendered.
*/

//sanity check
if (!isset($_GET['fName'])) { exit('not permitted - no file name ('.substr(basename(__FILE__),0,-4).')'); } //no file name
if (!preg_match('%^[^+,()|&@<>\s]{1,40}\.[\w]{3}$%', $_GET['fName'])) { exit('not permitted - invalid file name ('.substr(basename(__FILE__),0,-4).')'); } //invalid file name

$fName = $_GET['fName'];
$rName = $_GET['rName'];
$dName = './files/';
if (file_exists($dName.$fName)) { //file valid
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$rName");
	readfile($dName.$fName); //send download
} else {
	echo "File not present";
}
?>
