<?php
//sanity check
if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only
?>
<form id="event" name="event" method="post" action="index.php?xP=10">
<input type="hidden" name="mode" value="<?php echo $mode; ?>"/>
<input type="hidden" name="eid" value="<?php echo $eid; ?>"/>
<input type="hidden" name="evD" value="<?php echo $evD; ?>"/>
<input type="hidden" name="oUid" value="<?php echo $oUid; ?>"/>
<input type="hidden" name="chk" value="<?php echo $chk; ?>"/>
<input type="hidden" name="mda" value="<?php echo $mda; ?>"/>
<input type="hidden" name="edr" value="<?php echo $edr; ?>"/>
<input type="hidden" name="own" value="<?php echo $own; ?>"/>
<table class="evtForm">
<tr><td class="floatC">
<?php
$catColor = ($col ? "color:".$col.";" : "").($bco ? "background-color:".$bco.";" : "");
echo '<span'.($catColor ? " style=\"".$catColor."\"" : "").'>'.$tit."</span>\n";
echo "</td></tr>\n<tr><td class=\"floatC\">";
if ($r_t > 0) { //repeating event
	echo $xx['evt_is_repeating'];
} else { //multi-day event
	echo $xx['evt_is_multiday'];
}
echo "</td></tr>\n<tr><td class=\"floatC\">";
echo '<br>'.$xx['evt_edit_series_or_occurrence'];
echo "</td></tr>\n</table>\n";
echo "<div class=\"floatC\">\n";
echo '<input type="submit" name="edit_nx" value="'.$xx['evt_edit_series']."\"/>&nbsp;&nbsp;&nbsp;\n";
echo '<input type="submit" name="edit_1x" value="'.$xx['evt_edit_occurrence']."\"/>&nbsp;&nbsp;&nbsp;\n";
echo '<button type="button" onclick="done(1,0);">'.$xx['evt_close']."</button>\n";
echo "</div>\n";
?>
</form>
