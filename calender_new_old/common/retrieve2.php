<?php
/*
= function to retrieves event records from db =
Queries database starting from a specified date and dumps changed events in an arrays
Input params:
- start date (in 2010-04-28 format)
- allEvents; 0: apply normal filters, 1: no filters

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

//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

function sortEvts($a, $b) { return strcmp(strval($a['sts']+1).$a['sda'].str_pad($a['sti'],5).$a['seq'], strval($b['sts']+1).$b['sda'].str_pad($b['sti'],5).$b['seq']); }

function grabChanges($sDate,$allEvents) { //query db for changes since $sDate
	global $evtList, $admin;
	
	//set filter
	$filter = '';
	if (!$allEvents) {
		if (count($_SESSION['cU']) > 0 and $_SESSION['cU'][0] != 0) {
			$filter .= " AND e.user_id IN (".implode(",",$_SESSION['cU']).")";
		}
		if (count($_SESSION['cC']) > 0 and $_SESSION['cC'][0] != 0) {
			$filter .= " AND e.category_id IN (".implode(",",$_SESSION['cC']).")";
		}
		if ($_SESSION['uid'] == 1) { $filter .= " AND c.public = 1"; }
	}
	
	//retrieve events
	$q =
	"SELECT
		e.s_date AS sda,
		e.e_date AS eda,
		DATE_FORMAT(e.s_time,'%H:%i') AS sti,
		DATE_FORMAT(e.e_time,'%H:%i') AS eti,
		e.r_type AS r_t,
		e.r_interval AS r_i,
		e.r_period AS r_p,
		e.r_month AS r_m,
		e.r_until AS r_u,
		e.notify AS rem,
		e.a_date AS ada,
		e.m_date AS mda,
		e.event_id AS eid,
		e.status AS sts,
		e.title AS tit,
		e.venue AS ven,
		e.user_id AS uid,
		e.editor AS edr,
		e.description AS des,
		e.private AS pri,
		c.name AS cnm,
		c.sequence AS seq,
		c.color AS cco,
		c.background AS cbg,
		u.user_name AS una,
		u.color AS uco
	FROM [db]events e
	INNER JOIN [db]categories c ON c.category_id = e.category_id
	INNER JOIN [db]users u ON u.user_id = e.user_id
	WHERE ((e.a_date != '9999-00-00' AND e.a_date >= '$sDate') or (e.m_date != '9999-00-00' AND e.m_date >= '$sDate'))".$filter;
	$rSet = dbQuery($q);

	//process events
	while ($row = mysqli_fetch_assoc($rSet)) {
		if ($allEvents or !$row['pri'] or ($row['uid'] == $_SESSION['uid']) or $admin) { //private: only for current user + admin
			$event['sda'] = $row['sda'];
			$event['eda'] = ($row['eda'][0] != '9') ? $row['eda'] : "";
			if (($row['sti'] == "00:00") and ($row['eti'] == "23:59")) {
				$event['sti'] = $event['eti'] = ""; //all day: start/end time = ""
			} else {
				$event['sti'] = $row['sti'];
				$event['eti'] = ($row['eti'][0] != '9') ? $row['eti'] : ""; //no end time = ""
			}
			$event['r_t'] = $row['r_t'];
			$event['r_i'] = $row['r_i'];
			$event['r_p'] = $row['r_p'];
			$event['r_m'] = $row['r_m'];
			$event['r_u'] = ($row['r_u'][0] != '9') ? $row['r_u'] : "";
			$event['rem'] = $row['rem'];
			$event['ada'] = $row['ada'];
			$event['mda'] = ($row['mda'][0] != '9') ? $row['mda'] : "";
			$event['eid'] = $row['eid'];
			$event['sts'] = $row['sts'];
			$event['tit'] = stripslashes($row['tit']);
			$event['ven'] = stripslashes($row['ven']);
			$event['uid'] = $row['uid'];
			$event['edr'] = stripslashes($row['edr']);
			$event['des'] = stripslashes($row['des']);
			$event['cnm'] = stripslashes($row['cnm']);
			$event['seq'] = str_pad($row['seq'],2,"0",STR_PAD_LEFT);
			$event['uco'] = $row['uco'];
			$event['cco'] = $row['cco'];
			$event['cbg'] = $row['cbg'];
			$event['una'] = stripslashes($row['una']);
			$modDate = max($event['ada'],$event['mda']);
			$evtList[$modDate][] = $event;
		}
	}
	ksort($evtList);
	foreach ($evtList as &$events) { //sort event list per change date
		usort($events, 'sortEvts');
	}
}
?>