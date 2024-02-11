<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];



include('lib/config.php'); 



//call functions

include('lib/functions.php');



$tripID = $_REQUEST['inc']; ?>

<?php

 $sql = mysqli_query($conn,"SELECT * FROM tbl_trips WHERE trip_id = $tripID and deleted=0")or die(mysqli_error($conn)());

    $result= mysqli_fetch_array($sql); 

	$group_no  = $result['trip_id']; 

	$group_name  = $result['group_name']; 

	$team_leader  = $result['team_leader']; 

	$arrival_date  = $result['arrival_date']; 

	$dep_date  = $result['dep_date']; 

	$arrival_time  = $result['arrival_time']; 

	$dep_time  = $result['dep_time']; 

	$no_of_visitors  = $result['no_of_visitors']; 

	//$vehicle  = $result['vehicle_code'];

	//$driver  = $result['driver_id'];

	$spreqs  = $result['special_requirements'];

		

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

				$('.example5').colorbox({ 

    onComplete : function() { 

       $(this).colorbox.resize(); 

    }    

});

$.colorbox.resize();



			

		});</script>

        

        <style>

       tr:nth-child(even){ background-color:#f0f0f0;} 

		tr:nth-child(odd)  { background-color:#fff;}

        </style>

        

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

  <div id="content_box_title">Trip View</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="dashboard.php">dashboard</a></li>

     <li><a href="reservations.php">RESERVATIONS</a></li>

      <li>&nbsp;&nbsp;&nbsp;ACCOUNTS&nbsp;&nbsp;&nbsp; </li>

    <li ><a href="operations.php">OPERATIONS </a></li>

    <li><a href="administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">

      

      <li style="background:#F0F0F0;"><a title="KIBO SLOPES" href="imprests.php"><img src="images/icon2.png" alt="" width="27" height="21" /> Imprest </a></li>

      <!--<li><a title="KIBO SLOPES" href="flights.php?inc=<?php echo $tripID?>"><img src="images/icon2.png" width="27" height="21" />Flights</a></li>-->

      

     <!-- <li><a title="KIBO SLOPES" href="hotels.php?inc=<?php echo $tripID?>"><img src="images/icon2.png" alt="" width="27" height="21" />Hotels</a></li>-->

    </ul>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="250" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> More Details</a></div>

            <ul>

             

              <li>

                <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_imprest.php?inc=<?php echo $tripID?>" title="KiboslopeS" style="padding-left:25px;">Add imprest</a></li>

                  </ul>

                </li>

              

              <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a title="KiboslopeS" style="padding-left:25px;" class="example5" href="report_print.php?inc=<?php echo $tripID?>">Print</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td width="379" height="62" align="left" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9; padding-top:0px;">&nbsp;</td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="left" cellpadding="3" cellspacing="0">

          <tr class="black_text">

            <td height="75" colspan="6" rowspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><table width="100%" border="0" align="left" cellpadding="5" cellspacing="1" style="border:#CCC 1px solid;">

              <tr>

                <td width="35%" bgcolor="#FFFFFF">Group No:</td>

                <td width="65%" colspan="2" bgcolor="#FFFFFF"><?php echo $group_no?></td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Group Name:</td>

                <td colspan="2" bgcolor="#FFFFFF"><?php echo $group_name?></td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Arrival Date:</td>

                <td bgcolor="#FFFFFF"><?php echo $arrival_date?></td>

                <td bgcolor="#FFFFFF">Time: <?php echo $arrival_time?></td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Departure </td>

                <td bgcolor="#FFFFFF"><?php echo $dep_date?></td>

                <td bgcolor="#FFFFFF">Time: <?php echo $dep_time?></td>

              </tr>

            </table>

                      <a  class='example5' href="edit_trip.php?gno=<?php echo $group_no?>"></a><a  class='example5' href="edit_trip.php?gno=<?php echo $group_no?>"></a></td>

            <td height="37" colspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid;" >Expected Visitors :<strong>

<?php if($no_of_visitors==0){

				echo '<strong>uknown</strong>';

			}else{

			echo $no_of_visitors;

			} ?>

            </strong></td>

            <td height="37" colspan="4" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >T/L:<strong>

<?php echo $team_leader?>

            </strong></td>

            <td width="10%" height="37" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            </tr>

          <tr class="black_text">

            <td height="38" colspan="3" rowspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="19" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >Vehicle:<br/></td>

            <td height="19" colspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><?php 

			/* $sql = mysqli_query($conn,"SELECT * FROM tbl_vehicle WHERE vehicle_id=$vehicle and deleted = 0")or die(mysqli_error($conn)());

			 $numofrows=mysqli_num_rows($sql);

             while($result= mysqli_fetch_array($sql)){;

  

	$reg_code  = $result['reg_code']; 

	$vehicle_id=$result['vehicle_id'];

	if($numofrows<0)

	 echo '<b>no assigned</b> ';

		 else{

				 echo $reg_code;

				 }

				 }*/

				 //driver?></td>

            <td height="38" rowspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

          </tr>

          <tr class="black_text">

            <td height="19" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >Driver:              </td>

            <td height="19" colspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><?php /*

			 

  $sql = mysqli_query($conn,"SELECT * FROM tbl_users WHERE user_id=$driver and deleted=0")or die(mysqli_error($conn)());

 $numofrows=mysqli_num_rows($sql);

  while($result= mysqli_fetch_array($sql)){

  

	$full_name  = $result['full_name']; 

	$user_id=$result['user_id'];

	if($numofrows<0)

	 echo '/<b>not assigned</b> ';

			 else{

				 echo $full_name;

				 }

  }

	*/

	?></td>

            </tr>

            <tr class="black_text">

            <td height="50" colspan="4" bgcolor="#Eee" style="border-bottom:1px #C0C0C0 solid" ><strong>Special Requirements:</strong></td>

            <td height="33" colspan="10" bgcolor="#fdfdfd" style="border-bottom:1px #C0C0C0 solid" ><?php echo 	$spreqs?></td>

            </tr><tr class="black_text">

            <td width="10" height="33" colspan="6" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Itinerary List</strong></td>

            <td height="33" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="5" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            </tr>

            <tr class="black_text">

            <td width="10" height="24" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Day</td>

            <td width="3%" height="24" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Date</td>

            <td colspan="4" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Itinerary</td>

            <td rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Hotel</td>

            <td colspan="4" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" align="center">Rooming</td>

            <td rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;border-right:1px #eaeaea solid">Terms</td>

            <td rowspan="2" colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            </tr>

            <tr class="black_text">

              <td width="4%" nowrap="nowrap"  align="center" bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Sin</td>

              <td width="4%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Twn</td>

              <td width="4%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Dbl</td>

              <td width="4%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Trip</td>

            </tr>

            

              <?php  

$trip_sql = mysqli_query($conn,"SELECT  * FROM  tbl_itinerary WHERE trip_id = $tripID AND deleted=0 order by title asc")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($trip_sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="14" align="center" valign="middle" bgcolor="#fff" class="italix">No Itinerary Yet</td>

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





	 

	

    if($i % 2) { //this means if there is a remainder

        

		?><tr>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"> <?php echo $title?>

      <br /></td>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $date?>    </td>

    <td height="37" colspan="4" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $details

	?>   </td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid;  border-right:#EAEAEA 1px solid">

      <?php  // hotel types

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id=$itnid and  trip_id = $tripID")or die(mysqli_error($conn)());



$result = mysqli_fetch_array($sql);

if(!$result){

	echo "-";

	$booking="-";

	} else{

$trip_hotel_id  = $result['hotel_id'];

$booking  = $result['booking'];



	$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $trip_hotel_id")or die(mysqli_error($conn)());

	$result_town = mysqli_fetch_assoc($town_sql);

	

	echo $hotel_name = $result_town['hotel_name'];

	

	}

	?>  </td>

    <td bgcolor="#F0F0F0" class="black_text" align="center" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $singles;?>  </td>

    <td align="center" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $twins?></td>

    <td bgcolor="#F0F0F0" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $doubles?>    </td>

    <td align="center" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $triples;?></td>

    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $booking?></td>

    <td nowrap="nowrap"  colspan="2"bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

	

	</tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $title?><br /></td>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $date?></td>

            <td height="37" colspan="4" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $details

	?>        </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php  

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id=$itnid and  trip_id = $tripID")or die(mysqli_error($conn)());



$result = mysqli_fetch_array($sql);

if(!$result){

	echo "-";

	$booking="-";

	} else{

$trip_hotel_id  = $result['hotel_id'];

$booking  = $result['booking'];



	$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE  hotel_id = $trip_hotel_id")or die(mysqli_error($conn)());

	$result_town = mysqli_fetch_assoc($town_sql);

	

	echo $hotel_name = $result_town['hotel_name'];

	}

	?>           </td>

           

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

             <td bgcolor="#FFFFFF" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $singles;?></td>

            <td bgcolor="#FFFFFF" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $twins;?>            </td>

            <td bgcolor="#FFFFFF" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $doubles;?>           </td>

            <td bgcolor="#FFFFFF" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $triples;?></td>

            <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $booking?>          </td>

            <td nowrap="nowrap" colspan="2" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

           

          </tr> <?php

    }

   

}

	?> <tr class="black_text" style="border-top:2px #eded11 solid" bordercolordark="#ff6600">

              <td height="25" colspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><strong>Imprests</strong></td>

              <td height="25" colspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td height="25" colspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td height="25" colspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td width="8%" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td colspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            

          <tr class="black_text">

            <td height="24" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >ID</td>

            <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Date</td>

            <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Amount</td>

            <td width="12%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Reciever</td>

            <td colspan="4" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Particulars</td>

            <td colspan="2" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Reference</td>

            <td width="4%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            <td bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

          </tr>

  <?php  

$sql = mysqli_query($conn,"SELECT * FROM  tbl_accounts WHERE trip_id = $tripID AND deleted=0 ")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="14" align="center" valign="middle" bgcolor="#fff" class="italix">No imprest payments on this trip</td>

            </tr>

	<?php	}

for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($sql); //get a row from our result set

	$account_id  = $result['account_id'];

	$particulars  = $result['particulars'];

	$trip_id  = $result['trip_id'];

	$itinerary_id  = $result['itinerary_id'];

	$ref  = $result['ref'];

	$amount  = $result['amount'];

	$mode_of_payment  = $result['mode_of_payment'];

	$date=$result['date'];

	$log_id=$result['log_id'];

	$reciever=$result['reciever'];

	$currency=$result['curency'];

	//$age  = $result['age'];



	   

	

  //this means if there is a remainder

        

		  if($i % 2) {?>

        <tr style="border-bottom:1px #C0C0C0 solid">

    <td height="37" bgcolor="#f0f0f0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $account_id?></td>

    <td height="37" colspan="2" bgcolor="#f0f0f0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $date?></td>

    <td height="37" bgcolor="#f0f0f0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $currency?>. <?php echo $amount?></td>

    <td colspan="2" bgcolor="#f0f0f0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $reciever?></td>

    <td colspan="4" bgcolor="#F3F3F3" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid" class="black_text" ><?php echo $particulars?></td>

    <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $ref?></td>

    <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><a class="example5" href="forms/edit_imprest.php?inc=<?php echo $tripID?>&imp=<?php echo $account_id?>">Edit</a> | <a class="" href="includes/delete_imprest.php?inc=<?php echo $tripID?>&imp=<?php echo $account_id?>">Delete</a></td>

    </tr>      <?php

    } else { //if there isn't a remainder we will do the else

       ?> 

       

    

            

          <tr id="share">

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $account_id?></td>

            <td height="37" colspan="2" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $date?></td>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $currency?>. <?php echo $amount?></td>

            <td colspan="2" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $reciever?></td>

            <td colspan="4" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $particulars?></td>

            <td colspan="2" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $ref?></td>

            <td colspan="2" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><a class="example5" href="forms/edit_imprest.php?inc=<?php echo $tripID?>&imp=<?php echo $account_id?>">Edit</a> | <a class="" href="includes/delete_imprest.php?inc=<?php echo $tripID?>&imp=<?php echo $account_id?>">Delete</a></td>

            </tr>

         

           <?php }

		   }

	

	



   



	?> <tr>

            <td height="20" colspan="14" bgcolor="#fff" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

            </tr><tr>

            <td height="20" colspan="14" bgcolor="#333333" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

            </tr>

        </table></td>

      </tr>

    </table></div>

    <div id="bilaz"></div>



</div>

  </form>

</div>

</div>

</body>

</html>