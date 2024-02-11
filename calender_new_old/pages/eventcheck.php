<?php
/*
= LuxCal check event page =

� Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.

The LuxCal Web Calendar is free software: you can redistribute it and/or modify it under 
the terms of the GNU General Public License as published by the Free Software Foundation, 
either version 3 of the License, or (at your option) any later version.

The LuxCal Web Calendar is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with the LuxCal 
Web Calendar. If not, see <http://www.gnu.org/licenses/>.
*/

//get input params
$eid = $_REQUEST['eid'];
$evD = $_REQUEST['evD'];

//sanity check
if (!defined('LCC') or
		!preg_match('%^\d{1,8}$%', $eid) or
		!preg_match('%^\d{2,4}-\d{2}-\d{2,4}$%', $evD)
	) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); }
		

//init event data
if (!isset($_POST['checkExe'])) { //get event details
	$rSet = dbQuery("
		SELECT e.*,c.color,c.background,c.check1,c.label1,c.check2,c.label2,u.user_name
		FROM [db]events e
		INNER JOIN [db]categories c ON c.category_id = e.category_id
		INNER JOIN [db]users u ON u.user_id = e.user_id
		WHERE e.event_id = $eid");
	$row = mysqli_fetch_assoc($rSet);
	$chk = $row['checked'];
	$r_t = $row['r_type'];
	$ch1 = $row['check1'];
	$la1 = stripslashes($row['label1']);
	$ch2 = $row['check2'];
	$la2 = stripslashes($row['label2']);
	$tit = htmlspecialchars(stripslashes($row['title']));
	$uid = $row['user_id'];
	$mayEdit = ($privs > 2 or ($privs == 2 and $uid == $_SESSION['uid'])) ? true : false; //edit rights
	$chk1 = strpos($chk, $evD.'a') ? 1 : 0; //check1?
	$chk2 = strpos($chk, $evD.'b') ? 1 : 0; //check2?
	$col = $row['color'];
	$bco = $row['background'];
} else { //check event
	$chk = isset($_POST['chk']) ? $_POST['chk'] : '';
	$r_t = isset($_POST['r_t']) ? $_POST['r_t'] : 0;
	$chk1 = isset($_POST['chk1']) ? ($_POST['chk1'] == 'yes' ? 1 : 0) : 0; //check1?
	$chk2 = isset($_POST['chk2']) ? ($_POST['chk2'] == 'yes' ? 1 : 0) : 0; //check2?
}

//update event

//update database
if (isset($_POST['checkExe'])) {
	$mda = date("Y-m-d");
	//set checked
	if ($chk1) {
		if (!strpos($chk, $evD.'a')) { $chk .= ";$evD".'a'; } //check1
	} elseif (strpos($chk, $evD.'a')) { $chk = str_replace(";$evD".'a',"",$chk); } //uncheck1
	if ($chk2) {
		if (!strpos($chk, $evD.'b')) { $chk .= ";$evD".'b'; } //check2
	} elseif (strpos($chk, $evD.'b')) { $chk = str_replace(";$evD".'b',"",$chk); } //uncheck2
	$q = "UPDATE [db]events
	SET checked='$chk', editor='$uname', m_date='$mda'
	WHERE event_id=$eid";
	$result = dbQuery($q); //update events table
	//refresh calendar and close event window 
	echo "\n<script>done(1,1);</script>\n";
}

?>
<form id="event" name="event" method="post" action="index.php?xP=11">
<input type="hidden" name="eid" value="<?php echo $eid; ?>"/>
<input type="hidden" name="evD" value="<?php echo $evD; ?>"/>
<input type="hidden" name="chk" value="<?php echo $chk; ?>"/>
<input type="hidden" name="r_t" value="<?php echo $r_t; ?>"/>
<table class="evtForm">
<tr><td class="floatC">
<?php
$catColor = ($col ? "color:".$col.";" : "").($bco ? "background-color:".$bco.";" : "");
echo '<span'.($catColor ? " style=\"".$catColor."\"" : "").'>'.$tit."</span>\n";
echo "</td></tr>\n";
if (($ch1 or $ch2) and $mayEdit and $evD) {
	echo '<tr><td class="floatC"><br>';
	if ($ch1) {
		echo '<input type="checkbox" name="chk1" value="yes"'.($chk1 ? ' checked="checked"' : '').'/> '.$la1."&nbsp;\n";
	}
	if ($ch2) {
		echo '&nbsp;<input type="checkbox" name="chk2" value="yes"'.($chk2 ? ' checked="checked"' : '').'/> '.$la2."\n";
	}
	echo "</td></tr>\n</table>\n";
}
echo "<div class=\"floatC\">\n";
echo '<input type="submit" name="checkExe" value="'.$xx['evt_save']."\"/>&nbsp;&nbsp;&nbsp;\n";
echo '<button type="button" onclick="done(1,0);">'.$xx['evt_close']."</button>\n";
echo "</div>\n";
?>
</form>
