<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];



include('../lib/config.php'); 



//call functions

include('../lib/functions.php');

$tripID = $_GET['inc'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<link   rel="stylesheet" href="../css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>



<script src="../js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script  src="../js/datepicker/jqueryui.js" type="text/javascript"></script>

        

    <script>

$(function() {

	//initialize 

	 $("#flight").validationEngine("attach");

	 //charcter cases

	 //character cases

	$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});

	  <!--date picker-->

	  

			$('#idate').datepicker();

			$('#planeno').keyup(function(){

    this.value = this.value.toUpperCase();});	$('#reserve_ref').keyup(function(){

    this.value = this.value.toUpperCase();});

		

	});

	</script>

        

        

       



        <style type="text/css">

		body{font:12px/1.2 Verdana, Arial, san-serrif; padding:0 10px;}

		

		h2{font-size:13px; margin:15px 0 0 0;}

	.washana {

	color: #C03;

}

#currency2{

	width:100px;

	}

	#servedby{

		color:#fff;

		font:"Arial Black", Gadget, sans-serif, Helvetica, sans-serif;

		}

    </style>

</head>



<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="../images/logo.png" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?> | <a href="../login.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title">Trip Management</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="../dashboard.php">dashboard</a></li>

     <li>&nbsp;&nbsp;&nbsp;RESERVATIONS &nbsp;&nbsp;&nbsp;</li>

      <li><a href="../accounts.php">ACCOUNTS </a></li>

    <li ><a href="../operations.php">OPERATIONS </a></li>

    <li><a href="../administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">

      

      <li ><a title="KIBO SLOPES" href="../view_trip.php?inc=<?php echo $tripID;?>"><img src="../images/icon2.png" alt="" width="27" height="21" />  Trip</a></li>

      <li style="background:#F0F0F0;"><a  title="KIBO SLOPES" href="../flights.php?inc=<?php echo $tripID?>"><img src="../images/icon2.png" width="27" height="21" />Flights</a></li>

      

      <li ><a title="KIBO SLOPES" href="../hotels.php?inc=<?php echo $tripID?>"><img src="../images/icon2.png" alt="" width="27" height="21" />Hotels</a></li>

    </ul>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="250" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="../images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Flights </a></div>

            <ul>

            <li>

                <div id="sub_menu_icon"><img src="../images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                    <li><a class='example5' href="add_flight.php?inc=<?php echo $tripID?>" title="" style="padding-left:25px;">Add New Flight</a></li>

                  </ul>

                </li>

               

             

              <li>

                <div id="sub_menu_icon"><img src="../images/report_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="add_flight.php?inc=<?php echo $tripID?>" title="Kiboslopes" style="padding-left:25px;">Print Form</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td width="379" height="62" align="left" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9; padding-top:0"> <a class='example5' href="add_flight.php?inc=<?php echo $tripID?>" title="" style="padding-left:0;"><img src="../images/flight-status-icon-set-vector.png" width="50" height="33" alt="flight" /></a></td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"> <?php $trp_name=mysqli_query($conn,"select group_name from tbl_trips where trip_id=$tripID") or die(mysqli_error($conn)());

$r=mysqli_fetch_array($trp_name);

echo $r['group_name'];?></td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF">

        

        

        <form id="flight"  name="flight" class="formular" method="post" action="../add_flight-exec.php?inc=<?php echo $tripID?>"><table width="100%" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="4" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Add Flight  Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="1way" name="flight_type" checked="checked" value="1"/>One way&nbsp;&nbsp;&nbsp;<input  type="radio" id="twoway" name="flight_type" value="2"/> Return journey</td>

        <td height="24" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">&nbsp;</td>

      </tr>

      <tr>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">Date: <br />

        <input  type="text"  class="validate[required,custom[date]] text-input" id="idate" name="idate" value="" size="30" /></td>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">Departure Time<br />

          <input type="text"  class="validate[required] text-input"  name="dep_time" id="dep_time" value="" size="30" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Arrival Time<br />

        <input type="text"  class="validate[required] text-input"  name="arr_time" id="arr_time" value="" size="30" /></td>

      </tr>

      <tr>

        <td align="left" valign="top" bgcolor="#FFFFFF">From<br />

        <input name="from" size="12" class="validate[required] text-input" value="" id="from" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">To<br />

          <input name="to"size="12" class="validate[required] text-input" value="" id="to" /></td>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">Airline Name<br />

          <input name="airline"   size="30" id="airline" class="text-input"  />

        </td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Flight No.<br/>

            <input name="planeno"size="30" class=" text-input" value="" id="planeno" />

     </td>

      </tr><tr>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">Airline Contacts<br />

          <input type="text" size="30" name="airlinecontact" id="airlinecontact" value="" class="text-input" /></td>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">

          Status<br />

          <select style="height:auto" name="status" id="status" class="validate[required] text-input" >

    <option value="" selected="selected">-- select one --</option>

    <option value="Pending">pending</option>

    <option value="Reserved">reserved</option>

    <option value="Confirmed">Confirmed</option>

  </select></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Currency units<br /><input type="text" class="text-input" id="currency" name="currency" placeholder="eg KSh, USD,etc" value="" size="10" /></td></tr>

      <tr>

        <td align="left" valign="top" bgcolor="#FFFFFF">No. of adults<br/>

          <input name="no_adults" size="5" class=" text-input" value="" id="no_adults" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Fare p/person<br />

          <input name="adult_fare" size="5" class=" text-input" value="" id="adult_fare" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">

         No. of Kids<br />

            <input name="no_kids"size="5" class=" text-input" value="" id="no_kids" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Fare/kid<br />

          <input name="kid_fare" size="5" class=" text-input" value="" id="kid_fare" />

          </td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Reservation Reference<br/>

          <input name="reserve_ref" size="30" class=" text-input" value="" id="reserve_ref" />          <br /></td></tr> <tr>

              <td height="35" colspan="3" align="left">Comments<br />

                  <input name="comments"size="30" class=" text-input" value="" id="comments" /></td>

      <td height="35" colspan="2" align="left"><input type="submit" name="button" id="button" value="  Save   " /></td>

      </tr>

      <tr id="servedby"class="italix">

        <td height="20" colspan="2" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="3" align="center" bgcolor="#333333">Served By: 

          <?php echo $_SESSION['f_name']?></td>

      </tr>

    </table></form></td>

      </tr>

     

    </table>



<div id="flash"></div>

<div id="display"></div>

</div>

    <div id="bilaz"></div>



</div>



</div>

</div>

</body>

</html>