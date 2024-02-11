<?php
/*
= LuxCal database management page =

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

//initialize
$adminLang = (file_exists('lang/ai-'.strtolower($_SESSION['cL']).'.php')) ? $_SESSION['cL'] : "English";
require 'lang/ai-'.strtolower($adminLang).'.php';

function mdbForm() {
	global $ax, $compact, $repair, $backup;
	
	echo '<form action="index.php" method="post">'."\n";
	echo '<table class="fieldBox">'."\n";
	echo '<tr><td class="legend">&nbsp;'.$ax['mdb_dbm_functions'].'&nbsp;</td></tr>'."\n";
	echo "<tr><td>&nbsp;</td></tr>\n";
	echo '<tr><td><input type="checkbox" name="repair" value="yes"'.(($repair > 0) ? ' checked="checked"/> ' : '/> ').$ax['mdb_repair']."</td></tr>\n";
	echo "<tr><td>&nbsp;</td></tr>\n";
	echo '<tr><td><input type="checkbox" name="compact" value="yes"'.(($compact > 0) ? ' checked="checked"/> ' : '/> ').$ax['mdb_compact']."</td></tr>\n";
	echo "<tr><td>&nbsp;</td></tr>\n";
	echo '<tr><td><input type="checkbox" name="backup" value="yes"'.(($backup > 0) ? ' checked="checked"/> ' : '/> ').$ax['mdb_backup']."</td></tr>\n";
	echo "</table>\n";
	echo '<input type="submit" name="mdb_exe" value="'.$ax['mdb_start'].'"/>'."\n";
	echo "</form>\n";
}

function processFunctions() {
	global $ax, $repair, $compact, $backup;
	
	echo "<table><tr><td>\n";
	if ($repair) { checkDb(); }
	if ($compact) { compactTables(); }
	if ($backup) { backupTables(); }
	echo "</td></tr></table>\n";
	echo '<form action="index.php" method="post">'."\n";
	echo '<input type="hidden" name="repair" id="repair" value="'.$repair.'"/>'."\n";
	echo '<input type="hidden" name="compact" id="compact" value="'.$compact.'"/>'."\n";
	echo '<input type="hidden" name="backup" id="backup" value="'.$backup.'"/>'."\n";
	echo '<input class="noPrint" type="submit" name="back" value="'.$ax['back'].'"/>'."\n";
	echo "</form>\n";
}


/* Check and repair db */
function checkDb() {
	global $ax, $dbPfix;
	
	echo '<table class="fieldBoxFix">'."\n";
	echo '<tr><td class="legend">&nbsp;'.$ax['mdb_repair'].'&nbsp;</td></tr>'."\n";
//	$rSet = dbQuery('SHOW TABLES');
	$rSet = dbQuery("SHOW TABLES LIKE '".addcslashes($dbPfix,'_')."%'");
	if (!$rSet) {
		echo '<tr><td>'.$ax['mdb_noshow_tables']."</td></tr>\n";
	} else {
		while ($table = mysqli_fetch_row($rSet)) {
			echo '<tr><td>'.$ax['mdb_check_table'].' \''.$table[0].'\' - ';
			$result = dbQuery('CHECK TABLE '.$table[0]);
			$tableOk = false;
			while ($row=mysqli_fetch_assoc($result)) {
				if ($row['Msg_type'] == 'status' and (strtolower($row['Msg_text']) == 'ok' or strtolower($row['Msg_text']) == 'table is already up to date')) {
					$tableOk = true;
				}
			}
			if ($tableOk) {
				echo $ax['mdb_ok'];
			} else {
				echo $ax['mdb_nok_repair'].' - ';
				$tableOk = false;
				$result = dbQuery('REPAIR TABLE '.$table[0]);
				while ($row=mysqli_fetch_assoc($result)) {
					if ($row['Msg_type'] == 'status' and strtolower($row['Msg_text']) == 'ok') {
						$tableOk = true;
					}
				}
				echo ($tableOk) ? $ax['mdb_ok'] : $ax['mdb_nok'];
			}
			echo "</td></tr>\n";
		}
	}
	echo "</table>\n";
}

/* Compact db tables */
function compactTables() {
	global $ax, $dbPfix;
	
	echo '<table class="fieldBoxFix">'."\n";
	echo '<tr><td class="legend">&nbsp;'.$ax['mdb_compact'].'&nbsp;</td></tr>'."\n";
	$deleteD = date('Y-m-d', time() - 86400*30); //remove if deleted more than 30 days ago
	//remove deleted events from db
	$result = dbQuery("DELETE FROM [db]events WHERE status = -1 and m_date <= '".$deleteD."'");
	echo '<tr><td>'.$ax['mdb_purge_done']."</td></tr>\n";
	$rSet = dbQuery("SHOW TABLES LIKE '".addcslashes($dbPfix,'_')."%'");
	if (!$rSet) {
		echo '<tr><td>'.$ax['mdb_noshow_tables']."</td></tr>\n";
	} else {
		while ($table = mysqli_fetch_row($rSet)) {
			echo '<tr><td>'.$ax['mdb_compact_table'].' \''.$table[0].'\' - ';
			$result = dbQuery('OPTIMIZE TABLE '.$table[0]);
			echo (!$result ? $ax['mdb_compact_error'] : $ax['mdb_compact_done'])."</td></tr>\n";
		}
	}
	echo "</table>\n";
}

/* Backup db tables*/
function backupTables() {
	global $ax, $dbPfix;
	
	//get table names
	$tableSet = dbQuery("SHOW TABLES LIKE '".addcslashes($dbPfix,'_')."%'");
	echo '<table class="fieldBoxFix">'."\n";
	echo '<tr><td class="legend">&nbsp;'.$ax['mdb_backup'].'&nbsp;</td></tr>'."\n";
	if (!$tableSet) {
		echo '<tr><td>'.$ax['mdb_noshow_tables']."</td></tr>\n";
	} else {
		//backup tables
		$sqlFile = '';
		while ($table = mysqli_fetch_row($tableSet)) {
			echo '<tr><td>'.$ax['mdb_backup_table'].' \''.$table[0].'\' - ';
			$rSet = dbQuery('SELECT * FROM '.$table[0]);
			$nrFields = mysqli_num_fields($rSet);
			$sqlFile .= 'DROP TABLE '.$table[0].';';
			$createTableCode = mysqli_fetch_row(dbQuery('SHOW CREATE TABLE '.$table[0]));
			$sqlFile .= "\n\n".$createTableCode[1].";\n\n";
			for ($i = 0; $i < $nrFields; $i++) {
				while($row = mysqli_fetch_row($rSet)) {
					$sqlFile .= 'INSERT INTO '.$table[0].' VALUES(';
					for($j=0; $j<$nrFields; $j++) {
						$row[$j] = preg_replace("%\n%","\\n",$row[$j]);
						$sqlFile .= isset($row[$j]) ? '"'.addslashes($row[$j]).'"' : '""';
						if ($j < ($nrFields-1)) { $sqlFile .= ','; } 
					}
					$sqlFile .= ");\n";
				}
			}
			$sqlFile .="\n";
			echo $ax['mdb_backup_done']."</td></tr>\n";
		}
		echo "<tr><td>&nbsp;</td></tr>\n";
		//save .sql backup file
		$fName = './files/cal-backup-'.date('Ymd-His').'.sql';
		echo '<tr><td>'.$ax['mdb_file_name'].' <strong>'.$fName."</strong></td></tr>\n";
		if (file_put_contents($fName, $sqlFile) !== false) { 
			echo '<tr><td>'.$ax['mdb_file_saved']."</td></tr>\n";
		} else {
			echo "<tr><td>&nbsp;</td></tr>\n";
			echo '<tr><td><strong>'.$ax['mdb_write_error']."</strong></td></tr>\n";
		}
	}
	echo "</table>\n";
}

//init
$msg = '';
$backup = empty($_POST["backup"]) ? 0 : 1;
$compact = empty($_POST["compact"]) ? 0 : 1;
$repair = empty($_POST["repair"]) ? 0 : 1;
$mdb_exe = isset($_POST["mdb_exe"]) ? 1 : 0;

//Control logic
if ($admin) {
	if ($mdb_exe and (!$repair and !$compact and !$backup)) { $msg = $ax['mdb_no_function_checked'];	}
	echo '<br><p class="error">'.$msg."</p>\n";
	echo "<div class=\"scrollBoxAd\">\n";
	if (!$mdb_exe or (!$repair and !$compact and !$backup)) {
		echo '<aside class="aside">'.$ax['xpl_manage_db']."</aside>\n";
		echo "<div class=\"centerBox\">\n";
		mdbForm(); //manage db form
		echo "</div>\n";
	} else {
		echo "<div class=\"centerBox\">\n";
		processFunctions();
		echo "</div>\n";
	}
	echo "</div>\n";
} else {
	echo "<p class=\"error\">".$ax['no_way']."</p>\n";
}
?>