<?php
/*
= check events and delete event if expired more than $eventExp =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

-------------------------------------------------------------------
 This script depends on and is executed via the file lcalcron.php.
 See lcalcron.php header for details.
-------------------------------------------------------------------

This file is part of the LuxCal Web Calendar.

--------- THIS SCRIPT USES THE FOLLOWING CALENDAR SETTINGS --------
eventExp: Number of days after due date when event can be deleted
-------------------------------------------------------------------
*/

//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

//initialize
$todayD = date("Y-m-d");
$expireD = date("Y-m-d",time() - ($set['eventExp'] * 86400)); //expire date

//delete events (set status to -1) which expired >= $set['eventExp'] days ago
$result = dbQuery("UPDATE [db]events e
	INNER JOIN [db]categories c ON c.category_id = e.category_id
	SET e.status = -1, e.m_date = '".$todayD."'
	WHERE ((c.rpeat = 0 AND e.r_type = 0 AND (IF(e.e_date != '9999-00-00', e.e_date, e.s_date) <= '$expireD')) OR e.r_until <= '$expireD')
");
$nrDeleted = mysql_affected_rows();

$sumName = "-- ".$ax['evc_sum_title']." --";
$sumText = $ax['evc_nr_deleted'].": ".$nrDeleted.".\n";
?>
