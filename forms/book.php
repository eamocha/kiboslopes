<?php session_start();



include('../lib/config.php'); 



//call functions

include('../lib/functions.php');



$tripID = $_GET['inc'];



	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Booking an Hotel</title>

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

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<link   rel="stylesheet" href="../css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>

<script src="../js/js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="../js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script  src="../js/datepicker/jqueryui.js" type="text/javascript"></script>

<script>







$(function() {

	//initialize 

	 $("#itinerary").validationEngine("attach");

	 //charcter cases

	 //character cases

	$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});

	  <!--date picker range-->

		$( "#pud1" ).datepicker({

			defaultDate: "+1w",

			changeMonth: true,

			numberOfMonths: 1,

			onSelect: function( selectedDate ) {

				$( "#pud2" ).datepicker( "option", "minDate", selectedDate );

			}

		});

		$( "#pud2" ).datepicker({

			defaultDate: "+1w",

			changeMonth: true,

			numberOfMonths: 1,

			onSelect: function( selectedDate ) {

				$( "#pud1" ).datepicker( "option", "maxDate", selectedDate );

			}

		});

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

	});

	</script>



</head>



<body><form id="itinerary"  name="itinerary" class="formular" method="post" action="add_itinerary_exec.php"><table width="450px" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

"> Hotel Reservation </td>

      </tr>

      <tr>

        <td align="left" valign="top" bgcolor="#FFFFFF">Hotel<br />

        <select name="hotel" id="hotel" class="validate[required] text-input" >

  <option value="" selected="selected">-- select one --</option>

  <?php  

  $sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE deleted=0")or die(mysqli_error($conn)());

   while( $result= mysqli_fetch_array($sql)){ 

	$hotelname  = $result['hotel_name']; 

	$hotelid  = $result['hotel_id']; 

	?>



    <option value="<?php echo $hotelid?>"><?php echo $hotelname?></option><?php } //end loop ?></select>

    </td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Date<br />

          <input type="text"  class="validate[required]"  id="date"  name="date"value="" size="30" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Accomodateion status<br />

        <input name="itintitle" type="text"  class="validate[required] text-input" id="itintitle" value="" size="30" /></td>

      </tr>

      <tr>

        <td align="left" valign="top" bgcolor="#FFFFFF">Itinerary Details: <br />

        <textarea name="itindetails" cols="30" class="validate[required] text-input" id="itindetails"></textarea></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Special requirements: <br />

        <textarea name="srequirements" cols="30" class="validate[required] text-input" id="srequirements"></textarea></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>

      </tr>

      <tr>

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Hotel Details</td>

      </tr>

      <tr>

        <td height="35" align="left">Select Hotel: <br />

          <select name="hotel" id="hotel" class="validate[required] text-input" >

            <option value="" selected="selected">-- select one --</option>

            <option value="Single">Ngorongo Springs Hotel</option>

            <option value="Double">Alliance Hotels</option>

            <option value="Triple">Kibo Slopes Tented Camp</option>

        </select></td>

        <td height="35" align="left">Booking <br />

          <select name="booking" id="booking" class="validate[required] text-input" >

            <option value="" selected="selected">-- select one --</option>

            <option value="BO">Bed Only</option>

            <option value="BB">Bed and Breakfast</option>

            <option value="HF">Half Board</option>

            <option value="FB">Full Board</option>

        </select>          <br /></td>

        <td height="35" align="left">Status <br />

          <select name="status" id="status" class="validate[required] text-input" >

            <option value="" selected="selected">-- select one --</option>

            <option value="Triple">Reserved</option>

            <option value="Triple">Booked</option>

            <option value="Triple">Confirmed</option>

        </select></td>

      </tr>

      <tr>

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Operations Details</td>

      </tr>

      <tr>

        <td height="35" align="left">Pick up Date:<br />

        <input name="pud1" type="text"  class="validate[required] text-input " id="pud1" value="" size="30" /></td>

        <td height="35" align="left">Pick up Time Date:<br />

        <input name="pud2" type="text"  class="validate[required] text-input " id="pud2" value="" size="30" /></td>

        <td height="35" align="left">Drop off Point:<br />

        <input name="dropoff" type="text"   class="validate[required,custom[onlyLetterSp]] text-input" id="fare6" value="" size="30" /></td>

      </tr>

      <tr>

        <td height="35" colspan="3" align="left"><input type="submit" name="button" id="button" value="  Save   " /></td>

      </tr>

      <tr id="servedby"class="italix">

        <td height="20" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="2" align="center" bgcolor="#333333">Served By: 

        <?php echo $_SESSION['f_name']?></td>

      </tr>

    </table></form>

</body>

</html>

