<?php
/*
= check calendar inactive user accounts which can be deleted =

� Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

-------------------------------------------------------------------
 This script depends on and is executed via the file lcalcron.php.
 See lcalcron.php header for details.
-------------------------------------------------------------------

This file is part of the LuxCal Web Calendar.

---------- THIS SCRIPT USES THE FOLLOWING CALENDAR SETTINGS ----------
maxNoLogin: Maximum number of 'no login' days before deleting account
----------------------------------------------------------------------
*/

//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

//calculate minimum last login date required to keep account
$minLoginDate = date("Y-m-d", time() - $set['maxNoLogin'] * 86400);

//remove user accounts for users not logged in since $minLoginDate
//but never delete the public access and admin users!
$result = dbQuery("DELETE FROM [db]users WHERE user_id > 2 AND login_1 < '$minLoginDate'");
$nrRemoved = mysqli_affected_rows();

$sumName = "-- ".$ax['usc_sum_title']." --";
$sumText = ($nrRemoved > 0) ? $ax['usc_nr_accounts_deleted'].": ".$nrRemoved."\n" : $ax['usc_no_accounts_deleted'].".\n";
?>
