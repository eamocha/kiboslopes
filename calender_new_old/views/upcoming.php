<?php
/*
= upcoming events view =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

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

function showGrid(&$events,$date) {
	global $privs, $set, $xx;
	foreach ($events as $evt) {
		$mayEdit = ($privs > 2 or ($privs == 2 and $evt['uid'] == $_SESSION['uid'])) ? true : false;
		echo '<table><tr><td class="lMarginUp">';
		echo ($evt['sti'] == '' and $evt['eti'] == '') ? $xx['vws_all_day'] : ITtoDT($evt['sti']);
		echo ($evt['eti']) ? ' - '.ITtoDT($evt['eti']).'</td>' : '</td>';
		if ($set['eventColor']) {
			$eColor = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
		} else {
			$eColor = $evt['uco'] ? 'background-color:'.$evt['uco'].';' : '';
		}
		$eStyle = $eColor ? ' style="'.$eColor.'"' : '';
		$check = '';
		if ($evt['ch1']) { $check .= strpos($evt['chk'], $date.'a') ? $evt['mk1'].' ' : '&#9744; '; }
		if ($evt['ch2']) { $check .= strpos($evt['chk'], $date.'b') ? $evt['mk2'].' ' : ' &#9744; '; }
		if ($check) {
			$attrib = $mayEdit ? "class=\"chkBoxes point\" onclick=\"checkE(".$evt['eid'].",'".$date."');\" title=\"".$xx['vws_check_marks']."\"" : 'class="chkBoxes"';
			$check = '<span '.$attrib.">".trim($check).'</span>';
		}
		if ($set['details4All'] or $mayEdit) {
			echo '<td><h6>'.$check."<span class=\"point\"".$eStyle." onclick=\"editE(".$evt['eid'].",'".$date."');\">".$evt['tit']."</span></h6>\n";
			if ($evt['ven']) { echo $xx['vws_venue'].": ".$evt['ven']."<br>\n"; }
			if ($evt['des']) { echo $evt['des']."<br>\n"; }
		} else {
			echo '<td><h6>'.$check."<span".$eStyle.">".$evt['tit']."</span></h6>\n";
		}
		if ($set['showCatName']) { echo $xx['evt_category'].": ".$evt['cnm']."<br>\n"; }
		if ($set['showAdEd']) {
			echo $xx['vws_added'].': '.IDtoDD($evt['ada']).' ('.$evt['una'].")<br>\n";;
			if ($evt['mda'] and $evt['edr']) { echo $xx['vws_edited'].': '.IDtoDD($evt['mda']).' ('.$evt['edr'].")<br>\n";; }
		}
		echo "</td></tr></table>\n";
	}
}

//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

//initialize
$cD = $_SESSION['cD'];
$eTime = mktime(12,0,0,substr($cD,5,2),substr($cD,8,2),substr($cD,0,4)) + (($set['lookaheadDays']-1) * 86400); //Unix time of end date
$eDate = date("Y-m-d", $eTime);

retrieve($cD,$eDate,'uc');

//display header
echo "<div class=\"headUp noPrint\">\n";
echo '<h5>',makeD($cD,2)," - ",makeD($eDate,2),'</h5>'."\n<br>\n";
echo "</div>\n";

//display upcoming events
echo '<div id="scrollBox"'.($mobile ? '' : ' class="scrollBoxUp"').">\n";
echo '<div class="eventBg">'."\n";
if ($evtList) {
	foreach($evtList as $date => &$events) {
		echo "<br><h6>".makeD($date,5)."</h6>\n";
		showGrid($events,$date);
	}
} else {
	echo $xx['none']."\n";
}
echo "</div>\n</div>\n";
?>
