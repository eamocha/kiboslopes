<?php
//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only
?>
<table class="evtForm">
	<tr>
		<td><?php echo "Trip";?>:</td>
		<?php
				$eColor = ($col or $bco) ? " style=\"color:".$col."; background:".$bco.";\"" : "";
				echo '<td><span'.$eColor.'>'.$tit."</span></td>\n";
		?>
	</tr>
	<tr>
		<td><?php echo "Route";?>:</td>
		<td><?php echo $ven; ?></td>
	</tr>
	<tr>
		<td><?php echo "Driver";?>:</td>
		<td><?php echo $cnm.($pri ? '&nbsp;&nbsp;&nbsp;'.$xx['evt_private_event'] : ''); ?></td>
	</tr>
	<tr>
	<td><?php echo $xx['evt_description']; ?>:</td>
	<td><?php echo $desHtml; ?></td>
	</tr>
	<tr><td colspan="2"><hr></td></tr>
	<tr>
		<td><?php echo $xx['evt_date_time'];?>:</td>
		<td>
		<?php
		echo $sda;
		if ($ald) {
			echo ($eda ? ' - '.$eda : '').' '.$xx['at_time'].' '.$xx['evt_all_day'];
		} else {
			echo ' '.$xx['at_time'].' '.$sti;
			if ($eda) { echo ' - '.$eda; }
			if ($eti) { echo ($eda ? ' '.$xx['at_time'].' ' : ' - ').$eti; }
		}
		?>
		</td>
	</tr>
<?php
if ($r_t) {
	echo '<tr><td colspan="2">'.$repTxt."<br></td></tr>\n";
}
if ($not != "" and ($privs > 2 or ($privs == 2 and $uid == $_SESSION['uid']))) { //has rights to see email list
	echo '<tr><td colspan="2"><hr></td></tr>'."\n";
	echo "<tr>\n";
	echo '<td>'.$xx['evt_notify'].":</td>\n";
	echo '<td>'.$not.' '.$xx['evt_days_before_event']."</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo '<td colspan="2">'.$nml."</td>\n";
	echo "</tr>\n";
}
if ($set['showAdEd']) {
	echo '<tr><td colspan="2"><hr></td></tr>'."\n";
	echo '<tr><td colspan="2">'.$xx['evt_added'].': '.IDtoDD($ada).' '.$xx['by'].' '.$own;
	if ($mda and $edr) { echo ' - '.$xx['evt_edited'].": ".IDtoDD($mda).' '.$xx['by'].' '.$edr; }
	echo "</td>\n</tr>\n";
}
?>
</table>

<?php
echo '<div class="floatC">'."\n".'<button onClick="javascript:self.close()">'.$xx["evt_close"]."</button>\n</div>\n";
?>
