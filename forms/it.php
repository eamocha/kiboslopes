<?php session_start();





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

<title>itinerary</title>

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<link   rel="stylesheet" href="../css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>

<script  src="../js/datepicker/jqueryui.js" type="text/javascript"></script>

<script src="../js/js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="../js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

 <link  rel="stylesheet" href="../css/colorbox.css" media="screen"/>

<script src="../js/jquery.colorbox.js"></script> 

 <script>

 $(function() {

$('#hot').hide();

$('#hot1').hide();







$('#hotel').hide();   

$('#include_hotel').change(function(){

	        if($(this).is(':checked')){

	           $('#hotel').show();

			   $('#hot').hide();

$('#hot1').hide();

	        }else{

	             $('#hotel').hide();

	        }

	    });

// operations 

 $('#op1').hide();   $('#op').hide();

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

$( "#pud" ).datepicker();

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

			width:300px}

    </style>

</head>



<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="../images/logo.png" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?> | <a href="login.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title">Trip View</div>

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



      <li><a title="KIBO SLOPES" href="../view_trip.php?inc=<?php echo $tripID;?>"><img src="../images/icon2.png" alt="" width="27" height="21" />  Trip</a></li>

      <li><a title="KIBO SLOPES" href="../flights.php?inc=<?php echo $tripID?>"><img src="../images/icon2.png" width="27" height="21" />Flights</a></li>



      <li><a title="KIBO SLOPES" href="../hotels.php?inc=<?php echo $tripID?>"><img src="../images/icon2.png" alt="" width="27" height="21" />Hotels</a></li>

    </ul>

</div>

<div id="center_pane_big"><table width="107%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="250" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

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

                <li><div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul> <li><a title="KiboslopeS" style="padding-left:25px;" class="example5" href="../report_print.php?inc=<?php echo $tripID?>">Print</a></li>

                  </ul>

                </li>

              <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                <ul>



                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td width="379" height="62" align="left" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><a  href="add_itinerary.php?inc=<?php echo $tripID?>" title="KiboslopeS"><img src="../images/add_itin.jpg" width="48" height="42" /></a></td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>



      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF">

        <form id="itinerary"  name="itinerary" class="formular" method="post" action="../add_itinerary_exec.php?inc=<?php echo $tripID?>">

        <table width="100%" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="17" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Add Itinerary  Details: </td>

      </tr>

      <tr>

        <td width="10%" rowspan="2" align="left" valign="top" bgcolor="#FFFFFF">Day<br />

       <select id="day" name="day" class=" validate[required] text-input">

       <option value="" selected="selected" >--Day--</option>

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

        </select></td>

        <td width="20%" colspan="2" rowspan="2" align="left" valign="top" bgcolor="#FFFFFF">Date: <br />

          <input  type="text"  class="validate[required,custom[date]] text-input" id="idate1" name="idate1" value="" size="20" /></td>

        <td width="22%" rowspan="2" align="left" valign="top" bgcolor="#FFFFFF">Rooming</td>

        <td width="5%" align="left" valign="top" bgcolor="#FFFFFF">Double</td>

        <td width="7%" align="left" valign="top" bgcolor="#FFFFFF"><select id="db" name="db" class=" validate[required] text-input">

          <option value="0" selected="selected" >0</option>

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

        </select></td>

        <td width="4%" align="left" valign="top" bgcolor="#FFFFFF">Twin</td>

        <td width="17%" align="left" valign="top" bgcolor="#FFFFFF"><select id="twins" name="twins" class=" validate[required] text-input">

          <option value="0" selected="selected" >0</option>

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

        </select></td>









    </tr>

      <tr>

        <td width="5%" align="left" valign="top" bgcolor="#FFFFFF">Single</td>

        <td width="7%" align="left" valign="top" bgcolor="#FFFFFF"><select id="singles" name="singles" class=" validate[required] text-input">

          <option value="0" selected="selected" >0</option>

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

        </select></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Triple</td>

        <td align="left" valign="top" bgcolor="#FFFFFF"><select id="triples" name="triples" class=" validate[required] text-input">

          <option value="0" selected="selected" >0</option>

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

        </select></td>



      </tr>

      <tr>

        <td align="left" valign="top"  colspan="3"bgcolor="#FFFFFF">Itinerary Details: <br />

        <textarea name="itindetails" class="validate[required]" id="itindetails"></textarea></td>

        <td colspan="4" align="left" valign="top" bgcolor="#FFFFFF">Remarks:<br />

          <textarea name="srequirements" id="srequirements"></textarea></td>

        <td colspan="9" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td><td width="2%">&nbsp;</td>

      </tr>

      <tr>

        <td height="24" colspan="17" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Hotel Details

           <input  type="checkbox" name="include_hotel" id="include_hotel"/>

          <span id="hotdetails" >Include Hotel details</span>

 |        <a href="add_hotel.php?inc=<?php echo $tripID?>" class="example5" ><span id="add" style="color:#0000FF">Add new hotel name</span></a></td> 

      </tr>

      <tr id="hotel">

        <td height="35" align="left">Select Hotel: <br />

          <select name="hotel" id="hotel" class="validate[condRequired[include_hotel]] text-input" >

            <option value="" selected="selected">-- select one --</option>

            <?php  

  $sql = mysqli_query($conn,"SELECT * FROM tbl_hotels ORDER BY hotel_name ")or die(mysqli_error($conn)());

   while( $result= mysqli_fetch_array($sql)){ 

	$hotelname  = $result['hotel_name']; 

	$hotelid  = $result['hotel_id']; 

	?>



            <option value="<?php echo $hotelid?>"><?php echo $hotelname?></option><?php } //end loop ?></select>          <br /></td>

        <td height="35" align="left">Terms<br />

          <select name="booking" id="booking" class="validate[condRequired[hotel]] text-input" >

            <option value="" selected="selected">-- select one --</option>

            <option value="BO">Bed Only</option>

            <option value="BB">Bed and Breakfast</option>

            <option value="HB">Half Board</option>

            <option value="FB">Full Board</option>

          </select></td>

        <td height="35" colspan="4" align="left">Status<br />

  <select name="status" id="status" class="validate[condRequired[booking]] text-input"  >

    <option value="" >-- select one --</option>

    <option selected="selected" value="Pending">Pending</option>

    <option value="Reserved">Reserved</option>

    <option value="Confirmed">Confirmed</option>

</select></td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" align="left">&nbsp;</td>



        </tr><script type="text/javascript">



	$(document).ready(function(){



	$("#insert").click(function(){

		alert('hi');

	//Get values of the input fields and store it into the variables.

	var desc=$("#desc").val();

	var Name=$("#Name").val();

	var location=$("#location").val();

	var phone=$("#phone").val();

	var fax=$("#fax").val();





	//use the $.post() method to call insert.php file.. this is the ajax request

	$.post('insert.php', {desc: desc, Name: Name, location: location,phone:phone,fax:fax},

	function(data){

	$("#message").html(data);

	$("#message").hide();

	$("#message").fadeIn(1500); //Fade in the data given by the insert.php file

	});

	return false;

	});

	});

	</script>



      <tr bgcolor="#F4F4F4">

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">        Include   Operations Details<span class="header">

           <input  class="operation" id="operation" name="operation" type="checkbox"  />

        </span></td>

        <td height="24" colspan="14" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">&nbsp;</td>

      </tr>

      <tr id="op1">

        <td height="35" align="left">Pick up Date:<br />

          <input name="pud" type="text"  class=" text-input " id="pud" value="" size="20" /></td>

        <td height="35" align="left">Pick up Time:<br />

          <input name="put" type="text"  class="validate[optional] text-input " id="put" value="" size="10" /></td>

        <td height="35" colspan="3" align="left"> Pick up Point<br />

          <input name="pup" type="text"   class="validate[optional,custom[onlyLetterSp]] text-input" id="pup" value="" size="20" /></td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" align="left">&nbsp;</td>

        </tr>

      <tr >

        <td height="35" align="left"><span id="op"> Drop off Point:<br />

          <input name="dropoff" type="text"   class="validate[optional,custom[onlyLetterSp]] text-input" id="dropoff" value="" size="20" /></span></td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" align="left">&nbsp;</td>

        <td height="35" colspan="2" align="left"><input type="submit" name="button" id="button" value="  Save   " /></td>

        <td height="35" align="left">&nbsp;</td>

      </tr>

      <tr id="servedby"class="italix">

        <td height="20" colspan="3" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="14" align="center" bgcolor="#333333">Served By: 

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