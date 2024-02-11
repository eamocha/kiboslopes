<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Itinerary</title>
<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<script src="js/jquery-1.8.2.js" type="text/javascript"></script>

<script  src="js/datepicker/jqueryui.js" type="text/javascript"></script>

<script src="js/js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

 <link  rel="stylesheet" href="css/colorbox.css" media="screen"/>

<script src="js/jquery.colorbox.js"></script> 
<script type="text/javascript" src="js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />

<script language="javascript">
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

<?php session_start();



include('lib/config.php'); 



include('auth.php'); 

//call functions

include('lib/functions.php');

$tripID=$_REQUEST['inc'];

$itnid = $_GET['itnid'];

include('roles/sales_roles.php');

$itn_sql = mysqli_query($conn,"SELECT  * FROM  tbl_itinerary WHERE itinerary_id = $itnid")or die(mysqli_error($conn)());

    $result = mysqli_fetch_array($itn_sql); //get a row from our result set

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

	

	

								?>





<body><form id="itinerary"  name="itinerary" class="formular" method="post" action="edit_itinerary_exec.php?itnid=<?php echo $itnid?>&inc=<?php echo $tripID?>&user=<?php echo $id?>">

<table width="800px" border="0"  cellspacing="0">

         <tr>

        <td height="23"  bgcolor="#F4F4F4" colspan="4" style="border-bottom:#690 3px solid;

">Edit Itinerary  Details for:  <?php $trp_name=mysqli_query($conn,"select group_name from tbl_trips where trip_id=$tripID") or die(mysqli_error($conn)());

$r=mysqli_fetch_array($trp_name);

echo $r['group_name'];?></td>

      </tr><tr><td width="100px"  align="left" valign="top" bgcolor="#FFFFFF">Day<br />

     <input type="text" name="day" id="day" value="<?php echo $day?>" size="5" class="text-input" />

       </td>

        <td width="200px"   align="left" valign="top" bgcolor="#FFFFFF">Date: <br />

          <input  type="text"  class="validate[required,custom[dateFormat]] text-input" id="idate" name="idate" value="<?php echo $date?>" size="20" /></td>

        

        

     

        <td width="200px" align="left" valign="top"  bgcolor="#FFFFFF">Itinerary Details: <br />

        <textarea name="itindetails" class="validate[required]" id="itindetails"><?php echo $details?></textarea></td>

        <td width="200px" align="left" valign="top" bgcolor="#FFFFFF">Itinerary Remarks:<br />

          <textarea name="remarks" id="remarks"><?php echo $remarks?></textarea></td>

          </tr>

          

          

           <tr>

        <td height="24" colspan="4" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">

          <span id="hotdetails" >Include Hotel details</span><input  type="checkbox" name="include_hotel" id="include_hotel"/>

 |        <a href="add_hotel.php?inc=<?php echo $tripID ?>" class="example5" ><span id="add" style="color:#0000FF">Add new hotel name</span></a></td> 

      </tr>

      <tr class="hotel">

      

      <td height="35" colspan="2" align="left">Select Hotel:<br />            <select name="hotel" id="hotel" class="validate[condRequired[include_hotel]] text-input" > <?php 

		    // hotel types

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id=$itnid and  trip_id = $tripID  ")or die(mysqli_error($conn)());

$result = mysqli_fetch_array($sql);

$trip_hotel_id  = $result['hotel_id'];

$booking  = $result['booking'];

$status  = $result['status'];

$voucher_remarks=$result['voucher_remarks'];

$pay_due=$result['payment_due_date'];

if($trip_hotel_id){

$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $trip_hotel_id  and deleted=0 order by hotel_name")or die(mysqli_error($conn)());

	$result_town = mysqli_fetch_assoc($town_sql);

	$hotelid  = $result['hotel_id'];

	$hotel_name = $result_town['hotel_name'];

	?>

  <option value="<?php echo $hotelid?>" selected="selected"><?php echo $hotel_name?></option>

  <?php  

  $sql = mysqli_query($conn,"SELECT * FROM tbl_hotels where deleted=0 order by hotel_name")or die(mysqli_error($conn)());

   while( $result= mysqli_fetch_array($sql)){ 

	$hotelname  = $result['hotel_name']; 

	$hotelid  = $result['hotel_id']; 

	?>

    

    <option value="<?php echo $hotelid?>"><?php echo $hotelname?></option><?php } } //end loop and if statement

	else

	{  

  $sql = mysqli_query($conn,"SELECT * FROM tbl_hotels where deleted=0 order by hotel_name")or die(mysqli_error($conn)());

   while( $result= mysqli_fetch_array($sql)){ 

	$hotelname  = $result['hotel_name']; 

	$hotelid  = $result['hotel_id']; 

	?>

    

    <option value="<?php echo $hotelid?>"><?php echo $hotelname?></option>

	<?php	}

        }

	 ?></select>          <br />         </td>

        <td height="35" colspan="2"  align="left"><span class="spacing">Terms:<br />             <select name="booking" id="booking" class="validate[condRequired[hotel]] text-input" >

            <option value="<?php echo $booking?>" selected="selected"><?php echo $booking?></option>

            <option value="BO">Bed Only</option>

            <option value="BB">Bed and Breakfast</option>

            <option value="HB">Half Board</option>

            <option value="FB">Full Board</option>

        </select>  </span>  <span class="spacing">Booking status:<br /><select name="status" id="status" class="validate[condRequired[booking]] text-input"  >

            <option selected="selected" value="<?php echo $status?>" ><?php echo $status?></option>

             <option value="Not reserved">Not reserved</option>

            <option value="Requested">Requested</option>  <option value="Waitlisted">Waitlisted</option>           

            <option value="Confirmed">Confirmed</option> <option value="Please cancel">Please cancel</option><option value="Deposit paid">Deposit paid</option> <option value="Fully paid">Fully paid</option><option value="Own Arrangement">Own Arrangement</option>

       <option value="Depost Required">Depost Required</option> </select>

          </span><span class="spacing">Payment due Date:

          <input type="text" class="text-input" name="payment_due" id="payment_due"  value="<?php echo $pay_due?>"/></span></span> </td>

        </tr>

        <tr class="hotel">

          <td colspan="4"><span class="rooms_type_number" >Singles<br />

            <select id="singles" name="singles" class=" text-input">

          <option value="<?php echo $singles?>" selected="selected" ><?php echo $singles?></option>

          <option value="0" >0</option> <option value="1" >1</option>

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

        </select>     </span>       <span class="rooms_type_number" >Doubles<br />

                <select id="db" name="db" class=" text-input">

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

        </select></span><span class="rooms_type_number" >Twins<br /><select id="twins" name="twins" class=" text-input">

          <option value="<?php echo $twins?>" selected="selected" ><?php echo $twins?></option>

          <option value="0" >0</option><option value="1" >1</option>

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

                    </span><span class="rooms_type_number" >triples<br />

                      <select id="triples" name="triples" class=" text-input">

          <option value="<?php echo $triples?>" selected="selected" ><?php echo $triples?></option>

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

                    </span><span class="rooms_type_number" >Child beds

                    <select id="child_beds" name="child_beds" class=" validate[required] text-input">

                        <option value="<?php echo $child_beds?>" selected="selected" ><?php echo $child_beds?></option>

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

                        </select></span>

            <label for="text_input">Hotel Voucher remarks</label>

  <br />          <input type="text" class="text-input" name="hotel_remarks" id="hotel_remarks" /></td>

          </tr>

         <tr bgcolor="#F4F4F4">

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">        Include other  Operations Details<span class="header">

           <input  class="operation" id="operation" name="operation" type="checkbox"  />

        </span></td>

        <td height="24"  bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">&nbsp;</td>

     </tr>

     

     

     <tr id="op1">

        <td height="35" align="left">Pick up Date:<br />

          <input name="pud" type="text"  class=" text-input " id="pud" value="" size="10" /></td>

        <td height="35" align="left">Pick up Time:<br />

          <input name="put" type="text"  class="validate[optional] text-input " id="put" value="" size="7" /></td>

        <td height="35" align="left"> Pick up Point<br />

          <input name="pup" type="text"   class="validate[optional,custom[onlyLetterSp]] text-input" id="pup" value="" size="20" /></td>

        <td height="35" align="left"><span id="op"> Drop off Point:<br />

          <input name="dropoff" type="text"   class="validate[optional,custom[onlyLetterSp]] text-input" id="dropoff" value="" size="20" /></span></td>

        

        </tr>

       <tr>

        <td height="35" colspan="11" align="left"><input type="submit" name="button" id="button" value="  Save   " /></td>

      </tr>

      <tr id="servedby"class="italix">

        <td height="20" colspan="2" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="2" align="center" bgcolor="#333333">Served By: 

          <?php echo $_SESSION['f_name']?></td>

      </tr>

      </table>

</form>

</body>

</html>

