<?php

//sanity check

if (!defined('LCC')) { exit('not permitted ('.substr(basename(__FILE__),0,-4).')'); } //lounch via script only

?>

<form id="event" name="event" method="post" action="index.php?xP=10">

<input type="hidden" name="mode" value="<?php echo $mode; ?>"/>

<input type="hidden" name="eid" value="<?php echo $eid; ?>"/>

<input type="hidden" name="evD" value="<?php echo $evD; ?>"/>

<input type="hidden" name="oUid" value="<?php echo $oUid; ?>"/>

<input type="hidden" name="editN" value="<?php echo $editN; ?>"/>

<input type="hidden" name="chk" value="<?php echo $chk; ?>"/>

<input type="hidden" name="xda" value="<?php echo $xda; ?>"/>

<input type="hidden" name="ada" value="<?php echo $ada; ?>"/>

<input type="hidden" name="mda" value="<?php echo $mda; ?>"/>

<input type="hidden" name="edr" value="<?php echo $edr; ?>"/>

<input type="hidden" name="own" value="<?php echo $own; ?>"/>

<table class="evtForm">

	<col width='80'/><col width='100'/><col width='120'/><col/>

	<tr>

		<td>Trip:</td>

		<td colspan="3"><input readonly="readonly" type="text" name="tit" id="tit" style="width:100%" maxlength="64" value="<?php echo $tit; ?>"/></td>

	</tr>

	<tr>

		<td>Route:</td>

		<td colspan="3"><input type="text" name="ven" id="ven" style="width:100%" maxlength="64" value="<?php echo $ven; ?>"/></td>

	</tr>

	<tr>

		<td>Driver:</td>

		<td colspan="2">

			<select name="cid" id="cid">

				<?php catMenu($cid); ?>

			</select>

		</td>

		<td>

<?php

		if ($_SESSION['uid'] != 1) {

			echo '<input type="checkbox" name="pri" value="yes"'.($pri ? " checked=\"checked\"/> " : "/> ").$xx['evt_private_event']."\n";

		}

?>

		</td>

	</tr>

	<tr>
	  <td>Driver 2:</td>
	  <td colspan="3"><select name="cid2" id="cid2">
	    <?php catMenu($cid2); ?>
      </select></td>
  </tr>
	<tr>

	<td><?php echo $xx['evt_description']; ?>:</td>

	<td colspan="3">

		<textarea  readonly="readonly" name="des" id="des" rows="3" cols="1" style="width:100%"><?php echo $des; ?></textarea>

		<div class="fontS">(<?php echo $xx['evt_url_format']; ?>)</div>

	</td>

	</tr>

	<tr><td colspan="4"><hr></td></tr>

	<tr>

		<td><?php echo $xx['evt_start_date'];?>:</td>

		<td><input type="text" name="sda" id="sda" value="<?php echo $sda; ?>" size="8"/><button title="<?php echo $xx['evt_select_date']; ?>" onclick="dPicker(0,'nill','sda','eda');return false;">&larr;</button></td>

		<td id="dTimeS"<?php echo $hidden; ?>><input type="text" name="sti" id="sti" value="<?php echo $sti; ?>" size="6"/><button title="<?php echo $xx['evt_select_time']; ?>" onclick="tPicker('sti');return false;">&larr;</button></td>

		<td><input type="checkbox" onclick="hide_times(this);" name="ald" value="all"<?php echo $checked?>/> <?php echo $xx['evt_all_day']."\n";?> </td>

	</tr>

	<tr>

		<td><?php echo $xx['evt_end_date'];?>:</td>

		<td><input type="text" name="eda" id="eda" value="<?php echo $eda; ?>" size="8"/><button title="<?php echo $xx['evt_select_date']; ?>" onclick="dPicker(1,'nill','eda','sda');return false;">&larr;</button></td>

		<td id="dTimeE"<?php echo $hidden; ?>><input type="text" name="eti" id="eti" value="<?php echo $eti; ?>" size="6"/><button title="<?php echo $xx['evt_select_time']; ?>" onclick="tPicker('eti');return false;">&larr;</button></td>

		<td></td>

	</tr>

	<tr>

		<td colspan="4">

			<?php

			echo $repTxt."&nbsp;<button type=\"button\" onclick=\"show('repBox');\">".$xx['evt_change']."</button><br>\n";

			?>

		</td>

	</tr>

<?php

	echo '<tr><td colspan="4"><hr></td></tr>'."\n";

	echo "<tr>\n";

	echo '<td>'.$xx['evt_notify'].":</td>\n";

	echo '<td colspan="3">'."\n";

	echo '<input type="checkbox" name="non" value="yes"'.($non ? ' checked="checked"/> ' : '/> ').$xx['evt_now_and_or']."&nbsp;\n";

	echo '<input type="text" name="not" style="width:20px" maxlength="2" value="'.$not.'"/> '.$xx['evt_days_before_event']."\n";

	echo "</td>\n";

	echo "</tr>\n";

	echo "<tr>\n";

	echo '<td colspan="4">'."\n";

	echo '<input type="text" name="nml" id="nml" style="width:100%" maxlength="255" value="'.$nml.'"/>'."\n";

	echo '<div class="fontS">('.$xx['evt_notify_eml_list'].")</div>\n";

	echo "</td>\n";

	echo "</tr>\n";

	echo '<tr><td colspan="4"><hr></td></tr>'."\n";?>



<tr>

	<td>Remarks:</td>

	<td colspan="3">

		<textarea name="remks" id="remks" rows="3" cols="1" style="width:100%"><?php echo $remks; ?></textarea>

		<div class="fontS">(<?php echo $xx['evt_url_format']; ?>)</div>

	</td>

	</tr>

	<?php 

	echo '<tr><td colspan="4">'.$xx['evt_added'].': '.IDtoDD($ada).' '.$xx['by'].' ';

	if ($admin) {

		echo '<select name="uid" id="uid">'."\n";

			userMenu($uid);

		echo '</select>'."\n";

	} else {

		echo $own;

	}

	if ($mda and $edr) { echo ' - '.$xx['evt_edited'].": ".IDtoDD($mda).' '.$xx['by'].' '.$edr; }

	echo "</td>\n</tr>\n";

?>

</table>



<div class='repBox' id='repBox'>

  <div class="floatC"><b><?php echo $xx['evt_set_repeat']; ?></b><hr></div>

	<div>

		<input type="radio" name="r_t" value="0" <?php echo (!$r_t ? 'checked="checked"/> ' : '/> ').$xx['evt_no_repeat'];?> />

		<br>

		<input type="radio" name="r_t" value="1" <?php echo ($r_t == "1" ? 'checked="checked"/> ' : '/> ').$xx['evt_repeat'];?> />

		<select name="ri1" id="ri1">

			<option value="1"<?php echo ($ri1 == "1" ? ' selected="selected">' : '>').$xx['evt_interval1_1'];?></option>

			<option value="2"<?php echo ($ri1 == "2" ? ' selected="selected">' : '>').$xx['evt_interval1_2'];?></option>

			<option value="3"<?php echo ($ri1 == "3" ? ' selected="selected">' : '>').$xx['evt_interval1_3'];?></option>

			<option value="4"<?php echo ($ri1 == "4" ? ' selected="selected">' : '>').$xx['evt_interval1_4'];?></option>

			<option value="5"<?php echo ($ri1 == "5" ? ' selected="selected">' : '>').$xx['evt_interval1_5'];?></option>

			<option value="6"<?php echo ($ri1 == "6" ? ' selected="selected">' : '>').$xx['evt_interval1_6'];?></option>

		</select>

		<select name="rp1" id="rp1">

			<option value="1"<?php echo ($rp1 == "1" ? ' selected="selected">' : '>').$xx['evt_period1_1'];?></option>

			<option value="2"<?php echo ($rp1 == "2" ? ' selected="selected">' : '>').$xx['evt_period1_2'];?></option>

			<option value="3"<?php echo ($rp1 == "3" ? ' selected="selected">' : '>').$xx['evt_period1_3'];?></option>

			<option value="4"<?php echo ($rp1 == "4" ? ' selected="selected">' : '>').$xx['evt_period1_4'];?></option>

		</select>

		 *)<br>

		<input type="radio" name="r_t" value="2" <?php echo ($r_t == "2" ? 'checked="checked"/> ' : '/> ').$xx['evt_repeat_on'];?> />

		<select name="ri2" id="ri2">

			<option value="1"<?php echo ($ri2 == "1" ? ' selected="selected">' : '>').$xx['evt_interval2_1'];?></option>

			<option value="2"<?php echo ($ri2 == "2" ? ' selected="selected">' : '>').$xx['evt_interval2_2'];?></option>

			<option value="3"<?php echo ($ri2 == "3" ? ' selected="selected">' : '>').$xx['evt_interval2_3'];?></option>

			<option value="4"<?php echo ($ri2 == "4" ? ' selected="selected">' : '>').$xx['evt_interval2_4'];?></option>

			<option value="5"<?php echo ($ri2 == "5" ? ' selected="selected">' : '>').$xx['evt_interval2_5'];?></option>

		</select>

		<select name="rp2" id="rp2">

			<option value="1"<?php echo ($rp2 == "1" ? ' selected="selected">' : '>').$wkDays[1];?></option>

			<option value="2"<?php echo ($rp2 == "2" ? ' selected="selected">' : '>').$wkDays[2];?></option>

			<option value="3"<?php echo ($rp2 == "3" ? ' selected="selected">' : '>').$wkDays[3];?></option>

			<option value="4"<?php echo ($rp2 == "4" ? ' selected="selected">' : '>').$wkDays[4];?></option>

			<option value="5"<?php echo ($rp2 == "5" ? ' selected="selected">' : '>').$wkDays[5];?></option>

			<option value="6"<?php echo ($rp2 == "6" ? ' selected="selected">' : '>').$wkDays[6];?></option>

			<option value="7"<?php echo ($rp2 == "7" ? ' selected="selected">' : '>').$wkDays[7];?></option>

		</select>

		<?php echo $xx['of'];?>

		<select name="rpm" id="rpm">

			<option value="0"<?php echo ($rpm == "0" ? ' selected="selected">' : '>').$xx['evt_each_month'];?></option>

			<option value="1"<?php echo ($rpm == "1" ? ' selected="selected">' : '>').$months[0];?></option>

			<option value="2"<?php echo ($rpm == "2" ? ' selected="selected">' : '>').$months[1];?></option>

			<option value="3"<?php echo ($rpm == "3" ? ' selected="selected">' : '>').$months[2];?></option>

			<option value="4"<?php echo ($rpm == "4" ? ' selected="selected">' : '>').$months[3];?></option>

			<option value="5"<?php echo ($rpm == "5" ? ' selected="selected">' : '>').$months[4];?></option>

			<option value="6"<?php echo ($rpm == "6" ? ' selected="selected">' : '>').$months[5];?></option>

			<option value="7"<?php echo ($rpm == "7" ? ' selected="selected">' : '>').$months[6];?></option>

			<option value="8"<?php echo ($rpm == "8" ? ' selected="selected">' : '>').$months[7];?></option>

			<option value="9"<?php echo ($rpm == "9" ? ' selected="selected">' : '>').$months[8];?></option>

			<option value="10"<?php echo ($rpm == "10" ? ' selected="selected">' : '>').$months[9];?></option>

			<option value="11"<?php echo ($rpm == "11" ? ' selected="selected">' : '>').$months[10];?></option>

			<option value="12"<?php echo ($rpm == "12" ? ' selected="selected">' : '>').$months[11];?></option>

		</select>

		 *)<br><br>

		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*) <?php echo $xx['evt_until'];?>

		<input type="text" name="rul" id="rul" value="<?php echo $rul; ?>" size="8"/>

		<button title="<?php echo $xx['evt_select_date']; ?>" onclick="dPicker(1,'nill','rul','sda');return false;">&larr;</button>

		(<?php echo $xx['evt_blank_no_end'];?>)

	</div>

	<div class="floatC"><hr><input type="submit" name="refresh" value="<?php echo $xx['evt_set']; ?>"/></div>

</div>

<?php

echo "<div class=\"floatC\">\n";

if ($mode == "add" or $mode == "add_exe") {

	echo '<input type="submit" name="add_exe_cls" value="'.$xx['evt_add_close'].'"/>';

	echo '&nbsp;&nbsp;<input type="submit" name="add_exe" value="'.$xx['evt_add'].'"/>';

} else {

	echo '<input type="submit" name="upd_exe_cls" value="'.$xx['evt_save_close'].'"/>'."\n";

	echo '&nbsp;&nbsp;<input type="submit" name="upd_exe" value="'.$xx['evt_save'].'"/>'."\n";

	echo '&nbsp;&nbsp;<input type="submit" name="add_exe" value="'.$xx['evt_clone'].'"/>'."\n";

	echo '&nbsp;&nbsp;<input type="submit" name="del_exe" value="'.$xx['evt_delete'].'"/>'."\n";

}

echo '&nbsp;&nbsp;<button type="button" onclick="done(1,0);">'.$xx['evt_close']."</button>\n";

echo "</div>\n";

echo "</form>\n";

?>

<script>$I("tit").focus();</script>

