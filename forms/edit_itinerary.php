<?php session_start();
include('../auth.php'); 
include('../lib/config.php'); 
//call functions

include('../lib/functions.php');

$tripID=$_REQUEST['inc'];

$itnid = $_GET['itnid'];


$currentPage="itenerary_page";



include('../roles/sales_roles.php');

//get the details for the particular itenerary
$itn_sql = mysqli_query($conn,"SELECT  * FROM  tbl_itinerary WHERE itinerary_id = $itnid")or die(mysqli_error($conn)());

    $result = mysqli_fetch_array($itn_sql); //get a row from our result set

	$itenerary_type_id =  $result['itenerary_type_id'];

	$date  = $result['date'];

	$day  = $result['title'];

	$details  = $result['details'];	

	$hotel_id  = $result['hotel_id'];

	$remarks  = $result['remarks'];

	$singles  = $result['singles'];

	$doubles  = $result['doubles'];

	$twins  = $result['twins'];

	$triples  = $result['triples'];

	$child_beds=$result['child_beds'];

	$family_rooms=$result['family_rooms'];



//hotel details
$trip_hotel_id=0;
$booking="";
$status="";
$voucher_remarks="";
$pay_due="";


$resultHotelDetails = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id=$itnid and  trip_id = $tripID  ")or die(mysqli_error($conn)());

if(mysqli_num_rows($resultHotelDetails)>0){

	$rowHotelDetails = mysqli_fetch_array($resultHotelDetails);

	$trip_hotel_id  = $rowHotelDetails['trip_hotel_id'];

	$booking  = $rowHotelDetails['booking'];

	$status  = $rowHotelDetails['status'];

	$voucher_remarks=$rowHotelDetails['voucher_remarks'];

	$pay_due=$rowHotelDetails['payment_due_date'];


}




//get the hotel charges details
$hotel_charges_id=0;
$used_currency="";
$hotel_reference="";
$single_price="";
$db_price="";
$twin_price="";
$trp_price="";
$kid_price="";
$family_room_price="";
$extra_charges=0;
$extra_cost_details="";



$resultCharges = mysqli_query($conn,"SELECT * FROM tbl_hotel_charges WHERE trip_hotel_id=$trip_hotel_id")or die(mysqli_error($conn)());


if(mysqli_num_rows($resultCharges)>0)
{
	$rowCharges = mysqli_fetch_array($resultCharges);

	$hotel_charges_id = $rowCharges['hotel_charges_id'];
	$used_currency = $rowCharges['used_currency'];
	$hotel_reference = $rowCharges['hotel_reference'];
	$single_price = $rowCharges['single_price'];
	$db_price = $rowCharges['db_price'];
	$twin_price = $rowCharges['twin_price'];
	$trp_price = $rowCharges['trp_price'];
	$kid_price = $rowCharges['kid_price'];
	$family_room_price = $rowCharges['family_room_price'];

	$extra_charges = $rowCharges['extra_charges'];
	$extra_cost_details = $rowCharges['extra_cost_details'];

}


//get events for operation
$event_id=0;
$event_type=0;
$title="";
$description="";
$category_id=0;
$venue="";
$s_date="";
$e_date="";
$s_time="";
$user_id=0;
$itinerary_id=0;
$remarks="";

$pickuppoint="";
$dropoffpoint="";
$venuearray="";


$strSQLEvents="SELECT event_id,event_type,title, description, category_id, venue, s_date, e_date, s_time,user_id,itinerary_id,remarks FROM events WHERE itinerary_id=$itnid";
$resultEvents = mysqli_query($conn,$strSQLEvents) or die(msyql_error());

if(mysqli_num_rows($resultEvents)>0)
{
	$rowEvents = mysqli_fetch_array($resultEvents);
	$event_id=$rowEvents['event_id'];
	$event_type=$rowEvents['event_type'];
	$title=$rowEvents['title'];
	$description=$rowEvents['description'];
	$category_id=$rowEvents['category_id'];
	$venue=$rowEvents['venue'];
	$s_date=$rowEvents['s_date'];
	$e_date=$rowEvents['e_date'];
	$s_time=$rowEvents['s_time'];
	$user_id=$rowEvents['user_id'];
	$itinerary_id=$rowEvents['itinerary_id'];
	$remarks=$rowEvents['remarks'];

	$venuearray=explode(" - ",$venue);

	if(is_array($venuearray) and count($venuearray)>1)
	{
		$pickuppoint=$venuearray[0];
		$dropoffpoint=$venuearray[1];
	}


}



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Itinerary</title>

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

	$('#hot').hide();

	$('#hot1').hide();




	$('.hotel').show();   

	$('#include_hotel').change(function(){

				if($(this).is(':checked')){

				   $('.hotel').show();

				   $('#hot').hide();

	$('#hot1').hide();

				}else{

					 $('.hotel').hide();

				}

			});

	// operations 

	 $('#op1').hide();   
	 $('#op').hide();

	$('.operation').change(function(){

				if($(this).is(':checked')){

				   $('#op1').show();

					 $('#op').show();

				}else{

					 $('#op1').hide();

					   $('#op').hide();

				}

			});

		//initialize ...............................................................................................................

		 $("#itinerary").validationEngine("attach");

				$('.example5').colorbox({ 

		onComplete : function() { 

		   $(this).colorbox.resize(); 

		}    

	});

	$.colorbox.resize();

	 //charcter cases....................................................................................

	 //character cases

	$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});

//$( "#pud" ).datepicker();

$( "#payment_due" ).datepicker();

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


function confirmDeletion(){
      var confirmed = confirm("Are you sure you want to delete this itinerary?");
      return confirmed;
}

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





$tripID = $_GET['inc'];

include('../roles/role_itin_add.php');

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

  <div id="content_box_title">Edit Itinerary</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="../dashboard.php">dashboard</a></li>

     <li>&nbsp;&nbsp;&nbsp;RESERVATIONS &nbsp;&nbsp;&nbsp;</li>

      <li><a href="../accounts.php">ACCOUNTS </a></li>

    <li ><a href="../operations.php">OPERATIONS </a></li>

    <li><a href="../administration.php">ADMIN</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">



      <li><a title="KIBO SLOPES" href="../view_trip.php?inc=<?php echo $tripID;?>"><img src="../images/icon2.png" alt="" width="27" height="21" />  Trip</a></li>

      <li><a title="KIBO SLOPES" href="../flights.php?inc=<?php echo $tripID?>"><img src="../images/icon2.png" width="27" height="21" />Flights</a></li>



      <li><a title="KIBO SLOPES" href="../hotels.php?inc=<?php echo $tripID?>"><img src="../images/icon2.png" alt="" width="27" height="21" />Hotels</a></li>

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

                <ul> <li><a title="KiboslopeS" style="padding-left:25px;" class="example5" href="../report_print2.php?inc=<?php echo $tripID?>">Print</a></li>

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

        <form id="itinerary"  name="itinerary" class="formular" method="post" action="../edit_itinerary_exec.php?inc=<?php echo $tripID?>">

        <table width="100%" border="0"  cellspacing="0">

         <tr>

        <td height="23"  bgcolor="#F4F4F4" colspan="4" style="border-bottom:#690 3px solid;

">Update Itinerary  Details: to <strong> <?php 
$trp_name=mysqli_query($conn,"select group_name,arrival_date,arrival_time,dep_date,dep_time from tbl_trips where trip_id=$tripID") or die(mysqli_error($conn)());

$r=mysqli_fetch_array($trp_name);
$startdate= $r['arrival_date'];//start date equals arrival date
$intIteneraryDay=0;

echo $r['group_name'];?></strong> (Arrival Date: <i><?php echo date("D jS M Y", strtotime($r['arrival_date']));?></i>, Departure Date: <i><?php echo date("D jS M Y", strtotime($r['dep_date']));?></i>)</td>

      </tr><tr><td width="13%"  align="left" valign="top" bgcolor="#FFFFFF">Day<br />

       <input type="text" name="day" id="day" value="<?php echo $day;?>" size="5" class="text-input" />

       </td>

        <td width="16%"   align="left" valign="top" bgcolor="#FFFFFF">Date: <br />
		<input  type="text"  class="validate[required,custom[dateFormat]] text-input" id="idate1" name="idate1" value="<?php echo date('Y-m-d',strtotime($date));?>" size="12" /></td>
		<td width="42%" align="left" valign="top"  bgcolor="#FFFFFF">Itinerary Details: <br />

        <textarea name="itindetails" class="validate[required]" id="itindetails"><?php echo $details;?></textarea></td>

        <td width="29%" align="left" valign="top" bgcolor="#FFFFFF">Itinerary Remarks:<br />

          <textarea name="srequirements" id="srequirements"><?php echo $remarks;?></textarea></td>

          </tr>


<tr>
        <td colspan="3"  align="left" valign="top" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid">Itinerary Countries:<br />

        <?php

		  $strSQLItineraryCountries = "SELECT countryid,countryname,shortname FROM tbl_countries WHERE isactive=1 ORDER BY orderinlist";
		  $resultSQLCountries = mysqli_query($conn,$strSQLItineraryCountries);



		  //get array of all countries for the itinerary
		  $strSQLSelectedCountries = "SELECT countryid FROM tbl_itinerary_country WHERE itinerary_id=".$itnid;
		  $resultSelectedCountries = mysqli_query($conn,$strSQLSelectedCountries);

		  $rows_selectedcountries=array();

		  while($row_selectedcountry = mysqli_fetch_array($resultSelectedCountries))
		  {
			  $rows_selectedcountries[] = $row_selectedcountry['countryid'];
		  }


		  //var_dump($rows_selectedcountries);

		  ?>
           <?php
           		while($rowCountry = mysqli_fetch_object($resultSQLCountries))
				{

					$boolCountryExists=false;

					if(in_array($rowCountry->countryid,$rows_selectedcountries))
					{
						$boolCountryExists=true;
					}


		   ?>

                  <input type="checkbox" name="chkItineraryCountryId[]" title="<?php echo $rowCountry->countryname;?>"  id="itinerarycountry_<?php echo $rowCountry->countryid;?>" value="<?php echo $rowCountry->countryid;?>" <?php if($boolCountryExists==true) echo "checked='checked'";?> />
            	  <label for="itinerarycountry_<?php echo $rowCountry->countryid;?>"   title="<?php echo $rowCountry->countryname;?>"><?php echo $rowCountry->shortname;?>&nbsp;&nbsp;&nbsp;</label>
            <?php
				}
			?>

            </td>
        <td align="left" valign="top" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid">Itinerary Type:<br />
		  <?php

		  $strSQLItineraryType = "SELECT itenerary_type_id,itinerary_type_name FROM tbl_itinerary_types WHERE isactive=1 ORDER BY orderinlist";
		  $resultSQLItineraryType = mysqli_query($conn,$strSQLItineraryType);
		  ?>
           <select class="validate[required] text-input" id="itenerary_type_id" name="itenerary_type_id">
           <option value="">-- select type --</option>
           <?php
           		while($rowT = mysqli_fetch_object($resultSQLItineraryType))
				{
		   ?>
                <option value="<?php echo $rowT->itenerary_type_id;?>"<?php if($itenerary_type_id==$rowT->itenerary_type_id) echo ' selected="selected"';?>><?php echo $rowT->itinerary_type_name;?></option>
            <?php
				}
			?>
          </select>
         </td>
      </tr>


           <tr>

        <td height="24" colspan="4" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">

          <span id="hotdetails" >Include Hotel details</span><input  type="checkbox" name="include_hotel" checked="checked" id="include_hotel"/>

 |        <a href="add_hotel.php?inc=<?php echo $tripID ?>" class="example5" ><span id="add" style="color:#0000FF">Add new hotel name</span></a></td> 

      </tr>

      <tr class="hotel">



        <td height="35" colspan="2" align="left" valign="top">Select Hotel:<br />  <select name="hotel" id="hotel" class="validate[condRequired[include_hotel]] text-input" >

          <option value="" selected="selected">-- select one --</option>

          <?php  

 		 $sql = mysqli_query($conn,"SELECT * FROM tbl_hotels where deleted=0 ORDER BY hotel_name ")or die(mysqli_error($conn)());

		   while( $result= mysqli_fetch_array($sql)){ 

			$hotelname  = mb_convert_case($result['hotel_name'], MB_CASE_TITLE, "UTF-8");// ucwords($result['hotel_name']); 

			$hotelid  = $result['hotel_id']; 

			?>
         	<option value="<?php echo $hotelid?>" <?php if($hotel_id==$hotelid) echo " selected='selected'";?>><?php echo $hotelname?></option>
		  <?php } //end loop ?>
     </select>          <br />

        Hote Ref. No:
        <input name="hotel_reference" type="text" class="text-input" id="hotel_reference" value="<?php echo $hotel_reference; ?>" />
        </td>
        <td height="35" colspan="2"  align="left"><span class="spacing">Terms:<br />             <select name="booking" id="booking" class="validate[condRequired[hotel]] text-input" >

          <option value="" selected="selected">-- select one --</option>

          <option value="DR" <?php if($booking=="DR") echo " selected='selected'";?>>Day Room</option>

          <option value="BO" <?php if($booking=="BO") echo " selected='selected'";?>>Bed Only</option>

          <option value="BB" <?php if($booking=="BB") echo " selected='selected'";?>>Bed and Breakfast</option>

          <option value="HB" <?php if($booking=="HB") echo " selected='selected'";?>>Half Board</option>

          <option value="FB" <?php if($booking=="FB") echo " selected='selected'";?>>Full Board</option>

          <option value="AI" <?php if($booking=="AI") echo " selected='selected'";?>>All Inclusive</option>

          <option value="GP" <?php if($booking=="GP") echo " selected='selected'";?>>Ground Package</option>


          </select>  </span>  <span class="spacing">Booking status:<br /><select name="status" id="status" class="validate[condRequired[booking]] text-input"  >

            <option value="" >-- select one --</option>

            <option value="Not Reserved" <?php if($status=="Not Reserved") echo " selected='selected'";?>>Not Reserved</option>

            <option value="Requested" <?php if($status=="Requested") echo " selected='selected'";?>>Requested</option>  <option value="Waitlisted">Waitlisted</option>        

            <option value="Confirmed" <?php if($status=="Confirmed") echo " selected='selected'";?>>Confirmed</option> <option value="Deposit paid">Deposit Paid</option> <option value="Fully Paid">Fully paid</option><option value="Own Arrangement">Own Arrangement</option><option value="Depost Required">Depost Required</option>

  </select>

            </span><span class="spacing">Payment due Date:

              <input type="text" class="text-input" name="payment_due" id="payment_due" size="12" value="<?php echo $pay_due;?>" /></span>

          <span class="spacing">Hotel Voucher Remark:

            <input name="hotel_comment" type="text" class="text-input" id="hotel_comment" value="<?php echo $voucher_remarks;?>" /></span>

          <span class="spacing">Currency:<?php

		  $strSQLCurrencies = "SELECT currencyname,currencysymbol FROM tbl_currencies WHERE isvisible=1 ORDER BY currencyorder";
		  $resultCurrencies = mysqli_query($conn,$strSQLCurrencies);
		  ?>
            <select class="validate[required] text-input" id="currency" name="currency">
           <?php
           		while($rowC = mysqli_fetch_object($resultCurrencies))
				{
		   	?>
                <option value="<?php echo $rowC->currencysymbol;?>" <?php if($used_currency==$rowC->currencysymbol) echo " selected='selected'";?>><?php echo $rowC->currencyname;?></option>
            <?php
				}
			?>
          </select>
          </span>

          </span> 

          </td>

      </tr>

        <tr class="hotel">
          <td colspan="4"><table width="99%" border="0" cellspacing="0" cellpadding="5" id="tblHotelRoomRates" >
            <tr>
              <td>&nbsp;</td>
              <td class="topborder">Singles</td>
              <td class="topborder">Doubles</td>
              <td class="topborder">Twins</td>
              <td class="topborder">Triples</td>
              <td class="topborder">Family Room</td>
              <td class="topborder">Child beds</td>
              </tr>
            <tr>
              <td align="left" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><strong>Rooms</strong></td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><span class="rooms_type_number">
                <select id="singles" name="singles" class=" validate[required] text-input">
                  <option value="<?php echo $singles?>" selected="selected" ><?php echo $singles?></option>
                  <option value="0" >0</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>
                  <option value="5" >5</option>
                  <option value="6" >6</option>
                  <option value="7" >7</option>
                  <option value="8" >8</option>
                  <option value="9" >9</option>
                  <option value="10" >10</option>
                  <option value="11" >11</option>
                  <option value="12" >12</option>
                  <option value="13" >13</option>
                  <option value="14" >14</option>
                  <option value="15" >15</option>
                  <option value="16" >16</option>
                  <option value="17" >17</option>
                  <option value="18" >18</option>
                  <option value="19" >19</option>
                  <option value="20" >20</option>
                  <option value="21" >21</option>
                  <option value="22" >22</option>
                  <option value="23" >23</option>
                  <option value="24" >24</option>
                  <option value="25" >25</option>
                  <option value="26" >26</option>
                  <option value="27" >27</option>
                  </select>
                </span></td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><span class="rooms_type_number">
                <select id="db" name="db" class=" validate[required] text-input">
                  <option value="<?php echo $doubles?>" selected="selected" ><?php echo $doubles?></option>
                  <option value="0" >0</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>
                  <option value="5" >5</option>
                  <option value="6" >6</option>
                  <option value="7" >7</option>
                  <option value="8" >8</option>
                  <option value="9" >9</option>
                  <option value="10" >10</option>
                  <option value="11" >11</option>
                  <option value="12" >12</option>
                  <option value="13" >13</option>
                  <option value="14" >14</option>
                  <option value="15" >15</option>
                  <option value="16" >16</option>
                  <option value="17" >17</option>
                  <option value="18" >18</option>
                  <option value="19" >19</option>
                  <option value="20" >20</option>
                  <option value="21" >21</option>
                  <option value="22" >22</option>
                  <option value="23" >23</option>
                  <option value="24" >24</option>
                  <option value="25" >25</option>
                  <option value="26" >26</option>
                  <option value="27" >27</option>
                  </select>
                </span></td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><span class="rooms_type_number">
                <select id="twins" name="twins" class=" validate[required] text-input">
                  <option value="<?php echo $twins?>" selected="selected" ><?php echo $twins?></option>
                  <option value="0">0</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>
                  <option value="5" >5</option>
                  <option value="6" >6</option>
                  <option value="7" >7</option>
                  <option value="8" >8</option>
                  <option value="9" >9</option>
                  <option value="10" >10</option>
                  <option value="11" >11</option>
                  <option value="12" >12</option>
                  <option value="13" >13</option>
                  <option value="14" >14</option>
                  <option value="15" >15</option>
                  <option value="16" >16</option>
                  <option value="17" >17</option>
                  <option value="18" >18</option>
                  <option value="19" >19</option>
                  <option value="20" >20</option>
                  <option value="21" >21</option>
                  <option value="22" >22</option>
                  <option value="23" >23</option>
                  <option value="24" >24</option>
                  <option value="25" >25</option>
                  <option value="26" >26</option>
                  <option value="27" >27</option>
                  </select>
                </span></td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><span class="rooms_type_number">
                <select id="triples" name="triples" class=" validate[required] text-input">
                  <option value="<?php echo $triples?>" selected="selected" ><?php echo $triples?></option>
                  <option value="0">0</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>
                  <option value="5" >5</option>
                  <option value="6" >6</option>
                  <option value="7" >7</option>
                  <option value="8" >8</option>
                  <option value="9" >9</option>
                  <option value="10" >10</option>
                  <option value="11" >11</option>
                  <option value="12" >12</option>
                  <option value="13" >13</option>
                  <option value="14" >14</option>
                  <option value="15" >15</option>
                  <option value="16" >16</option>
                  <option value="17" >17</option>
                  <option value="18" >18</option>
                  <option value="19" >19</option>
                  <option value="20" >20</option>
                  <option value="21" >21</option>
                  <option value="22" >22</option>
                  <option value="23" >23</option>
                  <option value="24" >24</option>
                  <option value="25" >25</option>
                  <option value="26" >26</option>
                  <option value="27" >27</option>
                  </select>
              </span></td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><span class="rooms_type_number">
                <select id="family_rooms" name="family_rooms" class=" validate[required] text-input">
                  <option value="<?php echo $family_rooms?>" selected="selected" ><?php echo $family_rooms?></option>
                  <option value="0">0</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>
                  <option value="5" >5</option>
                  <option value="6" >6</option>
                  <option value="7" >7</option>
                  <option value="8" >8</option>
                  <option value="9" >9</option>
                  <option value="10" >10</option>
                  <option value="11" >11</option>
                  <option value="12" >12</option>
                  <option value="13" >13</option>
                  <option value="14" >14</option>
                  <option value="15" >15</option>
                  <option value="16" >16</option>
                  <option value="17" >17</option>
                  <option value="18" >18</option>
                  <option value="19" >19</option>
                  <option value="20" >20</option>
                  <option value="21" >21</option>
                  <option value="22" >22</option>
                  <option value="23" >23</option>
                  <option value="24" >24</option>
                  <option value="25" >25</option>
                  <option value="26" >26</option>
                  <option value="27" >27</option>
                </select>
              </span></td>
              <td style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><span class="rooms_type_number">
                <select id="children_beds" name="children_beds" class=" validate[required] text-input">
                  <option value="<?php echo $child_beds?>" selected="selected" ><?php echo $child_beds?></option>
                  <option value="0">0</option>
                  <option value="1" >1</option>
                  <option value="2" >2</option>
                  <option value="3" >3</option>
                  <option value="4" >4</option>
                  <option value="5" >5</option>
                  <option value="6" >6</option>
                  <option value="7" >7</option>
                  <option value="8" >8</option>
                  <option value="9" >9</option>
                  <option value="10" >10</option>
                  <option value="11" >11</option>
                  <option value="12" >12</option>
                  <option value="13" >13</option>
                  <option value="14" >14</option>
                  <option value="15" >15</option>
                  <option value="16" >16</option>
                  <option value="17" >17</option>
                  <option value="18" >18</option>
                  <option value="19" >19</option>
                  <option value="20" >20</option>
                  <option value="21" >21</option>
                  <option value="22" >22</option>
                  <option value="23" >23</option>
                  <option value="24" >24</option>
                  <option value="25" >25</option>
                  <option value="26" >26</option>
                  <option value="27" >27</option>
                  </select>
              </span></td>
              </tr>
            <tr>
              <td align="left"><strong>Room Rates</strong></td>
              <td><input name="singlesrate" class="text-input" type="text" id="singlesrate" size="10" value="<?php echo $single_price;?>" /></td>
              <td><input name="dbrate" class="text-input" type="text" id="dbrate" size="10" value="<?php echo $db_price;?>" /></td>
              <td><input name="twinsrate" class="text-input" type="text" id="twinsrate" size="10" value="<?php echo $twin_price;?>" /></td>
              <td><input name="triplesrate" class="text-input" type="text" id="triplesrate" size="10" value="<?php echo $trp_price;?>" /></td>
              <td><input name="family_roomrates" class="text-input" type="text" id="family_roomrates" size="10" value="<?php echo $family_room_price;?>" /></td>
              <td><input name="children_bedsrates" class="text-input" type="text" id="children_bedsrates" size="10" value="<?php echo $kid_price;?>" /></td>
              </tr>
            <tr>
              <td colspan="7" align="left"><strong>Extra/Additional Cost e.g extra lunch,drinks</strong>:
<input name="extracost" type="text" id="extracost" value="<?php echo $extra_charges;?>" size="10" class="text-input" />

<strong>Extra Cost Comments: </strong>
<textarea name="extracostcomments" cols="50" class="text-input" rows="1" id="extracostcomments"><?php echo $extra_cost_details;?></textarea>
              </td>
              </tr>
            </table></td>
        </tr>

         <tr bgcolor="#F4F4F4">
           <td height="24" colspan="4" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

"><table width="100%" border="0" cellpadding="5" cellspacing="0">
             <tr>
               <td colspan="3" height="33" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid"><strong>Rooming Allocation</strong></td>
               </tr>
             <tr>
               <td height="24" width="5%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; border-right:#EAEAEA 1px solid">Select</td>
               <td height="24" width="50%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; border-right:#EAEAEA 1px solid">Name</td>
               <td width="45%" height="24"  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; border-right:#EAEAEA 1px solid">&nbsp;Room Type</td>
             </tr>
             <?php
             		//get the visitors and list
					$strSQLVisitors="SELECT visitor_id,visitor_name,room_type FROM tbl_visitors WHERE trip_id=".$tripID." AND deleted=0";
					$result_visitors = mysqli_query($conn,$strSQLVisitors);
					$visitor_room_type="";
					$visitor_id=0;

					while($rowVisitor = mysqli_fetch_object($result_visitors)){

					$visitor_room_type = $rowVisitor->room_type;
					$visitor_id = $rowVisitor->visitor_id;

					$visitor_share_id="v_".$visitor_id;
					$bolCheckVisitor=0;

					//check if the visitor exist and check
					$sqlItenearyVisitorCheck="SELECT visitor_share_id,room_type FROM tbl_visitor_itenerary WHERE visitor_share_id='$visitor_share_id' AND itenerary_id=$itnid";
					$resultItenearyVisitorCheck = mysqli_query($conn,$sqlItenearyVisitorCheck);



					if(mysqli_num_rows($resultItenearyVisitorCheck)>0)
					{
						$bolCheckVisitor=1;

						$rowIteneraryCheck = mysqli_fetch_object($resultItenearyVisitorCheck);

						$current_visitor_room_type = $rowIteneraryCheck->room_type;
					}
					else
					{
						$current_visitor_room_type = $visitor_room_type;	
					}


					mysql_free_result($resultItenearyVisitorCheck);

					 ?>
						 <tr>
						   <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;<input name="chkVisitorId[]" type="checkbox" id="chkVisitorId_v<?php echo $rowVisitor->visitor_id;?>" value="<?php echo "v_".$rowVisitor->visitor_id;?>" <?php if($bolCheckVisitor==1) echo 'checked="checked"';?>  /></td>
						   <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;<?php echo $rowVisitor->visitor_name;?></td>
						   <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;
						   <select name="visitorroomtype_<?php echo "v_".$rowVisitor->visitor_id;?>" id="visitorroomtype_v<?php echo $rowVisitor->visitor_id;?>">
								<option value="<?php echo $current_visitor_room_type;?>"><?php echo $current_visitor_room_type;?></option>
								<option value="Single">Single</option>
								<option value="Double">Double</option>
								<option value="Twin">Twin</option>
								<option value="Triple">Triple</option>
                                <option value="Family">Family</option>
							</select>
						   </td>
						 </tr>
					 <?php
					 //put in the visitors in shared rooms
					 $strSQLSharedRooms="SELECT sharing_id,v_name,pp_details,insurance_details,home_address,nation,age FROM tbl_sharing WHERE sharing_with=".$visitor_id;
					 $resultSharedRooms = mysqli_query($conn,$strSQLSharedRooms);



						 while($rowSharedRooms = mysqli_fetch_object($resultSharedRooms)){

					    $sharing_id = $rowSharedRooms->sharing_id;

						$visitor_share_id="s_".$sharing_id;
						$bolCheckVisitor=0;

						//check if the visitor exist and check
						$sqlItenearyVisitorCheck="SELECT visitor_share_id,room_type FROM tbl_visitor_itenerary WHERE visitor_share_id='$visitor_share_id' AND itenerary_id=$itnid";

						$resultItenearyVisitorCheck = mysqli_query($conn,$sqlItenearyVisitorCheck);

						if(mysqli_num_rows($resultItenearyVisitorCheck)>0)
						{
							$bolCheckVisitor=1;
							$rowIteneraryCheck = mysqli_fetch_object($resultItenearyVisitorCheck);
							$current_visitor_room_type = $rowIteneraryCheck->room_type;
						}
						else
						{
							$current_visitor_room_type = $visitor_room_type;	
						}


						mysql_free_result($resultItenearyVisitorCheck);		 



						 ?>
						 <tr>
							   <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;<input name="chkVisitorId[]" type="checkbox" id="chkVisitorId_s<?php echo $rowSharedRooms->sharing_id;?>" value="<?php echo "s_".$rowSharedRooms->sharing_id;?>" <?php if($bolCheckVisitor==1) echo 'checked="checked"';?> /></td>
							   <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;<?php echo $rowSharedRooms->v_name;?></td>
							   <td  bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;
							   <select name="visitorroomtype_<?php echo "s_".$rowSharedRooms->sharing_id;?>" id="visitorroomtype_s<?php echo $rowSharedRooms->sharing_id;?>" >
									<option value="<?php echo $current_visitor_room_type;?>"><?php echo $current_visitor_room_type;?></option>
									<option value="Single">Single</option>
									<option value="Double">Double</option>
									<option value="Twin">Twin</option>
									<option value="Triple">Triple</option>
                                    <option value="Family">Family</option>
								</select>
							   </td>
							 </tr>

						 <?php
						 }
					}
             		//else no visitors currently exist

			 ?>
             <tr>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
             </tr>
           </table>

</td>
           </tr>
         <tr bgcolor="#F4F4F4">

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">        Include other  Operations Details<span class="header">

           <input  class="operation" checked="checked"  id="operation" name="operation" type="checkbox"  />

        </span></td>

        <td height="24"  bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">&nbsp;</td>

     </tr>





     <tr id="op1">

        <td height="35" align="left">Pick up Time:<br />
          <input name="put" type="text"  class="validate[optional] text-input " id="put" value="<?php echo $s_time;?>" size="7" /></td>

        <td height="35" align="left">Pick up Point<br />
          <input name="pup" type="text"   class="validate[optional,custom[onlyLetterSp]] text-input" id="pup" value="<?php echo $pickuppoint;?>" size="20" /></td>

        <td height="35" align="left">Drop off Point:<br />
          <input name="dropoff" type="text"   class="validate[optional,custom[onlyLetterSp]] text-input" id="dropoff" value="<?php echo $dropoffpoint;?>" size="20" /></td>

        <td height="35" align="left">&nbsp;</td>



        </tr>

        <tr>         <td height="35" colspan="2" align="left" style="border-bottom:#c0c0c0 1px solid;"><a href="../view_trip.php?inc=<?php echo $tripID?>">Go to trips</a></td>

<td height="35" align="left" style="border-bottom:#c0c0c0 1px solid;"><a href="../includes/delete_itinerary.php?itnid=<?php echo $itnid?>&amp;trip=<?php echo $tripID?>&user=<?php echo $id?>"  onclick="return confirmDeletion();">Delete Itinerary</a></td>
<td height="35" align="right" style="border-bottom:#c0c0c0 1px solid;"><input name="event_id" type="hidden" id="event_id" value="<?php echo $event_id;?>" />
  <input name="hotel_charges_id" type="hidden" id="hotel_charges_id" value="<?php echo $hotel_charges_id;?>" />
  <input name="trip_hotel_id" type="hidden" id="trip_hotel_id" value="<?php echo $trip_hotel_id?>" />
  <input name="inc" type="hidden" id="inc" value="<?php echo $tripID;?>" />
  <input name="itnid" type="hidden" id="itnid" value="<?php echo $itnid;?>" />
  <input type="submit" name="button" id="button" value="  Save   " /></td>
        </tr>
        <tr>
          <td height="35" colspan="2" align="left">&nbsp;</td>
          <td height="35">&nbsp;</td>
          <td height="35" align="right">&nbsp;</td>
        </tr>

        <tr class="italix">

        <td height="20" colspan="4" align="left" >







        <table cellpadding="0" cellspacing="0" width="100%"><tr><td height="33" colspan="6" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Itinerary List</strong></td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="6" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            </tr>

            <tr class="black_text">

            <td width="4%" height="24" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Day</td>

            <td width="5%" height="24" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Date</td>

            <td colspan="5" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Itinerary</td>

            <td width="9%" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Hotel</td>

            <td width="6%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Terms</td>

            <td colspan="5" align="center" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Rooming</td>

            <td rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;border-right:1px #eaeaea solid">Status</td>

            <td rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            </tr>

            <tr class="black_text">

              <td width="5%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Sin</td>

              <td width="5%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Twn</td>

              <td width="5%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Dbl</td>

              <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Trp</td>
              <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">FMr</td>

            </tr>



              <?php  

$trip_sql = mysqli_query($conn,"SELECT  * FROM  tbl_itinerary WHERE trip_id = $tripID AND deleted=0 order by date desc")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($trip_sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="16" align="center" valign="middle" bgcolor="#fff" class="italix">No Itinerary Yet</td>

            </tr>

	<?php	}

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

$family_rooms=$result['family_rooms'];







    if($i % 2) { //this means if there is a remainder



		?><tr>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"> <?php echo $title?>

      <br /></td>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php $dat=strtotime($date); echo date('d.m.Y', $dat);?>    </td>

    <td height="37" colspan="5" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $details

	?>   </td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid;  border-right:#EAEAEA 1px solid"><?php  // hotel types

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id=$itnid and  trip_id = $tripID")or die(mysqli_error($conn)());



$result = mysqli_fetch_array($sql);

if(!$result){

	echo "-";

	$booking="-";

	$status="-";

	} else{



$booking  = $result['booking'];

$status  = $result['status'];



	$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $trip_hotel_id")or die(mysqli_error($conn)());

	$result_town = mysqli_fetch_assoc($town_sql);



	echo $hotel_name = $result_town['hotel_name'];



	}

	?></td>

    <td bgcolor="#F0F0F0" class="black_text" align="center" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $booking?></td>

    <td align="center" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $singles;?></td>

    <td bgcolor="#F0F0F0" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $twins?></td>

    <td align="center" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $doubles?></td>

    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $triples;?></td>
    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><span class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $family_rooms;?></span></td>

    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $status?></td>

    <td nowrap="nowrap"bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><a  href="edit_itinerary.php?itnid=<?php echo $itnid?>&amp;inc=<?php echo $tripID?>">Edit </a> | <a href="../includes/delete_itinerary.php?itnid=<?php echo $itnid?>&amp;trip=<?php echo $tripID?>&user=<?php echo $id?>">Delete</a></td>



	</tr>

<?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $title?><br /></td>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php $dat=strtotime($date); echo date('d.m.Y ', $dat);?></td>

            <td height="37" colspan="5" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $details

	?>        </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php  

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id=$itnid and  trip_id = $tripID")or die(mysqli_error($conn)());



$result = mysqli_fetch_array($sql);

if(!$result){

	echo "-";

	$booking="-";

	} else{



$booking  = $result['booking'];



	$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE  hotel_id = $trip_hotel_id")or die(mysqli_error($conn)());

	$result_town = mysqli_fetch_assoc($town_sql);



	echo $hotel_name = $result_town['hotel_name'];

	}

	?></td>



    <?php



$sql = mysqli_query($conn,"SELECT * FROM  tbl_visitors WHERE trip_id = $tripID AND room_type='Single' AND deleted=0 ")or die(mysqli_error($conn)());

$single = mysqli_num_rows($sql);

//twin

$sql = mysqli_query($conn,"SELECT * FROM  tbl_visitors WHERE trip_id = $tripID AND room_type='Twin' AND deleted=0 ")or die(mysqli_error($conn)());

$twin = mysqli_num_rows($sql);

	// for doubles

$sql = mysqli_query($conn,"SELECT * FROM  tbl_visitors WHERE trip_id = $tripID AND room_type='Double' AND deleted=0 ")or die(mysqli_error($conn)());

$double = mysqli_num_rows($sql);

  			// fortripples

		$sql = mysqli_query($conn,"SELECT * FROM  tbl_visitors WHERE trip_id = $tripID AND room_type='Triple' AND deleted=0 ")or die(mysqli_error($conn)());

$triple = mysqli_num_rows($sql);

			// total

			$total_rooms=$single + $double + $triple;?>

             <td bgcolor="#FFFFFF" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $booking?></td>

            <td bgcolor="#FFFFFF" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $singles;?></td>

            <td bgcolor="#FFFFFF" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $twins;?></td>

            <td bgcolor="#FFFFFF" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $doubles;?></td>

            <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $triples;?></td>
            <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $family_rooms;?></td>

            <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php   // hotel types

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id=$itnid and  trip_id = $tripID")or die(mysqli_error($conn)());



$result = mysqli_fetch_array($sql);

if(!$result){

	echo "-";

	//$booking="-";

	$status="-";

	} else{



echo $status  = $result['status']; }?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><a  href="edit_itinerary.php?itnid=<?php echo $itnid?>&amp;inc=<?php echo $tripID?>">Edit </a> | <a href="../includes/delete_itinerary.php?itnid=<?php echo $itnid?>&amp;trip=<?php echo $tripID?>&user=<?php echo $id?>">Delete</a></td>



          </tr> 

<?php

    }



}

	?> <tr class="black_text" style="border-top:2px #eded11 solid" bordercolor="#ff6600">

              <td height="25" colspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td height="25" colspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td colspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td height="25" colspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td height="25" colspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td width="8%" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>
              <td width="8%" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td colspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td></tr></table>

          </td>

      </tr>

      <tr id="servedby"class="italix">

        <td height="20" colspan="2" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="2" align="center" bgcolor="#333333">Served By: 

          <?php echo $_SESSION['f_name']?></td>

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