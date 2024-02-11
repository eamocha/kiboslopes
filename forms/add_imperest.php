<?php session_start();
include('../auth.php');
include('../lib/config.php'); 
//call functions
include('../lib/functions.php');
///$tripID = $_GET['inc'];
include('../roles/role_itin_add.php');

//get the list of active trips
$strSQLActiveTrip="SELECT trip_id,group_name FROM tbl_trips WHERE archived=0 AND deleted=0 ORDER BY arrival_date";
$resultActiveTrips = mysqli_query($conn,$strSQLActiveTrip);

//get list of drivers
$strSQLDrivers = "SELECT category_id,`name`,color,background FROM categories WHERE status=0 AND `name`<>'NOT ALLOCATED' ORDER BY sequence";

$resultDrivers = mysqli_query($conn,$strSQLDrivers);
//when trip is selected, automatically input the trip dates



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add Imprest</title>

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>

<script  src="../js/datepicker/jqueryui.js" type="text/javascript"></script>

<script src="../js/js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="../js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

 <link  rel="stylesheet" href="../css/colorbox.css" media="screen"/>

<script src="../js/jquery.colorbox.js"></script> 
<script type="text/javascript" src="../js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.timepicker.css" />

<script type="text/javascript" language="javascript">

$(document).ready(function(){

$( "#txtdutydatefrom" ).datepicker();
$( "#txtdutydateto" ).datepicker();

	  <!--date picker range-->

		//in and out dates

		$( "#idate1" ).datepicker({

			defaultDate: "+1w",

			changeMonth: true,

			numberOfMonths: 1,

			onSelect: function( selectedDate ) {

				$( "#pud2" ).datepicker( "option", "minDate", selectedDate );

			}

		});

		$( "#idate2" ).datepicker({

			defaultDate: "+1w",

			changeMonth: true,

			numberOfMonths: 1,

			onSelect: function( selectedDate ) {

				$( "#idate2" ).datepicker( "option", "maxDate", selectedDate );

			}

		});

		//check if the operations checkbox is checked, either display or hide the operations div
		if($('#operation').is(':checked')){

				$('#op1').show();

				$('#op').show();

		}else{

				$('#op1').hide();

				$('#op').hide();

		}



	/*auto complete for voucher*/
	var data = [
		{ label: "Will have lunch", value: "Will have lunch" },
		{ label: "No lunch", value: "No lunch" }
	];

	$("#hotel_comment")
	.autocomplete({
		source: data,
		minLength: 0
	})


	.focus(function() {
		$(this).autocomplete('search', $(this).val())
	});		

	$('#put').timepicker({ 'timeFormat': 'H:i' });

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

#itindetails{

width:200px;
}

#tblHotelRoomRates td
{
	border-bottom:#c0c0c0 1px solid;
	border-right:#EAEAEA 1px solid;
}

#tblHotelRoomRates td.topborder
{
	border-top:#c0c0c0 1px solid;
	background-color:#F0F0F0;
}

</style>

</head><?php


?>
<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="../images/logo.png" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?> | <a href="../lib/logout.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title">Add Imprest</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="../dashboard.php">dashboard</a></li>

     <li><a href="../reservations.php">RESERVATIONS</a></li>

      <li><a href="../accounts.php">ACCOUNTS </a></li>

    <li >&nbsp;&nbsp;&nbsp;OPERATIONS &nbsp;&nbsp;&nbsp;</li>

    <li><a href="../administration.php">ADMIN</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">
        <li><a title="KIBO SLOPES" href="../cars_drivers.php">Cars and Drivers</a></li>
        <li><a class=''  title="KIBO SLOPES" href="../car_hire.php">Car Hire</a></li>
        <li><a class=''  title="KIBO SLOPES" href="../calender/index.php" target="_blank">Calender</a></li>
        <li><a class=''  title="KIBO SLOPES" href="../calender_new/index.php" target="_blank">New Calender</a></li>
        <li><a href="../imprests_staff.php">Imprests</a></li>
    </ul>

</div>

<div id="center_pane_big">

<table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td  height="62" align="left"   valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="../images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> More Details</a></div>

            <ul>



              <li>

                <div id="sub_menu_icon"><img src="../images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="add_visitor.php?inc=<?php echo $tripID?>" title="KiboslopeS" style="padding-left:25px;">Add Visitors</a></li>

                  </ul>

                </li>

                <li><div id="sub_menu_icon"><img src="../images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul> <li><a title="KiboslopeS" style="padding-left:25px;" class="example5" href="../report_print.php?inc=<?php echo $tripID?>">Print</a></li>

                  </ul>

                </li>

              <li>

                <div id="sub_menu_icon"><img src="../images/report_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                 <li><a title="KiboslopeS" style="padding-left:25px;" class="example5" href="../print.php?inc=<?php echo $tripID?>">Print</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>
      </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF">
        <form id="imprestform"  name="imprestform" class="formular" method="post" action="../add_imprest_exec.php">
          <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Trip Name</td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">
                  <select name="cboTripId" id="cboTripId">
                  		<option value="">Select Trip</option>
                        <?php
                        while($rowTrip = mysqli_fetch_object($resultActiveTrips))
					    {
							?><option value="<?php echo $rowTrip->trip_id;?>"><?php echo $rowTrip->group_name;?></option><?php
						}
						?>
                  </select>
              </td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>
            </tr>
            <tr>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Trip Staff</td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">
                  <select name="cboTripStaffId" id="cboTripStaffId">
                  		<option value="">Select Staff</option>
                        <?php
                        while($rowStaff = mysqli_fetch_object($resultDrivers))
					    {
							?><option value="<?php echo $rowStaff->category_id;?>" style="background-color:<?php echo $rowStaff->background;?>;color:<?php echo $rowStaff->color;?>;"><?php echo $rowStaff->name;?></option><?php
						}
						?>
                  </select>
              </td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>
            </tr>
            <tr>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Duty Dates</td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">From: 
                <input type="text" name="txtdutydatefrom" id="txtdutydatefrom" /></td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">To: 
                <input type="text" name="txtdutydateto" id="txtdutydateto" /></td>
            </tr>
            <tr>
              <td colspan="3" height="33" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid"><strong>Imprest Allocation in US Dollars (USD)</strong></td>
              </tr>
            <tr>
              <td colspan="3"><table width="40%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                  <td height="24"  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; border-right:#EAEAEA 1px solid"><strong>Description</strong></td>
                  <td height="24"  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; border-right:#EAEAEA 1px solid"><strong>Dollars Allocated</strong></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Client Park Fee</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="usdclientparkfees" id="usdclientparkfees" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Hotels</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="usdhotelfees" id="usdhotelfees" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Excursions</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="usdexcusionsfees" id="usdexcusionsfees" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Others - 1</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="usdothers1" id="usdothers1" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Others - 2</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="usdothers2" id="usdothers2" /></td>
                </tr>
              </table></td>
              </tr>
            <tr>
              <td colspan="3" height="33" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid"><strong>Imprest Allocation in Kenya Shillings (KSH)</strong></td>
              </tr>
            <tr>
              <td colspan="3"><table width="40%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                  <td height="24"  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; border-right:#EAEAEA 1px solid"><strong>Description</strong></td>
                  <td height="24"  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; border-right:#EAEAEA 1px solid"><strong>Shillings Allocated</strong></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Client Park Fee</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="kshclientparkfees" id="kshclientparkfees" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Driver's Park Fee</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="kshdriverparkfees" id="textfield9" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Car Park Fees</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="kshcarparkfee" id="textfield10" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Travel Allowance</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="kshtravelallowance" id="textfield11" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Others - 1</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="kshothers1" id="textfield12" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Others - 2</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="kshothers2" id="textfield13" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Others - 3</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="kshothers3" id="textfield14" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Others - 4</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input type="text" name="kshothers4" id="textfield15" /></td>
                </tr>
              </table></td>
              </tr>
            <tr>
              <td colspan="3" height="33" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid"><strong>Other Allocations</strong></td>
              </tr>
            <tr>
              <td colspan="3"><table width="40%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                  <td height="24"  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; border-right:#EAEAEA 1px solid"><strong>Item(s)</strong></td>
                  <td height="24"  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; border-right:#EAEAEA 1px solid"><strong>Description</strong></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Mineral Water (Bottels)</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input name="mineralwater" type="text" id="textfield16" size="50" maxlength="255" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Smart Cards</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input name="smartcards" type="text" id="textfield17" size="50" maxlength="255" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Binoculars</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input name="binoculars" type="text" id="textfield18" size="50" maxlength="255" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Sim Cards</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input name="simcards" type="text" id="textfield19" size="50" maxlength="255" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Others -1 </td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input name="itemothers1" type="text" id="textfield20" size="50" maxlength="255" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Others -2 </td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input name="itermother2" type="text" id="textfield21" size="50" maxlength="255" /></td>
                </tr>
                <tr>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">Others - 3</td>
                  <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><input name="itemother3" type="text" id="textfield22" size="50" maxlength="255" /></td>
                </tr>
              </table></td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="cmdAddImprest" id="cmdAddImprest" value="Add Imprest &amp; Download Form" /></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </form>

        </td>

      </tr>

    </table></div>

    <div id="bilaz"></div>



</div>



</div>

</div>

</body>

</html>