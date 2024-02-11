<?php
###########################################################
/*

*/
###########################################################

/* Define MySQL connection details and database table name */ 
$SETTINGS["hostname"]='localhost';
$SETTINGS["mysql_user"]='root';
$SETTINGS["mysql_pass"]='';
$SETTINGS["mysql_database"]='kibo';
$SETTINGS["data_table"]='data'; 
$SETTINGS["table"]='tbl_visitors'; 

/* Connect to MySQL */

if (!isset($install) or $install != '1') {
	$connection = mysqli_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"]) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
	$db = mysqli_select_db($SETTINGS["mysql_database"], $connection) or die ('request "Unable to select database."');
};
?>