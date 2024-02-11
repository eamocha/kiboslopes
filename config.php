<?php
###########################################################
/*

*/
###########################################################

/* Define MySQL connection details and database table name */ 
$SETTINGS["hostname"]='localhost';
$SETTINGS["mysqli_user"]='root';
$SETTINGS["mysqli_pass"]='';
$SETTINGS["mysqli_database"]='kibo';
$SETTINGS["data_table"]='data'; 
$SETTINGS["table"]='tbl_visitors'; 

/* Connect to MySQL */

if (!isset($install) or $install != '1') {
	$connection = mysqli_connect($SETTINGS["hostname"], $SETTINGS["mysqli_user"], $SETTINGS["mysqli_pass"]) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
	$db = mysqli_select_db($SETTINGS["mysqli_database"], $connection) or die ('request "Unable to select database."');
};
?>