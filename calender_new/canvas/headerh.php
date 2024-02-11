<?php
/*
= Header for the LuxCal calendar popup window = (user guide)

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $set['calendarTitle']; ?></title>
<link rel="shortcut icon" href=" lcal.ico">
<link rel="stylesheet" href=" css/css.php" type="text/css">
<script src=" common/toolbox.js"></script>
<script>window.onload = function() {winFit(500);}</script>
</head>

<body class="scroll">
<div class="topText">
<?php
echo '<h4 class="floatL">'.$pageTitle."</h4>\n";
echo '<div class="floatR"><a href="javascript:self.close()" target="_self">'.$xx['hdr_close_window']."</a></div>\n";
if ($_SESSION['uid'] > 1) { echo '<h5 class="floatC"><span class="footLB">Kibo</span><span class="footLR">Slopes</span> v'.LCV."</h5>\n"; }
?>
</div>
<div class="contentS">
