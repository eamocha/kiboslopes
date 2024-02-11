<?php
session_start();

include('auth.php'); 
include('lib/config.php'); 

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KIBO SLOPES - Reservation Management System</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
 <!-- Validation Engine-->
    <script src="js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>

		<script src="js/validation/jquery.validationEngine.js" type="text/javascript"></script>

         <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

        <!--Validation End-->

        <!-- Color Box -->

        <link media="screen" rel="stylesheet" href="css/colorbox.css" />

        <script src="js/jquery.colorbox.js"></script> 

         <!-- Color Box End -->



<script src="js/jquery-1.8.2.js" type="text/javascript"></script>



<link href="js/datepicker/jqueryui.css" rel="stylesheet" type="text/css"/>

<script  src="js/datepicker/jqueryui.js" type="text/javascript"></script>



<style>

        

     <script>   $(document).ready(function(){



		

			$("#MyForm").validationEngine();

			$(".example5").colorbox();



			

		});</script>

         <style type="text/css">

		.calendarHeader { font-weight: bolder; color: #CC0000; background-color: #FFFFCC; } .calendarToday { background-color: #FFFFFF;

		border: 1px solid #00F; } .calendar { background-color: #FFFFCC; }

		 </style>

        

</head>

<?php 



include("Calendar.php");



//call functions

include('lib/functions.php');



class MyCalendar extends Calendar { function getDateLink($day, $month, $year) { // Only link the first day of every month

		  $link = ""; if ($day == 1) { $link = "first.php"; } return $link; } }

		  



?>

<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="images/logo.png" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName ?> |<a href="changepass/change-pwd.php?id=<?php echo $id?>">Change Pass</a>| <a href="lib/logout.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title">Dashboard</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > &nbsp;&nbsp;&nbsp;dashboard&nbsp;&nbsp;&nbsp;</span></li>

     <li><a href="reservations.php">RESERVATIONS </a></li>

      <li><a href="accounts.php">ACCOUNTS </a></li>

    <li ><a href="operations.php">OPERATIONS </a></li>

    <li><a href="administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="center_pane_big2">

    <table cellpadding="0" cellspacing="0" width="100%" >

     <script>

	$(function() {

		var dates = $( "#from, #to" ).datepicker({

			defaultDate: "+1w",

			changeMonth: true,

			numberOfMonths: 1,

			dateFormat: 'yy-mm-dd',

			onSelect: function( selectedDate ) {

				var option = this.id == "from" ? "minDate" : "maxDate",

					instance = $( this ).data( "datepicker" ),

					date = $.datepicker.parseDate(

						instance.settings.dateFormat ||

						$.datepicker._defaults.dateFormat,

						selectedDate, instance.settings );

				dates.not( this ).datepicker( "option", option, date );

			}

		});

	});

	</script>

    <form id="form1" name="form1" method="post" action="dashboardsearch.php"> <tr>

        <td width="31%" align="center" height="30" ><span style="color:#000; font-weight:bold"><a href="calender_new/index.php" target="_new" >View Calender</a> <?php //=date("F j, Y, g:i a");?></span></td>

        <td height="30" colspan="2" bgcolor="#97AB2D"><label for="from">From</label>

          <input name="from" type="text" id="from" size="10" value="<?php //echo $_REQUEST["from"]; ?>" />

          <label for="to">To</label>

          <input name="to" type="text" id="to" size="10" value="<?php //echo $_REQUEST["to"]; ?>"/> <label>Name(trip or T/L)</label>

          <input type="text" name="string" id="string" value="<?php //echo stripcslashes($_REQUEST["string"]); ?>" />

       <!--   <label>Citzen</label>

<select name="city">

<option value="">--</option></select>--><input type="submit" name="button" id="button" value="Filter" /></td>

        </tr></form>

        

        <tr>

        <td height="25" colspan="2"  valign="top"><div id="main_dashbord">

        <table cellpadding="0" cellspacing="0" > <tr>

        <td width="29%" height="25" bgcolor="#F0F0F0">Today Trips</td>

        <td width="43%" bgcolor="#F0F0F0"><a href="week_trips.php">This week</a></td>

        <td width="21%" bgcolor="#F0F0F0"><a href="month_trip.php">This month</a></td>

        <td width="7%" bgcolor="#F0F0F0">&nbsp;</td>

        </tr>

        <tr><td colspan="4"></td></tr>

        <tr id="tablehead">

          <td>Group</td>  <td>Activity</td>  <td>Driver</td>

          <td>Day</td>

        </tr>

      <?php $listed=1;//for numbering

	  $todaytrip=date('Y-m-d');

	   $tommorrow=date('Y-m-d',strtotime($todaytrip. ' + 1 days'));

	  $yesterday=date('Y-m-d',strtotime($todaytrip. ' - 1 days'));

		 $trip_sql = mysqli_query($conn,"SELECT i.trip_id as tid, t.no_of_visitors as vis, i.itinerary_id as it_id, t.group_name as g,i.date as d,i.title as day_n,i.details as itn FROM tbl_itinerary i join tbl_trips t on i.trip_id=t.trip_id WHERE i.deleted=0 AND t.archived=0 AND DATE(date) = '$todaytrip' and t.deleted=0  group by  t.trip_id ORDER BY t.arrival_date")or die(mysqli_error($conn)());

 $numofrows = mysqli_num_rows($trip_sql);



 if($numofrows == 0){?>

 <tr class="dshboardtriprows"><td>no trip today </td><td></td><td></td>

   <td></td>

 </tr>

 

	<?php 	}

	else{

for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($trip_sql); //get a row from our result set

	//$date  = $result['date'];

	//$title  = $result['title'];

	$it_id=$result['it_id'];



	?>



	<tr title="<?php echo $result['vis'];?> visitors" class="dshboardtriprows"><td><?php echo $i+1?>. &nbsp;<a href="view_trip.php?inc=<?php echo $result['tid'];?>" > <?php echo $result['g'];?></a> </td><td><?php echo $result['itn'];?></td><td>
    <?php
    //check if there are many drivers assigned, use the fuctions
	//else use the old way of assignment
	//get event id and date
	$strSQLEvent="SELECT event_id, s_date FROM events WHERE itinerary_id=".$it_id;
	$resultEvent = mysqli_query($conn,$strSQLEvent);
	
	if(mysqli_num_rows($resultEvent)>0)
	{
		$roweventdetails = mysqli_fetch_object($resultEvent);
		
		$event_id = $roweventdetails->event_id;
		$event_date = $roweventdetails->s_date;
		
		$strCalenderDrivers = getDriversVehicles($event_id, $event_date, false);
		
		if($strCalenderDrivers!="")
		{
			echo $strCalenderDrivers;			  
	    }
		else
		{
				?>
				
				<ul><?php $drquery=mysqli_query($conn,"SELECT c.name as nm FROM events e join categories c on e.category_id=c.category_id WHERE e.itinerary_id=$it_id and e.status>-1")or die(mysqli_error($conn)());

				while($dr = mysqli_fetch_array($drquery)){
					
					echo '<li>'. $dr['nm'].'</li>'; } ?></ul>
				<?php
		  
		}
		
	}
	
	mysql_free_result($resultEvent);
	
	?>
    </td>

	  <td><?php echo $result['day_n']?></td>

	</tr>



	

	<?php }}?>

      

        </table>

        

        

        </div></td>

        <td width="21%" bgcolor="#f0f0f0"  style="border-left:2px solid #97AB2D ;"><div id="dashboard_right"><?php // Construct a calendar to show the current mont

		

		 $cal = new Calendar; echo $cal->getCurrentMonthView();

		 

		 

		  ?></div><div id="dashboardnotices"><div id="changes_header">latest changes</div>

         <?php $changes_sql=mysqli_query($conn,"SELECT * FROM `tbl_changes` left join `tbl_users` on tbl_users.user_id=tbl_changes.user_id left join tbl_trips on tbl_trips.trip_id=tbl_changes.trip_id where tbl_trips.deleted=0 group by tbl_changes.trip_id order by change_date desc LIMIT 10") or die('Unable to get changes data'.mysqli_error($conn)());



if(mysqli_num_rows($changes_sql)==0){

	echo ' No changes have been made';

	} else{

		echo "<ul>";

while($changes=mysqli_fetch_array($changes_sql)){

$change_id=$changes['change_id'];

$user=$changes['user_id'];

$changed_data=$changes['chage_data'];

$date_changed=$changes['change_date'];

$tablechanged=$changes['tbl_changed_id'];

 $changed_item_id=$changes['changed_item_id'];

  $trp_name=$changes['group_name'];

  $trp=$changes['trip_id'];

echo "<li>";

echo " <span onMouseover='showIt()' style='color:red; display:block'>".$date_changed=$changes['change_date'].': </span>'; 

echo "<a href='view_trip.php?inc=$trp'>". $trp_name;

echo '</a> </span><strong>By </strong>';

echo '<strong id="changesname">'.$changes['full_name'].'</strong>';

//$by=mysqli_query($conn,"SELECT * FROM `tbl_changes` WHERE user_id=$user ") or die('Failed '.mysqli_error($conn)());

//$res=mysqli_fetch_array($by);

//echo  /*

//$res['name'].'</li></ul>';



}

}?></div></td>

      </tr>

    </table>

  </div>

    <div id="bilaz"></div>



</div>

  </form>

</div>

</div>

</body>

</html>