<?php

date_default_timezone_set  ("Africa/Nairobi");



$db_username = 'root';
$db_password = '';
$db_name = 'reservation';
$db_host = 'localhost';

if(!defined('DB_HOST')) define('DB_HOST',$db_host);
if(!defined('DB_USER')) define('DB_USER',$db_username );
if(!defined('DB_PASSWORD')) define('DB_PASSWORD',$db_password);
if(!defined('DB_NAME')) define('DB_NAME',$db_name);



$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD)or die('Could not create a connection to the database : '.mysqli_error($conn)());

mysqli_select_db($conn,DB_NAME) or die('Could not select the database : '.mysqli_error($conn)());


//create one for mysqli
define('SALT','x454sLrtpM!');

//Function to sanitize values received from the form. Prevents SQL injection
function get_my_db()
{     static $mysqli;
    if (!$mysqli) {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
		mysqli_set_charset($mysqli, "utf8");
    }
    return $mysqli;
}
	function clear($str) {
		$db=get_my_db();
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return $db->real_escape_string($str);
	}
function clean($str) {
		$db=get_my_db();
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return $db->real_escape_string($str);
	}
$currency = 'Kes '; //Currency sumbol or code
date_default_timezone_set('Africa/Nairobi');
$today_constant=date("Y-m-d H:i:s");
////to connect to the db using pdo in the datatables
$sql_details = array(
    'user' => DB_USER,
    'pass' => DB_PASSWORD,
    'db'   => DB_NAME,
    'host' => DB_HOST
);

//backup  exec("mysqldump --user=$dbuser --password='$dbpass' --host=$dbhost $dbname > /home/....../public_html/".$toDay."_DB.sql");



?>