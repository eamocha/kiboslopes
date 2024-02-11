<?php session_start();



include('/lib/config.php'); 



//call functions

include('/lib/functions.php');

$fid=$_REQUEST['fid'];

$tripID=$_REQUEST['tripID'];

include('roles/sales_roles.php');

//get data from the database

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_flights WHERE flight_id=$fid")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);

	$fl_result = mysqli_fetch_array($sql); //get a row from our result set

	$date  = $fl_result['date'];

	$arr_time  = $fl_result['arr_time'];	

	$dep_time  = $fl_result['dep_time'];

	$from  = $fl_result['from'];

	$to=$fl_result['to'];

	$status  = $fl_result['status'];

	$flightid  = $fl_result['flight_id'];

	$currency  = $fl_result['currency'];

	$reservation_ref  = $fl_result['reservation_ref'];

	$plane_no  = $fl_result['plane_no'];

  $comments  = $fl_result['comments'];

	$adults  = $fl_result['adults'];

	$kids  = $fl_result['kids'];

	$adultsfare  = $fl_result['adultfare'];

	$kidfare  = $fl_result['kidfare'];

	$flight_type  = $fl_result['flight_type'];	

	$airline  = $fl_result['airline'];

  $contacts=$fl_result['contacts'];

	



 ?>



	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Flight</title>

<style type="text/css">

		body{font:12px/1.2 Verdana, Arial, san-serrif; padding:0 10px;}

		a:link, a:visited{text-decoration:none; color:#416CE5; border-bottom:1px solid #416CE5;}

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

<<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />

<link  rel="stylesheet" href="datepicker/jqueryui.css" type="text/css"  />

<link  rel="stylesheet" href="css/styles.css" type="text/css" />

<link  rel="stylesheet" href="css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="datepicker/jquery-1.8.2.js" type="text/javascript"></script>

<script src="js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="datepicker/jqueryui.js"></script>

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

			

			$('#planeno').keyup(function(){

    this.value = this.value.toUpperCase();});	$('#reserve_ref').keyup(function(){

    this.value = this.value.toUpperCase();});

	});

	</script>

        

</head>



<body><form id="flight"  name="flight" class="formular" method="post" action="edit_flight_exec.php?fid=<?php echo $flightid?>&tripID=<?php echo $tripID?>"><table width="450px" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="4" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Add Flight  Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="1way" name="flight_type" checked="checked" value="1"/>One way&nbsp;&nbsp;&nbsp;<input  type="radio" id="twoway" name="flight_type" value="2"/> Return journey</td>

        <td height="24" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">&nbsp;</td>

      </tr>

      <tr>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">Date: <br />

        <input  type="text"  class="validate[custom[date]] text-input" id="idate" name="idate" value="<?php echo $date?>" size="30" /></td>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">Departure Time<br />

          <input type="text"  class=" text-input"  name="dep_time" id="dep_time" value="<?php echo $dep_time?>" size="30" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Arrival Time<br />

        <input type="text"  class=" text-input"  name="arr_time" id="arr_time" value="<?php echo $arr_time?>" size="30" /></td>

      </tr>

      <tr>

        <td align="left" valign="top" bgcolor="#FFFFFF">From<br />

        <input name="from" size="12" class=" text-input" value="<?php echo $from?>" id="from" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">To

          <input name="to"size="12" class=" text-input" value="<?php echo $to?>" id="to" /></td>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">Airline Name<br />

          <input name="airline"  value="<?php echo $airline?>"  size="30" id="airline" class="text-input"  />

        </td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Flight No.<br/>

            <input name="planeno" size="30"  value="<?php echo $plane_no ?>" class=" text-input" id="planeno" />

     </td>

      </tr><tr>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">Airline Contacts<br />

          <input type="text" size="30" name="airlinecontact" id="airlinecontact" value="<?php echo $contacts?>" class="text-input" /></td>

        <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">

          Status<br />

          <select style="height:auto" name="status" id="status" class="validate[required] text-input" >

    <option value="<?php echo $status?>" selected="selected"><?php echo $status?></option>

    <option value="Pending">pending</option>

    <option value="Reserved">reserved</option>

    <option value="Confirmed">Confirmed</option>

  </select></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Currency units<br /><select class="text-input" id="currency" name="currency">

  <option value="KES">Kenyan shilling </option>

   <option value="USD $">US Dollar</option>

  

  <option value="UGX"> Ugandan shilling</option>

 <option value="SDG">South Sudanese pound</option> 

 <option value="ZAR"> South African rand </option>

 <option value="RWF">Rwandan franc (RWF) </option>



<option value="AUD">Australian Dollar</option>	

 <option value="CAD">Canadian Dollar	</option>

 <option value="CHF">Swiss Franc</option>

 <option value="EUR">Euro	</option>

 <option value="GBP">British Pound</option>

	 <option value="ILS">Israeli Shekel</option>

     <option value="SGD">Singapore Dollar</option>

 <option value="JPY">Japanese Yen</option>

 <option value="NOK">Norwegian Krone	</option>

   <option value="NZD">New Zealand Dollar</option>

 <option value="PLN">Polish Zloty</option>

	</select></td></tr>

      <tr>

        <td align="left" valign="top" bgcolor="#FFFFFF">No. of adults<br/>

          <input name="no_adults" size="5" class=" text-input" value="<?php echo $adults?>" id="adults" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Fare p/person<br />

          <input name="adult_fare" size="5" class=" text-input" value="<?php echo $adultsfare?>" id="adult_fare" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">

         No. of Kids<br />

            <input name="no_kids"size="5" class=" text-input" value="<?php echo $kids?>" id="no_kids" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Fare/kid<br />

          <input name="kid_fare" size="5" class=" text-input" value="<?php echo $kidfare?>" id="kid_fare" />

          </td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Reservation Reference<br/>

          <input name="reserve_ref" size="30" class=" text-input" value="<?php echo $reservation_ref?>" id="reserve_ref" />          <br /></td></tr> 

              <td height="35" colspan="3" align="left">Comments<br />

                  <input name="comments"size="30" class=" text-input" value="<?php echo $comments?>" id="comments" /></td>

      <td height="35" colspan="2" align="left"><input type="submit" name="button" id="button" value="  Save   " /></td>

      </tr>

      <tr id="servedby"class="italix">

        <td height="20" colspan="2" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="3" align="center" bgcolor="#333333">Served By: 

          <?php echo $_SESSION['f_name']?></td>

      </tr>

    </table></form>

</body>

</html>

