<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];



include('lib/config.php'); 

include("Calendar.php");



//call functions

include('lib/functions.php');



class MyCalendar extends Calendar { function getDateLink($day, $month, $year) { // Only link the first day of every month

		  $link = ""; if ($day == 1) { $link = "first.php"; } return $link; } }

		  

/*class MyCalendar extends Calendar { function getCalendarLink($month, $year) { // Redisplay the current page, but with some parameters // to set the new month and year

 $s = getenv('SCRIPT_NAME'); return "$s?month=$month&year=$year"; } }

 // If no month/year set, use current month/year

 $month=date('M');

 

 $year=date('Y');

   getdate(time()); if ($month == "") { $month = $d["mon"]; } if ($year == "") { $year = $d["year"]; } $cal = new MyCalendar; echo $cal->getMonthView($month, $year);

*/?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>

<link href="css/styles.css" rel="stylesheet" type="text/css" />

 <!-- Validation Engine-->

 	<script src="js/jquery.min.js"></script>



    <script src="js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>

		<script src="js/validation/jquery.validationEngine.js" type="text/javascript"></script>

         <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

        <!--Validation End-->

        <!-- Color Box -->

        <link media="screen" rel="stylesheet" href="css/colorbox.css" />

        <script src="js/jquery.colorbox.js"></script> 

         <!-- Color Box End -->



        

     <script>   $(document).ready(function(){



		

			$("#MyForm").validationEngine();

			$(".example5").colorbox();



			

		});</script>

         <style type="text/css">

		.calendarHeader { font-weight: bolder; color: #CC0000; background-color: #FFFFCC; } .calendarToday { background-color: #FFFFFF;

		border: 1px solid #00F; } .calendar { background-color: #FFFFCC; }

		 </style>

        

</head>



<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="images/logo.png" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName ?> | <a href="login.php">Logout</a></div>

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

      <tr>

        <td bgcolor="#97AB2D" height="30" colspan="5"><span style="color:#FFF; font-weight:bold"><?php  $day = date('w');

echo  $week = date('F d', strtotime('-'.$day.' days'));

 ?></span><b> To </b>

 <span style="color:#FFF; font-weight:bold"><?php

 echo $week_end = date('F d', strtotime('+'.(6-$day).' days'));

 ?></span></td>

        </tr>

      <tr>

        <td colspan="4">&nbsp;</td>

        <td width="24%" align="center" rowspan="8" style="border-left:2px solid #97AB2D ;" bgcolor="#f0f0f0"><p>

          <?php // Construct a calendar to show the current mont

		

		 $cal = new Calendar; echo $cal->getCurrentMonthView();

		 

		 

		  ?>

        </p>

          <p>&nbsp; </p>

          <p style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0">Alerts and Notifications</p></td>

      </tr>

      <tr>

        <td width="24%" height="25" bgcolor="#F0F0F0"><a href="dashboard.php">Today Trips</a></td>

        <td width="33%" bgcolor="#F0F0F0">This week</td>

        <td width="24%" colspan="2" bgcolor="#F0F0F0"><a href="month_trip.php">This month</a></td>

        </tr>

      <tr>

        <td colspan="4">&nbsp;</td>

        </tr>

      <tr>

        <td height="30" style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0"><strong>Group</strong></td>

        <td style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0"><strong>Activity</strong></td>

        <td style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0"><strong>Driver</strong></td>

        <td style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0"><strong>Day</strong></td>

      </tr>

      <?php  $listed=1;

      $day = date('w');

 $week_start = date('Y-m-d', strtotime('-'.$day.' days'));

 $week_end = date('Y-m-d', strtotime('+'.(6-$day).' days'));

 //$todaytrip=date('Y-m-d');

		//$thisweek=strtotime(date('Y-m-d'))+(7*86400);

		 //$week = date('Y-m-d',$thisweek);

		 $trip_sql = mysqli_query($conn,"SELECT  * FROM  tbl_itinerary WHERE deleted=0 and DATE(date) BETWEEN '$week_start' and '$week_end'")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($trip_sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="4" align="center" valign="middle" bgcolor="#fff" style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0" class="italix">No Trip activities This week!</td>

            </tr>

	<?php	}

	else

for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($trip_sql); //get a row from our result set

	$date  = $result['date'];

	$title  = $result['title'];

	$details  = $result['details'];

	$itnid=$result['itinerary_id'];

$singles=$result['singles'];

$twins=$result['twins'];

$doubles=$result['doubles'];

$triples=$result['triples'];

$trip_id  = $result['trip_id'];



/* $result_tickets = mysqli_fetch_array($trip_sql); //get a row from our result set

	$trip_id  = $result_tickets['trip_id'];

	$group_name  = $result_tickets['group_name'];

	$team_leader  = $result_tickets['team_leader'];

	$arrival_date  = $result_tickets['arrival_date'];

	$dep_date  = $result_tickets['dep_date'];

		$no_of_visitors  = $result_tickets['no_of_visitors'];*/

	?>

      <tr>

        <td  height="25" style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0"><?php //echo '('.$listed.'). '?><a href="view_trip.php?inc=<?php echo $trip_id?>"><?php

		 $trip = mysqli_query($conn,"SELECT  * FROM   tbl_trips WHERE trip_id=$trip_id and deleted=0")or die(mysqli_error($conn)());

	

		

		 $result_tickets = mysqli_fetch_array($trip); //get a row from our result set

		 $driver  = $result_tickets['driver_id'];

	$trip  = $result_tickets['trip_id'];

	echo $group_name  = $result_tickets['group_name'];

	?></a></td>

        <td  height="25" style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0"><?php echo $details ?> 

		</td>

        <td  height="25" style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0"><?php

			 

 /* $sql = mysqli_query($conn,"SELECT * FROM tbl_users WHERE user_id=$driver and deleted=0")or die(mysqli_error($conn)());

 //$numofrows=mysqli_num_rows($sql);

  while($resultdrive= mysqli_fetch_array($sql)){

  

	$full_name  = $resultdrive['full_name']; 

	$user_id=$resultdrive['user_id'];

	if($numofrows<0)

	 echo '/<b>not assigned</b> ';

			 else{

				 echo $full_name;

				 }

				 $listed++;

  }

	*/

	?></td>

        <td  height="25" style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0"><?php  echo $weekday = date("D,d", strtotime($date));?></td>

        </tr>

        <?php }?>

      <tr>

        <td  height="25">&nbsp;</td>

        <td  height="25">&nbsp;</td>

        <td  height="25" colspan="2"> <span style="font-size:100%; float:right; font-style:italic; color:f1f1f1">Returned <?php echo $listed-1;?> Results </span> </td>

        </tr>

      <tr>

        <td  height="25" style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0" colspan="4">&nbsp;</td>

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