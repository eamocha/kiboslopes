<?php
/*
= Header for the LuxCal calendar pages = (full)

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
<meta name="description" content="LuxCal web calendar - a LuxSoft product">
<meta name="keywords" content="LuxSoft, LuxCal, LuxCal web calendar">
<meta name="author" content="Roel Buining">
<meta name="robots" content="nofollow">
<!--[if IE]>
<meta http-equiv="imagetoolbar" content="no">
<![endif]-->
<link rel="shortcut icon" href=" lcal.ico">
<?php
echo '<link rel="canonical" href="'.$set['calendarUrl'].'">'."\n";
if ($privs > 0 and $set['rssFeed']) {
	echo '<link rel="alternate" type="application/rss+xml" title="LuxCal RSS Feed" href="'.$set['calendarUrl'].'rssfeed.php">'."\n";
}
?>
<link rel="stylesheet" href="css/css.php" type="text/css">
<script>
<?php //used by dtpicker.js
echo 'var mode = "',$mode,'";
var tFormat = "',$set['timeFormat'],'";
var dFormat = "',$set['dateFormat'],'";
var wStart = ',$set['weekStart'],';
var dpToday = "',$xx['hdr_today'],'";
var dpClear = "',$xx['hdr_clear'],'";
var dpMonths = new Array("',implode('","',$months),'");
var dpWkdays = new Array("',implode('","',$wkDays_m),'");
var dwTimeSlot = ',$set['dwTimeSlot'],';'."\n"; //used by dw_functions.php
?>
</script>
<style>

span.hovered
{
	background: #FF99FF;
	/*border-style:dotted;
    border-width:1px;*/
}

div.event {
	height:16px;
	margin-top:0px;
	vertical-align:middle;

}
span.eventTitle
{
	margin-top:0px;
	margin:0;
}

#draggableHelper
{
	font-size:11px;	
}

div.topcolorbox
{

	display: inline-block;
	margin: 0px;
	height: 10px;
	width: 100%;
	background-color:#FFFFFF;
}

div.topcolorbox ul
{	
	 list-style: none; 
	 margin: 0px;
	 width:100%;
	 overflow:hidden;

}

div.topcolorbox li
{
	 float:left;
	 /*padding: 5px;*/
	 /*width:16.6%;*/
	 height: 10px;	
}

.panel {
	width:300px;
	float:left;
	height:550px;
	/*background:#d9dada;*/
	background-color:#4F8FFF;
    filter: alpha(opacity=87);
    -moz-opacity:0.87;
    opacity:0.87;
    -moz-box-shadow:0px 0px 20px #4F8FFF;
    -webkit-box-shadow:0px 0px 20px #4F8FFF;
    box-shadow:0px 0px 20px #4F8FFF;
	position:relative;
	left:-300px;
    overflow-y:auto;
	/*overflow-x:hidden;*/
	z-index:5;


}
.slider-arrow {
	padding:5px;
	width:10px;
	float:left;
	background:#d9dada;
	font:400 12px Arial, Helvetica, sans-serif;
	color:#000;
	text-decoration:none;
	position:relative;
	left:-300px;
}

#driverslist, .draglist{
	list-style:none;
}
</style>
<script src="common/dtpicker.js"></script>
<script src="common/cpicker.js"></script>
<script src="common/toolbox.js"></script>
<link rel="stylesheet" type="text/css" href="css/sidebar/blue-glass/sidebar.css" />
<link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
<link rel="stylesheet" type="text/css" href="js/contextMenu.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script> -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!--<script type="text/javascript" src="js/jquery.sidebar.js"></script>-->
<script type="text/javascript" src="js/jquery.contextmenu.r2.js"></script>
<script type="text/javascript" src="js/jquery.tooltipster.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		/*
		$("ul#demo_menu1").sidebar({
            close:"click",
            open:"click"
        });
		*/

		//$("#newD").datepicker({ dateFormat: "yy-mm-dd" });

		$('.evtTitle').tooltipster({
                contentAsHTML: true,
				trigger: 'hover',
				theme: 'tooltipster-light'
         });


		/*$('span.evtTitle').tooltip({
		});
		*/
		<?php
		//allow only admin or operations to access the menu
		if($_SESSION['role_id']==1 or $_SESSION['role_id']==6)
		{
		?>

		$('.evtTitle').droppable({
			hoverClass: 'hovered',
			drop: handleDriverDrop
		});

		buildContextMenu('.drivercolorbox');

		$('.draglist').draggable( 
			{
				appendTo: 'body',
				containment: 'document',
				cursor: 'move',
				snap: '.content',
				scroll: false,
				helper: 'clone'//myHelper 
		} );

		<?php
		}
		?>


	//Calling context menu
	 //$('.drivercolorbox').contextMenu(menuDriver);




		//'.drivercolorbox'

		function buildContextMenu(selector)
		{

			$(selector).contextMenu('myMenu1',{
			menuStyle: {

        		width: '220px'

      		}
			, 

			bindings: {

				'deletedriver': function(t) {

				  var event_driver_id = t.id;
				  var eventid = $('#' + t.id).attr("event_id")

				  //handle remove
				  handleDriverRemove(eventid,event_driver_id);

				},

				'assignwholetrip': function(t) {

				  var event_driver_id = t.id;
				  var driver_trip_id = $('#' + t.id).closest(".topcolorbox").attr("div_trip_id");

					  eventId = $('#' + t.id).attr("event_id");
					  event_Date = $("span[eventid='" + eventId +"']").attr("eventdate");

					  handleDriverAjaxRequest('ajax_event_driver_assign_wholetrip.php',eventId,event_driver_id,event_Date);

				},

				'assignfromthisdate': function(t) { //update from date going forward

				  var event_driver_id = t.id;
				  var driver_trip_id = $('#' + t.id).closest(".topcolorbox").attr("div_trip_id");

				  eventId = $('#' + t.id).attr("event_id");
				  event_Date = $("span[eventid='" + eventId +"']").attr("eventdate");

				  //current calender date
				  calendarDate = $('#newD').val();

				  handleDriverAjaxRequest('ajax_event_driver_assign_fromdate.php',eventId,event_driver_id,event_Date);

				},

				'deletedriverwholetrip': function(t) {

					 var current_event_driver_id = t.id;
					 var driver_id = $('#' + t.id).attr("driver_li_id");

					 eventId = $('#' + t.id).attr("event_id");
					 event_Date = $("span[eventid='" + eventId +"']").attr("eventdate");

					 //handleDriverRemoveFromWholeTrip(eventId,current_event_driver_id,event_Date);
					 handleDriverAjaxRequest('ajax_event_driver_remove_wholetrip.php',eventId,current_event_driver_id,event_Date);
				 },

				'deletedriverfromthisdate': function(t) {

					 var current_event_driver_id = t.id;
					 var driver_id = $('#' + t.id).attr("driver_li_id");

					 eventId = $('#' + t.id).attr("event_id");
					 event_Date = $("span[eventid='" + eventId +"']").attr("eventdate");

					 //handleDriverRemoveFromWholeTrip(eventId,current_event_driver_id,event_Date);
					 handleDriverAjaxRequest('ajax_event_driver_remove_fromdate.php',eventId,current_event_driver_id,event_Date);
				 }

			 }
			});

		}



		function myHelper(event) 
		{ 	
			//ui.draggable.find("img").attr("alt"), if a child element
		 	var driverNumber = $(this).attr("driverid");
			var driverColour = $(this).attr("drivercolour");
			var driverName = $(this).attr("drivername");
			return '<div id="draggableHelper" style="color: '+ driverColour + ';z-index:90;">' + driverName + '</div>';
		}

		function handleDriverDrop(event,ui)
		{
			//get the event
			var eventId = $(this).attr('eventid');
			var eventDate = $(this).attr('eventdate'); //eventdate

			//ui.draggable.find("img").attr("alt"), if a child element
		 	var driverId = ui.draggable.attr("driverid");
			var driverColour = ui.draggable.attr("drivercolour");
			var driverName = ui.draggable.attr("drivername");

			var loggedInUser = $('#loggedInUser').val();

		  //do ajax to update event
		  var eventDriverUpdateRequest = $.ajax({
			  url: "ajax_event_driver_update.php",
			  type: "POST",
			  data: { eventid : eventId, eventdate : eventDate, driverid : driverId,drivercolour : driverColour, drivername:driverName, loggedinuser:loggedInUser},
			  dataType: "html"
		  });


		 eventDriverUpdateRequest.done(function( msg ) {

			$("#divevent_" + eventId).html( msg );

			//reapply menu
			buildContextMenu('.drivercolorbox');

		  });



		eventDriverUpdateRequest.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	}


	//handle remove driver
	function handleDriverAssign(eventId,event_driver_Id,event_Date)
	{
			//from event_driver_id, get the main div id
			var loggedInUser = $('#loggedInUser').val();

		  //do ajax to update event
		  var eventDriverAssignRequest = $.ajax({
			  url: "ajax_event_driver_assign.php",
			  type: "POST",
			  data: { event_driver_id : event_driver_Id,eventid : eventId, eventdate : event_Date, loggedinuser : loggedInUser},
			  dataType: "html"
		  });


		 eventDriverAssignRequest.done(function( msg ) {

			$("#divevent_" + eventId).html( msg );

			//reapply menu
			buildContextMenu('.drivercolorbox');

		  });



		eventDriverAssignRequest.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	}



	//ajax_event_driver_assign_wholetrip.php
	function handleDriverAjaxRequest(ajaxurl,eventId,event_driver_Id,event_Date)
	{
		 //from event_driver_id, get the main div id
		  var loggedInUser = $('#loggedInUser').val();

		  //do ajax to update event
		  var eventDriverRequest = $.ajax({
			  url:  ajaxurl,//"ajax_event_driver_assign_wholetrip.php",
			  type: "POST",
			  data: { event_driver_id : event_driver_Id,eventid : eventId, eventdate : event_Date, loggedinuser : loggedInUser},
			  dataType: "json"
		  });

		 eventDriverRequest.done(function( data ) {
			updateCalendarDom(data);
			//reapply menu
			buildContextMenu('.drivercolorbox');
		  });

 		eventDriverRequest.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	}


	//handle remove driver
	function handleDriverRemove(eventId,event_driver_Id)
		{
			//from event_driver_id, get the main div id

		  //do ajax to update event
		  var eventDriverRemoveRequest = $.ajax({
			  url: "ajax_event_driver_remove.php",
			  type: "POST",
			  data: { event_driver_id : event_driver_Id},
			  dataType: "html"
		  });


		 eventDriverRemoveRequest.done(function( msg ) {

			$("#divevent_" + eventId).html( msg );

			//reapply menu
			buildContextMenu('.drivercolorbox');

		  });



		eventDriverRemoveRequest.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	}

	function updateCalendarDom(data)
	{
		//get the access the drivers box
		//count the drivers
		//create li and loop through

		var eventid = 0;

		 $.each(data, function() {  

			eventid = this.eventid;

			var strList = "<ul>";


			if(this.drivers.length>0)
			{
				//get the total for drivers
				intPercentage = Math.floor(99/this.drivers.length);
				//loop through the drivers
				$.each(this.drivers, function() { 

					strDriverDetails = this.drivername;

					if(this.vehicle!="")
					{
						strDriverDetails += ", " + this.vehicle;
					}

					if(this.phonenumber!="")
					{
						strDriverDetails += ", " + this.phonenumber;
					}

					strList+="<li class=\"drivercolorbox\" title=\""+ strDriverDetails + "\" driver_li_id=\""+ this.driverid + "\" event_id=\""+ eventid + "\" id=\"" + this.events_drivers_id + "\" event_driver_id=\"" + this.events_drivers_id + "\" drivercolour=\""+ this.driverbgcolor + "\" style=\"width:"+ intPercentage + "%; background-color:" + this.driverbgcolor + ";\">&nbsp;</li>";

				});
			}
			else
			{
				//put the empty one
				strList+="<li style=\"background-color:#FFFFFF;\">&nbsp;</li>";
			}

		    strList +="</ul>";
		 	$("#divevent_" + eventid).html(strList);

		 });  
	}

		//start code here

$(function(){
	$('.slider-arrow').click(function(){
        if($(this).hasClass('show')){
	    $( ".slider-arrow, .panel" ).animate({
          left: "+=300"
		  }, 700, function() {
            // Animation complete.
          });
		  $(this).html('&laquo;').removeClass('show').addClass('hide');
        }
        else {   	
	    $( ".slider-arrow, .panel" ).animate({
          left: "-=300"
		  }, 700, function() {
            // Animation complete.
          });
		  $(this).html('&raquo;').removeClass('hide').addClass('show');    
        }
    });

});


		//end code here

	});	
</script>		
<!--put jquery UI--->
</head>

<body>
<?php
echo "<header>\n";
echo '<span class="floatL">'.$set['calendarTitle'].'</span><span class="floatR">'.$uname.'</span><span class="noPrint">'.makeD(date("Y-m-d"),5)."</span>\n";
echo "</header>\n";
echo "<div class=\"navBar noPrint\">\n";
if ($privs > 0) { //view rights
	echo "<div class=\"floatR\">\n";
	if (!$mobile) {
		echo '<button type="button" title="'.$xx['hdr_print_page'].'" onclick="printNice();">'.$xx['hdr_print']."</button>\n";
	}
	if ($admin) { //admin functions
		echo '<select title="'.$xx['hdr_select_admin_functions'].'" name="views" onchange="jumpMenu(this)">'."\n";
		echo '<option value="#">'.$xx['hdr_admin']."&nbsp;</option>\n";
		echo '<option value="index.php?cP=90"'.($cP == "90" ? ' selected="selected">' : '>').$xx['hdr_settings']."</option>\n";
		echo '<option value="index.php?cP=91"'.($cP == "91" ? ' selected="selected">' : '>')."Drivers"."</option>\n";
		echo '<option value="index.php?cP=92"'.($cP == "92" ? ' selected="selected">' : '>').$xx['hdr_users']."</option>\n";
		echo '<option value="index.php?cP=93"'.($cP == "93" ? ' selected="selected">' : '>').$xx['hdr_database']."</option>\n";
		echo '<option value="index.php?cP=94"'.($cP == "94" ? ' selected="selected">' : '>').$xx['hdr_import_ics']."</option>\n";
		echo '<option value="index.php?cP=95"'.($cP == "95" ? ' selected="selected">' : '>').$xx['hdr_export_ics']."</option>\n";
		echo '<option value="index.php?cP=96"'.($cP == "96" ? ' selected="selected">' : '>').$xx['hdr_import_csv']."</option>\n";
		echo "</select> \n";
	}
	echo '<button type="button" title="'.$xx['hdr_todo_list']."\" onclick=\"show('taskBar')\">&nbsp;&#8801;&nbsp;</button>\n";
	echo '<button type="button" title="'.$xx['hdr_upco_list']."\" onclick=\"show('upcoBar')\">&nbsp;&#9744;&nbsp;</button>\n";
	echo '<button type="button" title="'.$xx['hdr_search'].'" onclick="window.location=\'index.php?cP=21\'">&nbsp;&#916;&nbsp;'."</button>\n";
	if ($privs > 1) { //post rights
		echo '<button type="button" title="'.$xx['hdr_add_event']."\" onclick=\"newE();\">&nbsp;+&nbsp;</button>\n";
	}
	echo '<button type="button" title="'.$xx['hdr_guide']."\" onclick=\"help();\">&nbsp;?&nbsp;</button>\n";
	if ($_SESSION['uid'] == 1) { //public user
		echo '<button type="button" onclick="login()">'.$xx['hdr_log_in']."</button>\n";
	} else { //known user
		echo '<button type="button" onclick="logout()">'.$xx['hdr_log_out']."</button>\n";
	}
	echo "</div>\n";
	echo '<button type="button" title="'.$xx['hdr_options_panel']."\" onclick=\"show('optPanel','optMenu')\">".$xx['hdr_options']."</button>\n";
	echo "<form class=\"inline\" method=\"post\" id=\"gotoD\" name=\"gotoD\" action=\"index.php\">\n";
	echo '<input style="width:62px;" type="text" name="newD" id="newD" value="'.IDtoDD($_SESSION['cD'])."\"/>\n";
	echo '<button type="button" title="'.$xx['hdr_select_date']."\" onclick=\"dPicker(0,'gotoD','newD');return false;\">&larr;</button>\n";

	echo '<input type="hidden" id="loggedInUser" name="loggedInUser" value="'.$_SESSION['f_name'].'">';

	echo "</form>\n";

	//make options panel
	echo "<div id='optPanel'>\n";
	echo '<h4 class="floatC">'.$xx['hdr_options_submit']."</h4>\n";
	echo "<form name=\"optMenu\" method=\"post\" action=\"index.php\">\n";
	echo "<table class=\"options\">\n";
	echo "<tr>\n";
	echo '<th title="'.$xx['hdr_select_view'].'">'.$xx['hdr_view']."</th>\n";
	if ($_SESSION['uid'] > 1 and $set['userMenu']) { echo '<th title="'.$xx['hdr_select_filter'].'">'.$xx['hdr_filter']."</th>\n"; }
	if ($set['catMenu']) { echo '<th title="'.$xx['hdr_select_filter'].'">'.$xx['hdr_filter']."</th>\n"; }
	if ($set['langMenu']) { echo '<th title="'.$xx['hdr_select_lang'].'">'.$xx['hdr_lang']."</th>\n"; }
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td><div class=\"optList\">\n";
	echo '<input type="checkbox" id="cP1" name="cP" value="1" onclick="check1(\'cP\',this);"'.($cP == "1" ? ' checked="checked"' : '').'/><label for="cP1"> '.$xx['hdr_year']."</label><br>\n";
	echo '<input type="checkbox" id="cP2" name="cP" value="2" onclick="check1(\'cP\',this);"'.($cP == "2" ? ' checked="checked"' : '').'/><label for="cP2"> '.$xx['hdr_month_full']."</label><br>\n";
	echo '<input type="checkbox" id="cP3" name="cP" value="3" onclick="check1(\'cP\',this);"'.($cP == "3" ? ' checked="checked"' : '').'/><label for="cP3"> '.$xx['hdr_month_work']."</label><br>\n";
	echo '<input type="checkbox" id="cP4" name="cP" value="4" onclick="check1(\'cP\',this);"'.($cP == "4" ? ' checked="checked"' : '').'/><label for="cP4"> '.$xx['hdr_week_full']."</label><br>\n";
	echo '<input type="checkbox" id="cP5" name="cP" value="5" onclick="check1(\'cP\',this);"'.($cP == "5" ? ' checked="checked"' : '').'/><label for="cP5"> '.$xx['hdr_week_work']."</label><br>\n";
	echo '<input type="checkbox" id="cP6" name="cP" value="6" onclick="check1(\'cP\',this);"'.($cP == "6" ? ' checked="checked"' : '').'/><label for="cP6"> '.$xx['hdr_day']."</label><br>\n";
	echo '<input type="checkbox" id="cP7" name="cP" value="7" onclick="check1(\'cP\',this);"'.($cP == "7" ? ' checked="checked"' : '').'/><label for="cP7"> '.$xx['hdr_upcoming']."</label><br>\n";
	echo '<input type="checkbox" id="cP8" name="cP" value="8" onclick="check1(\'cP\',this);"'.($cP == "8" ? ' checked="checked"' : '').'/><label for="cP8"> '.$xx['hdr_changes']."</label>\n";
	echo "</div></td>\n";
	if ($_SESSION['uid'] > 1 and $set['userMenu']) {
		echo "<td><div class=\"optList\">\n";
		$rSet = dbQuery("SELECT user_id, user_name, color FROM [db]users WHERE status >= 0 ORDER BY user_name");
		if ($rSet !== false) {
			echo '<input type="checkbox" id="cU0" name="cU[]" value="0" onclick="checkA(\'cU\',this);"'.(in_array(0, $_SESSION['cU']) ? ' checked="checked"' : '').'/><label for="cU0"> '.$xx['hdr_all_users']."</label><br>\n";
			while ($row=mysqli_fetch_assoc($rSet)) {
				$xU = $row['user_id'];
				$checked = in_array($xU, $_SESSION['cU']) ? " checked=\"checked\"" : "";
				$userColor = ($row['color']) ? " style=\"background-color:".$row['color'].";\"" : '';
				echo '<input type="checkbox" id="cU'.$xU.'" name="cU[]" value="'.$xU.'" onclick="checkN(\'cU\',this);"'.$checked.'/><label for="cU'.$xU.'"'.$userColor.'> '.stripslashes($row['user_name'])."</label><br>\n";
			}
		}
		echo "</div></td>\n";
	}
	if ($set['catMenu']) {
		echo "<td><div class=\"optList\">\n";
		$where = ' WHERE status >= 0'.($_SESSION['uid'] == 1 ? " AND public > 0" : "");
		$rSet = dbQuery("SELECT category_id, name, color, background FROM [db]categories".$where." ORDER BY sequence");
		if ($rSet !== false) {
			echo '<input type="checkbox" id="cC0" name="cC[]" value="0" onclick="checkA(\'cC\',this);"'.(in_array(0, $_SESSION['cC']) ? ' checked="checked"' : '').'/><label for="cC0"> '."All Drivers"."</label><br>\n";
			while ($row=mysqli_fetch_assoc($rSet)) {
				$xC = $row['category_id'];
				$checked = in_array($xC, $_SESSION['cC']) ? ' checked="checked"' : '';
				$catColor = ($row['color'] ? "color:".$row['color'].";" : "").($row['background'] ? "background-color:".$row['background'].";" : "");
				echo '<input type="checkbox" id="cC'.$xC.'" name="cC[]" value="'.$xC.'" onclick="checkN(\'cC\',this);"'.$checked.'/><label for="cC'.$xC.'"'.($catColor ? " style=\"".$catColor."\"" : "").'> '.stripslashes($row['name'])."</label><br>\n";
			}
		}
		echo "</div></td>\n";
	}
	if ($set['langMenu']) {
		echo "<td><div class=\"optList\">\n";
		$files = scandir("lang/");
		foreach ($files as $file) {
			if (substr($file, 0, 3) == "ui-") {
				$lang = strtolower(substr($file,3,-4));
				$checked = (strtolower($_SESSION['cL']) == $lang) ? " checked=\"checked\"" : '';
				echo '<input type="checkbox" id="'.$lang.'" name="cL" value="'.$lang.'" onclick="check1(\'cL\',this);"'.$checked.'/><label for="'.$lang.'"> '.ucfirst($lang)."</label><br>\n";
			}
		}
		echo "</div></td>\n";
	}
	echo "</tr>\n";
	echo "</table>\n";
	echo "</form>\n";
	echo "</div>\n";
} else { //display dummy navbar
	echo "&nbsp;<div class=\"floatR\">\n";
	echo '<button type="button" onclick="login()">'.$xx['hdr_log_in']."</button>\n";
	echo "</div>\n";
}
echo "</div>\n";
echo "<div class=\"content\">\n";

if ($privs > 0) { //view rights
	//make side bar with upcoming events
	echo "<div id='upcoBar'><img class='floatR point' onclick=\"show('upcoBar')\" src=\"images/close.png\" alt=\"close\"/><h5 class='dragme'>".$xx['hdr_upco_list']."</h5>\n";
	echo "<div class='sideList'>\n";

	$curD = $_SESSION['cD'];
	$eTime = mktime(12,0,0,substr($curD,5,2),substr($curD,8,2),substr($curD,0,4)) + (($set['lookaheadDays']-1) * 86400); //Unix time of end date
	$eDate = date("Y-m-d", $eTime);

	retrieve($curD,$eDate,'uc');

 //display upcoming events
	if ($evtList) {
		foreach($evtList as $date => &$events) {
			echo "<h6>".makeD($date,5)."</h6>\n";
			foreach ($events as $evt) {
				$mayEdit = ($privs > 2 or ($privs == 2 and $evt['uid'] == $_SESSION['uid'])) ? true : false; //edit rights
				$onClick = ($set['details4All'] or $mayEdit) ? " class=\"point\" onclick=\"editE(".$evt['eid'].",'".$date."');\"" : " class=\"arrow\"";
				if ($set['eventColor']) {
					$eColor = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
				} else {
					$eColor = ($evt['uco'] ? 'background-color:'.$evt['uco'].';' : '');
				}
				echo ($evt['sti'] == "" and $evt['eti'] == "") ? $xx['vws_all_day'] : ITtoDT($evt['sti']);
				if ($evt['eti']) echo " - ".ITtoDT($evt['eti']);
				echo '<p'.$onClick.($eColor ? ' style="'.$eColor.'"' : '').'>&nbsp;&nbsp;'.$evt['tit']."</p><br>\n";
			}
		}
	} else {
		echo $xx['none']."\n";
	}
	echo "</div>\n</div>\n";

	//make side bar with todo list
	echo "<div id='taskBar'><img class='floatR point' onclick=\"show('taskBar')\" src=\"images/close.png\" alt=\"close\"/><h5 class='dragme'>".$xx['hdr_todo_list']."</h5>\n";
	echo "<div class='sideList'>\n";

	$curD = $_SESSION['cD'];
	$curT = mktime(12,0,0,substr($curD,5,2),substr($curD,8,2),substr($curD,0,4)); //current Unix time
	$startD = date("Y-m-d", $curT - (30 * 86400)); //current date - 1 month
	$endD = date("Y-m-d", $curT + (($set['lookaheadDays']-1) * 86400)); //current date + look ahead nr of days

	$filter = '(c.check1 = 1 OR c.check2 = 1)'; //events in cat with a check mark
	retrieve($startD,$endD,'u',$filter);

 //display todo list
	if ($evtList) {
		foreach($evtList as $date => &$events) {
			echo "<h6>".makeD($date,5)."</h6>\n";
			foreach ($events as $evt) {
				$mayEdit = ($privs > 2 or ($privs == 2 and $evt['uid'] == $_SESSION['uid'])) ? true : false; //edit rights
				$onClick = ($set['details4All'] or $mayEdit) ? " class=\"point\" onclick=\"editE(".$evt['eid'].",'".$date."');\"" : " class=\"arrow\"";
				if ($set['eventColor']) {
					$eColor = ($evt['cco'] ? 'color:'.$evt['cco'].';' : '').($evt['cbg'] ? 'background-color:'.$evt['cbg'].';' : '');
				} else {
					$eColor = ($evt['uco'] ? 'background-color:'.$evt['uco'].';' : '');
				}
				$check = '';
				if ($evt['ch1']) { $check .= strpos($evt['chk'], $date.'a') ? $evt['mk1'].' ' : '&#9744; '; }
				if ($evt['ch2']) { $check .= strpos($evt['chk'], $date.'b') ? $evt['mk2'] : '&#9744;'; }
				if ($check) {
					$attrib = ($set['details4All'] or $mayEdit) ? "class=\"chkBoxes floatL point\" onclick=\"checkE(".$evt['eid'].",'".$date."');\" title=\"".$xx['vws_check_marks']."\"" : 'class="chkBoxes floatL arrow"';
					$check = "<div ".$attrib.">".trim($check)."</div>";
				}
				echo '<p>'.(($evt['sti'] == "" and $evt['eti'] == "") ? $xx['vws_all_day'] : ITtoDT($evt['sti']));
				echo $evt['eti'] ? " - ".ITtoDT($evt['eti']).'</p>' : "</p>\n";
				echo $check.'<p'.$onClick.($eColor ? ' style="'.$eColor.'"' : '').'>&nbsp;&nbsp;'.$evt['tit']."</p><br>\n";
			}
		}
	} else {
		echo $xx['none']."\n";
	}
	echo "</div>\n</div>\n";
}

if ($pageTitle) echo '<br><h3 class="pageTitle">'.$pageTitle.'</h3>'."\n";
?>