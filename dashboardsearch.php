<?php

session_start();

include('auth.php'); 



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



<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

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

    <form id="form1" name="form1" method="post" action="search.php"> <tr>

        <td width="23%" height="30" bgcolor="#97AB2D"><span style="color:#FFF; font-weight:bold"><?php echo date("F j, Y, g:i a");?></span></td>

        <td height="30" colspan="3" bgcolor="#97AB2D"><a href="dashboard.php">Filter Search</a></td>

        </tr></form>

       

      <tr>

        <td colspan="3">&nbsp;</td>

        <td width="24%" align="center" rowspan="4" style="border-left:2px solid #97AB2D ;" bgcolor="#f0f0f0"><?php // Construct a calendar to show the current mont

		

		 $cal = new Calendar; echo $cal->getCurrentMonthView();

		 

		 

		  ?></td>

      </tr>

      <tr>

        <td height="35" colspan="3" bgcolor="#F0F0F0">Result Set</td>

        </tr>

      <tr>

        <td colspan="3" id="result">

 

         <?php

		 $listed=1;

		$SETTINGS["data_table"]='tbl_trips';

		$from=clean($_REQUEST["from"]);

		$to=clean($_REQUEST["to"]);

		$search_string='';

		$del="AND tbl_trips.deleted=0 AND tbl_trips.archived=0";

if ($_REQUEST["string"]!='') {

	$search_string = " or (group_name LIKE '%".clean($_REQUEST["string"])."%' OR team_leader LIKE '%".clean($_REQUEST["string"])."%')";	

}

if (isset($_REQUEST["from"]) and isset($_REQUEST["to"])) {

	$sql = "SELECT * FROM tbl_trips where arrival_date  BETWEEN '$from' AND '$to' ".$search_string.$del;

} else if (!isset($from)) {

	$sql = "SELECT * FROM tbl_trips join tbl_itinerary  on tbl_trips.trip_id=tbl_itinerary.trip_id WHERE date=$to ".$search_string.$del ;

} else if (!isset($to)) {

$sql = "SELECT * FROM tbl_trips join tbl_itinerary  on tbl_trips.trip_id=tbl_itinerary.trip_id WHERE date=$from ".$search_string.$del ;

} else {

	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE trip_id=0".$search_string;

}

$sql = $sql." ORDER BY arrival_date";





$sql_result = mysqli_query ($sql) or die ('request "Could not execute SQL query" '.$sql. mysqli_error($conn)());

if (mysqli_num_rows($sql_result)>0) {

	while ($row = mysqli_fetch_assoc($sql_result)) {

 $trip=$row['trip_id'];

 echo "<a href='view_trip.php?inc=$trip'><span  style=' font-size:110%;  text-transform:uppercase'>".$row['group_name']."</span></>.";

 echo '&nbsp;&nbsp;&nbsp;tour leader <b>'.$row['team_leader'].'</b>';

 echo ','.$row['no_of_visitors'].' visitors..........'; $row['arrival_date']; $row['dep_date'];

 

echo '</a><br />';

echo '<br />';

	$listed++;

	}

	

} 

else {

?>

<span style=" font-weight:bold; padding:50px; font-size:120%; margin-left:30px; margin-top:30px;">No results found for your search criteria!

<a href="dashboard.php"><p>Try again here</p></a></span>

<?php	

}

?>

       <span style="font-size:100%; float:right; font-style:italic; color:fafafa">Returned<b> <?php echo $listed-1;?> </b>Results </span> </td>

        </tr>

      <tr>

        <td id="res" colspan="3" rowspan="2" style=" border-top:1px solid #97AB2D; border-bottom:1px solid #f0f0f0"><p>&nbsp;</p>

        <script id="source" language="javascript" type="text/javascript">



  $(function () 

  {

    //-----------------------------------------------------------------------

    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/

    //-----------------------------------------------------------------------

    $.ajax({                                      

      url: 'generalsearch.php',                  //the script to call to get data          

      data: "",                        //you can insert url argumnets here to pass to api.php

      caching: false,                        //for example "id=5&parent=6"

      dataType: 'json',                //data format      

      success: function(data)          //on recieve of reply

      {

        var id = data[0];              //get id

        var vname = data[1]; 

		var name=data[2];          //get name

        //--------------------------------------------------------------------

        // 3) Update html content

        //--------------------------------------------------------------------

        $('#result').html("<b>id: </b>"+id+"<b> name: </b>"+vname+" name2: "+name); //Set output element html

        //recommend reading up on jquery selectors they are awesome 

        // http://api.jquery.com/category/selectors/

      } 

    });

  }); 



  </script> <form id="search" name="search" method="post" action=""> <p> Search anything here</p>

          <p><input type="text" size="35" placeholder="Enter Search Term" class="text-input"  id="q" name="q"/> <a href="#"  name="submit" id="submit"  >SEARCH </a></p></form></td>

        </tr>

     

      <tr>

        <td bgcolor="#f0f0f0" style="border-left:2px solid #97AB2D ; border-top:2px solid #97AB2D; border-bottom:1px solid #97AB2D">Alerts and Notifications</td>

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