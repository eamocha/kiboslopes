<?php

session_start();

include('auth.php'); 

include('lib/config.php'); 



//call functions

include('lib/functions.php');

$tripID = $_GET['inc'];

?>

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



			

		});

        

        //saving flight

        

		var saving_data = '<img src="images/loading.gif" /> saving...';

		

		//when button is clicked

		$('#save').click(function(){

				$('#messages').html(saving_data);

			var sel_flight = $('#sel_flight').val();

			$.post("save_flight.php", { sel_flight: sel_flight },

			function(result){

					//if the result is 1

				if(result == 1){

					$('#messages').html('<span class="is_available"><b>' +sel_flight + '</b> saved</span>');

					}

					else

					{

						$('#messages').html('<span class="is_not_available"><b>' +sel_flight + '</b> is already saved</span>');

						}

				});

		});

        

        //saved end

        </script>

        

       



        

</head>



<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="images/logo.png" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?> | <a href="login.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title">Trip Management</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="dashboard.php">dashboard</a></span></li>

     <li>&nbsp;&nbsp;&nbsp;RESERVATIONS &nbsp;&nbsp;&nbsp;</li>

      <li><a href="accounts.php">ACCOUNTS </a></li>

    <li ><a href="operations.php">OPERATIONS </a></li>

    <li><a href="administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">

      

      <li ><a title="KIBO SLOPES" href="view_trip.php?inc=<?php echo $tripID;?>"><img src="images/icon2.png" alt="" width="27" height="21" />  Trip</a></li>

      <li style="background:#F0F0F0;"><a  title="KIBO SLOPES" href="flights.php?inc=<?php echo $tripID?>"><img src="images/icon2.png" width="27" height="21" />Flights</a></li>

      

      <li ><a title="KIBO SLOPES" href="hotels.php?inc=<?php echo $tripID?>"><img src="images/icon2.png" alt="" width="27" height="21" />Hotels</a></li>

    </ul><div><span class="al-head">Alerts</span><span  id="alerts">-Others data<br />

    -cdata 2</span></div>

<div id="notifications"><span class="al-head">Notifications</span><span id="notes">-Notes here</span></div>

<div><span class="al-head">Changes</span><span id="changes">-change sommthing</span></div>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="250" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

                <li> 

                  <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

                  <div id="menu_text"><a href="#"> Flights </a></div>

                  <ul>

                    <li> 

                      <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                      <ul>

                        <li><a class='example5' href="forms/add_airline.php?inc=<?php echo $tripID?>" title="" style="padding-left:25px;">Add 

                          airline</a></li>

                      </ul>

                    </li>

                    

                    <li> 

                      <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                      <ul>

                        <li><a class='example5' href="" title="flights" style="padding-left:25px;">Print 

                          List</a></li>

                      </ul>

                    </li>

                  </ul>

                </li>

          </ul></td>

        <td width="379" height="62" align="left" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9; padding-top:0"> <a class='' href="forms/add_flight.php?inc=<?php echo $tripID?>" title="" style="padding-left:0;"><img src="images/flight-status-icon-set-vector.png" width="50" height="33" alt="flight" /></a></td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">

          <tr class="black_text">

            <td width="3%" height="24" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><strong>ID</strong></span></td>

            <td width="8%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Date</strong></td>

            <td width="9%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Dep. Time</strong></td>

            <td width="9%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Arr. Time</strong></td>

            <td width="23%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Airline Name</strong></td>

            <td width="24%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Route</strong></td>

            <td width="7%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Status</strong></td>

            <td width="17%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            </tr>

  <?php  

$fl_sql = mysqli_query($conn,"SELECT   * FROM   tbl_flights WHERE deleted=0 AND trip_id = $tripID")or die(mysqli_error($conn)());

$numofrowsf = mysqli_num_rows($fl_sql);



//for the other results



 if($numofrowsf == 0){?>

		         <tr>

            <td height="47" colspan="7" align="center" valign="middle" bgcolor="#fff" class="italix">No flight has been booked!</td>

            </tr>

	<?php	}

	

for($i = 0; $i<$numofrowsf; $i++) {

    $fl_result = mysqli_fetch_array($fl_sql); //get a row from our result set

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

  

	

    if($i % 2) { //this means if there is a remainder

        

		?><tr>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $flightid?></td>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

    <?php echo $date?>

      <br /></td>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $dep_time?>

    </td> 

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

        <?php echo $arr_time?>

        <br /></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">  <?php echo $airline?> (<?php echo $plane_no?>)</td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

  <?php echo $from?>-<?php echo $to?><?php if($flight_type==2){ echo '<b>(Return Journey)</b>';}?>

	

    </td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $status?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a href="view_flight.php?fid=<?php echo $flightid?>&tripID=<?php echo $tripID?>">View </a>|<a class="example5" href="edit_flight.php?fid=<?php echo $flightid?>&tripID=<?php echo $tripID?>"> Edit </a>| <a href="includes/delete_flight.php?fid=<?php echo $flightid?>&inc=<?php echo $tripID?>">Cancel</a></td>

    </tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $flightid?></td>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $date?><br /></td>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $dep_time?>

            </td>  

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

                <?php echo $arr_time?><br /></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $airline?> (<?php echo $plane_no?>)</td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

            <?php echo $from?>-<?php echo $to?><?php if($flight_type==2){ echo '<b>(Return Journey)</b>';}?>

            </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $status?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a href="view_flight.php?fid=<?php echo $flightid?>&tripID=<?php echo $tripID?>">View </a>|<a class="example5" href="edit_flight.php?fid=<?php echo $flightid?>&tripID=<?php echo $tripID?>"> Edit </a>| <a href="includes/delete_flight.php?fid=<?php echo $flightid?>&inc=<?php echo $tripID?>">Cancel</a></td>

            </tr> <?php

    }

   

}

	?>

          

 <tr id="servedby"class="italix">

        <td height="20" colspan="3" align="left" bgcolor="#333333">Visitors list</td>

        </tr>

      

      

        </table></td>

      </tr>

      <tr>

      

      

      

      </tr>

    </table>

<table width="100%" style="border-collapse:collapse">

  

 

 

          <tr class="black_text">

            <td width="5%" height="24" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >&nbsp;</td>

            <td colspan="3" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Full Name</td>

            <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Passport</td>

            <td width="18%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Home Address</td>

            <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Nationality</td>

            <td width="10%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Insurance</td>

            <td width="15%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Flight</td>

          </tr>

  <?php  

$sql = mysqli_query($conn,"SELECT * FROM  tbl_visitors WHERE trip_id = $tripID AND deleted=0 ")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="11" align="center" valign="middle" bgcolor="#fff" class="italix">No Visitors on this trip</td>

            </tr>

	<?php	}

for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($sql); //get a row from our result set

	$visitor_id  = $result['visitor_id'];

	$visitor_name  = $result['visitor_name'];

	$address  = $result['address'];

	$nationality  = $result['nationality'];

	$passport_details  = $result['passport_details'];

	$room_type  = $result['room_type'];

	$sharing_double=$result['gender'];

	$insurance=$result['insurance'];

	$sharing_tripple=$result['sharing_triple'];

	$age  = $result['age'];



	   

	

  //this means if there is a remainder

        

		?><tr style="border-bottom:1px #C0C0C0 solid">

    <td height="37" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

    <td height="37" colspan="3" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $visitor_name?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years)'; }?>

      <br /></td>

    <td colspan="2" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $passport_details?>

  </td>

    <td bgcolor="#F3F3F3" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $address

	?>    </td>

    <td colspan="2" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $nationality?>  </td>

    <td nowrap="nowrap" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $insurance?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">   

     <form method="get" name="form" action="save_flight_visitor.php?visitor=<?php echo $visitor_id?>">

     <select name="sel_flight" id="sel_flight" class="text-input" >

     <option selected="selected" value="" >select</option>

       <?php

	  $fl_sql = mysqli_query($conn,"SELECT   * FROM   tbl_flights WHERE deleted=0 AND trip_id = $tripID")or die(mysqli_error($conn)());

	$numofrowsf = mysqli_num_rows($fl_sql);

	

    while($fl_result = mysqli_fetch_array($fl_sql)){ //get a row from our result set

	$flightid  = $fl_result['flight_id'];

	$airline  = $fl_result['airline'];

	?>

	 <option value="<?php echo $flightid ?>"><?php echo $flightid ?> </option>

     





	<?php

    } 

	?>  

    </select><input type="submit" name="submit" class="save" value="Save">

    </form>

    

    </td>

    </tr>

          <?php

    if($room_type!=''|| $room_type!='Single'){

		

              $share="SELECT `sharing_id`, `v_name`, `sharing_with`, `pp_details`, `insurance_details`, `home_address`, `nation`, `age` FROM `tbl_sharing` WHERE `sharing_with`=$visitor_id and deleted=0" or die();

			  $quer=mysqli_query($conn,$share);

			  while($share_q=mysqli_fetch_array($quer)){

				  $sharing_id=$share_q['sharing_id'];

				    $sharing_with=$share_q['sharing_with'];

				    $v_name=$share_q['v_name'];

					  $pp_details=$share_q['pp_details'];

					    $insurance_details=$share_q['insurance_details'];

						  $home_address=$share_q['home_address'];

						    $nation=$share_q['nation'];

							 (int)$age=$share_q['age'];

							 ?>  

    

            

          <tr id="share">

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><br /></td>

            <td height="37" colspan="3" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php

							 echo $v_name;

				   ?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years)'; }?>

            </td>

            <td colspan="2" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $pp_details?>

           </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $home_address?></td>

            <td colspan="2" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $nation?>   

            </td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $insurance_details?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">  

             <script type="text/javascript" >

$(function() {

	$("#sel_flight").change(function (){ 

	var id= $(this).val();

$(".save").click(function() {



var test =id;

var dataString = 'sel_flight='+ test;



if(test=='')

{

alert("Please select a flight");

}

else

{

$("#flash").show();

$("#flash").fadeIn(400).html('<img src="../images/ajax-loader.gif" align="absmiddle"> <span class="loading">Saving data...</span>');



$.ajax({

type: "GET",

url: "save_flight_visitor.php?visitor=<?php echo $visitor_id?>",

data: dataString,

cache: false,

success: function(html){

$("#display").after(html);

$("#flash").fadeOut(1000);

}

});

} 

return false;

});

});

});

</script>

  <form method="get" name="form" action="save_flight_visitor.php?visitor=<?php echo $visitor_id?>">

     <select name="sel_flight" id="sel_flight" class="text-input" >

     <option selected="selected" value="" >select</option>

       <?php

	  $fl_sql = mysqli_query($conn,"SELECT   * FROM   tbl_flights WHERE deleted=0 AND trip_id = $tripID")or die(mysqli_error($conn)());

	$numofrowsf = mysqli_num_rows($fl_sql);

	

    while($fl_result = mysqli_fetch_array($fl_sql)){ //get a row from our result set

	$flightid  = $fl_result['flight_id'];

	$airline  = $fl_result['airline'];

	?>

	 <option value="<?php echo $flightid ?>"><?php echo $flightid ?> </option>

     





	<?php

    } 

	?>  

    </select><input type="submit" name="submit" class="save" value="Save">

    </form></td>

            </tr>

        

           <?php }}

	

	



			

    }

   



	?>   

      <tr class="black_text">

            <td height="33" colspan="11" bgcolor="#333333" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

          </tr>              

</table>

<div id="flash"></div>

<div id="display"></div>

</div>

    <div id="bilaz"></div>



</div>

  </form>

</div>

</div>

</body>

</html>