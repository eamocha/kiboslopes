<?php

/*=== REGEX DEFINITIONS & FUNCTIONS ===*/


/*---------- REGEX DEFINITIONS ----------*/

$rxEmail = '~^[^@\\".,\s\[\]]+(\.[^@\\".,\s\[\]]+)*@[a-z\d]+(-*[a-z\d]+)*(\.[a-z\d]+(-*[a-z\d]+)*)*(\.[a-z]{2,6})$~i'; //jd@skyweb.com

$rxEmailX = '~^(.+<)?[^@\\".,\s\[\]]+(\.[^@\\".,\s\[\]]+)*@[a-z\d]+(-*[a-z\d]+)*(\.[a-z\d]+(-*[a-z\d]+)*)*(\.[a-z]{2,6})>?$~i'; //John D. <jd@skyweb.com>

$rxULink = '~<a\s[^<>]*?href="(https?://([\w.\-]{5,}))"[^|<>]*?>([^|<>]*?)</a>~i';


/*---------- FUNCTIONS ----------*/

//Time formatting

function ITtoDT($time,$format = '') { //convert hh:mm(:ss) to display time
	global $set;
	if (!$time) { return ''; }
	if (!$format) { $format = $set['timeFormat']; }
	$ampm = stripos($format,'a') !== false;
	if ($ampm and substr($time,0,2) =='24') { $time = '12'.substr($time,2); }
	$phpFormat = str_replace(array('h','m'),array(($ampm ? 'g' : 'G'),'i'),$format);
	return date($phpFormat,strtotime($time));
}

function DTtoIT($time,$format = '') { //convert Display Time to ISO Time hh:mm
	global $set;
	$time = trim($time);
	if (!$time) { return ''; }
	if (!$format) { $format = $set['timeFormat']; }
	$ampm = stripos($format,'a') !== false;
	$regEx = $ampm ? '(0{0,1}[0-9]|1[0-2])[:.][0-5][0-9]\s*(a|A|p|P)(m|M)' : '(0{0,1}[0-9]|1[0-9]|2[0-4])[:.][0-5][0-9]([:.][0-5][0-9]){0,1}';
	if (!preg_match("%^".$regEx."$%",$time)) { return false; }
	$tStamp = strtotime($time);
	return ($tStamp < 1) ? false : date("H:i", $tStamp);
}

//Date formatting
function IDtoDD($date,$format = '') { //convert ISO date (yyyy mm dd) to display date
	global $set;
	if (!$date) { return ''; }
	if (!$format) { $format = $set['dateFormat']; }
	return str_replace(array('y','m','d'),array(substr($date,0,4),substr($date,5,2),substr($date,8,2)),$format);
}

function DDtoID($date,$format = '') { //validate display date and convert to ISO date (yyyy-mm-dd)
	global $set;
	$date = trim($date);
	if (!$date) { return ''; }
	if (!$format) { $format = $set['dateFormat']; }
	$indexY = strpos($format,'y') / 2;
	$indexM = strpos($format,'m') / 2;
	$indexD = strpos($format,'d') / 2;
	$split = preg_split('%[^\d]%',$date);
	if ($split[$indexY] < 1900 or $split[$indexY] > 2099) { return false; } //year out of range
	if (!checkdate(intval($split[$indexM]),intval($split[$indexD]),intval($split[$indexY]))) { return false; } //invalid date
	return $split[$indexY]."-".str_pad($split[$indexM], 2, "0", STR_PAD_LEFT)."-".str_pad($split[$indexD], 2, "0", STR_PAD_LEFT);
}

function makeD($date,$formatNr,$xs = '') { //make long date
	global $set, $months, $months_m, $wkDays, $wkDays_l;
	$y = substr($date, 0, 4);
	$m = ltrim(substr($date, 5, 2),"0");
	$d = ltrim(substr($date, 8, 2),"0");
	if ($formatNr > 3) {
		$wdNr = date("N", mktime(12,0,0,$m,$d,$y));
		$wkDay = $xs ? $wkDays_l[$wdNr] : $wkDay = $wkDays[$wdNr];
	}
	$month = $xs ? $months_m[$m - 1] : $months[$m - 1];
	switch ($formatNr) {
	case 1: //Dec... 9 / 9 dec...
		return str_replace(array('d','M'),array($d,$month),$set['MdFormat']);
	case 2: //Dec... 9, 2010 / 9 dec... 2010
		return str_replace(array('d','y','M'),array($d,$y,$month),$set['MdyFormat']);
	case 3: //Dec... 2010 / dec... 2010
		return str_replace(array('y','M'),array($y,$month),$set['MyFormat']);
	case 4: //Mon..., Dec... 9 / mon 9 dec
		return str_replace(array('d','M','WD'),array($d,$month,$wkDay),$set['DMdFormat']);
	case 5: //Mon..., Dec... 9, 2010 / mon... 9 dec... 2010
		return str_replace(array('d','y','M','WD'),array($d,$y,$month,$wkDay),$set['DMdyFormat']);
	}
}

//Connect to database and define LCC
function dbConnect() {
	if (list(,$lcc,$dbc) = file('./lcaldbc.dat',FILE_IGNORE_NEW_LINES)) { //get version + db creds
		define("LCC",$lcc);


		//list($dbHost,$dbName,$dbUnam,$dbPwrd,$dbPfix) = unserialize(ciph($dbc,1));

		$dbHost=DB_HOST;
		$dbName=DB_NAME;
		$dbUnam=DB_USER;
		$dbPwrd=DB_PASSWORD;
		$dbPfix="";

		$link = mysqli_connect($dbHost, $dbUnam, $dbPwrd);
		if (!$link) { exit("Could not connect to the MySQL server"); }
		if (!mysqli_select_db($dbName,$link)) { exit("Could not select the database"); }
		//mysql_set_charset('utf8',$link); //support non-Latin char sets
		return $dbPfix; //return db table prefix
	} else {
		return false; //no db credentials
	}
}

//Get settings from database
function getSettings() {
	$set = array(); //init
	$rSet = dbQuery("SELECT name, value FROM [db]settings");
	if (!$rSet) { exit("Error: Could not retrieve calendar settings from the database"); }
	while ($row = mysqli_fetch_assoc($rSet)) {
		$set[$row['name']] = is_numeric($row['value']) ? intval($row['value']) : stripslashes($row['value']);
	}
	return $set; //array with settings
}

//Database querying
function dbQuery($q) {
	global $dbPfix;
	$q = str_replace ("[db]", $dbPfix, $q) ; //add database prefix
	$rSet = mysqli_query($conn,$q);
	if ($rSet === false) {
		file_put_contents("./logs/mysql.log", date(DATE_ATOM)."\nScript name: ".htmlentities($_SERVER['PHP_SELF'])."\nMySQL error: ".mysqli_error($conn)()."\nQuery string: $q\n\n" , FILE_APPEND); exit("SQL error. See 'logs/mysql.log'");
	}
	return $rSet; //result set
}

//Validate parameters
function validPar($key,$value) {
	switch ($key) {
	case 'cP': return preg_match('%^\d{1,2}$%', $value) ? true : false;
	case 'cL': return preg_match('%^[a-zA-Z]{1,12}$%', $value) ? true : false;
	case 'cC': return (is_array($value) and ctype_digit(implode($value))) ? true : false;
	case 'cU': return (is_array($value) and ctype_digit(implode($value))) ? true : false;
	case 'cD': return preg_match('%^\d{4}-\d{2}-\d{2}$%', $value) ? true : false;
	case 'newD': return preg_match('%^\d{2,4}.\d{2}.\d{2,4}$%', $value) ? true : false;
	case 'hdr': return preg_match('%^(0|1)$%', $value) ? true : false;
	case 'luxcal': return preg_match('%^a:2:{.{15,60};}$%', trim($value)) ? true : false;
	case 'bake': return preg_match('%^-?1$%', $value) ? true : false;
	}
	return true;
}

//Cipher a string
function ciph($s,$n=0) {
	$splits = str_split($s);
	foreach ($splits as &$ch) { //lc:F uc:C
		$c = ord($ch);
		if ($c == 58-($n*26)) { $ch = chr(32+($n*26)); }
		$ch = ($c >= 97 and $c <= 122) ? chr(($c-82-($n*4))%26+97) : (($c >= 65 and $c <= 90) ? chr(($c-53+($n*2))%26+65) : $ch);
	}
	return implode($splits);
}

//Check for mobile browser
function isMobile() {
//echo $_SERVER['HTTP_USER_AGENT'];
	$mobBrowser = '0';
	$allHttp = isset($_SERVER['ALL_HTTP']) ? strtolower($_SERVER['ALL_HTTP']) : '';
	$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$mobileAgents = array(
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
		'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
		'wapr','webc','winw','winw','xda','xda-'
	);

	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i',$userAgent)) {
		$mobBrowser++;
	} elseif ((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false)) {
		$mobBrowser++;
	} elseif (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
		$mobBrowser++;
	} elseif (isset($_SERVER['HTTP_PROFILE'])) {
		$mobBrowser++;
	} elseif (in_array((substr($userAgent,0,4)),$mobileAgents)) {
		$mobBrowser++;
	} elseif (strpos($allHttp,'operamini') !== false) {
		$mobBrowser++;
	}
	if (strpos($userAgent,'windows') !== false) { //reset all if on Windows
		$mobBrowser = 0;
	} elseif (strpos($userAgent,'iemobile') !== false) {
		$mobBrowser++;
	} elseif (strpos($userAgent,'windows phone') !== false) { //WP7 is Windows too, but followed by 'phone'
		$mobBrowser++;
	}
	return ($mobBrowser > 0) ? 1 : 0;
}

//Send emails
function sendMail($subject,$message,$emlList,$senderId=0) {
	global $set, $rxEmailX;
	$count = 0;
	$sentTo = '';
	if ($senderId) {//sender is user
		$rSet = dbQuery("SELECT user_name, email FROM [db]users WHERE user_id = $senderId limit 1");
		$row = mysqli_fetch_assoc($rSet);
		$senderName = stripslashes($row['user_name']);
		$senderMail = stripslashes($row['email']);
	} else { //sender is calendar
		$senderName = $set['calendarTitle'];
		$senderMail = $set['calendarEmail'];
	}
	$headers = 'MIME-Version: 1.0'."\n".'Content-type: text/html; charset=utf-8'."\n"."From: \"".$senderName."\" <".$senderMail.">";
	$notList = explode(";",$emlList);
	$addressList = array();
	foreach ($notList as $emlAorL) { //create email address list
		if (strpos($emlAorL,'@')) { //email address
			$addressList[] = $emlAorL;
		} else { //email list
			$emlAorL .= strpos($emlAorL,'.') ? '' : '.txt';
			if (file_exists("./emlists/$emlAorL")) {
				$addressList = array_merge($addressList,file("./emlists/$emlAorL", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
			}
		}
	}
	foreach ($addressList as $emlAddress) { //send emails
		$emlAddress = trim($emlAddress);
		if (preg_match($rxEmailX,$emlAddress)) { //valid email address
			if (mail($emlAddress, $subject, $message, $headers)) {
				$sentTo .= ++$count.'. '.str_replace("@","[at]",$emlAddress)."\n";
			}
		}
	}
	return $sentTo;
}
?>