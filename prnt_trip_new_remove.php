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

	$vehicle  = $result['vehicle_code'];

	$driver  = $result['driver_id'];

	$spreqs  = $result['special_requirements'];

		

	?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title></title>

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

        #content-title-right{

			float:right;

			padding-top:50px;

			padding-right:100px;

			font-size:19px;

			}</style>

          

        

</head>



<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content"></div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title"><img src="images/logoprint.jpg"? /> </div>  <div id="content-title-right">Trip Report</div>

  <div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="center_pane_bi"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      

      <tr>

        <td height="30" colspan="2" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style=" ">

          <tr class="black_text">

            <td height="75" colspan="5" rowspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><table width="100%" border="0" align="left" cellpadding="5" cellspacing="0" style="border:#CCC 1px solid; ">

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

            <td height="75" colspan="4" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid;" >Expected Visitors :<strong>

<?php if($no_of_visitors==0){

				echo '<strong>uknown</strong>';

			}else{

			echo $no_of_visitors;

			} ?>

            </strong></td>

            <td height="75" colspan="6" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >T/L:<strong>
              
  <?php echo $team_leader?>
              
            </strong><!--<div class="css-vertical-text_inner"><?php echo $group_name?></div>--></td>

            </tr>

          <tr class="black_text">

            <td height="38" colspan="4" bgcolor="#F0F0F0" style="border-bottom:0px #C0C0C0 solid" align="right" >Vehicle:</td>

            <td height="38" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="38" colspan="5" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><?php 

			 $sql = mysqli_query($conn,"SELECT * FROM tbl_vehicle WHERE vehicle_id=$vehicle and deleted = 0")or die(mysqli_error($conn)());

			 $numofrows=mysqli_num_rows($sql);

             while($result= mysqli_fetch_array($sql)){;

  

	$reg_code  = $result['reg_code']; 

	$vehicle_id=$result['vehicle_id'];

	if($numofrows<0)

	 echo '<b>no assigned</b> ';

		 else{

				 echo $reg_code;

				 }

				 }

				 //driver?></td>
            </tr>

          <tr class="black_text">

            <td height="19" colspan="4" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" align="right" >Driver</td>

            <td height="19" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >:</td>

            <td height="19" colspan="5" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><?php

			 

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

	

	?></td>
            </tr>

            <tr class="black_text">

            <td height="50" colspan="3"  style="border-bottom:1px #C0C0C0 solid" ><strong>Special Requirements:</strong></td>

            <td width="11%" height="50"  style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="50" colspan="11" bgcolor="#fdfdfd" style="border-bottom:1px #C0C0C0 solid" ><?php echo 	$spreqs?></td>
            </tr>

            <tr class="black_text">

            <td height="33" colspan="5" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Itinerary List</strong></td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="6" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            </tr>

            <tr class="black_text">

            <td width="2%" height="24" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Day</td>

            <td width="5%" height="24" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Date</td>

            <td colspan="4" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Itinerary</td>

            <td width="13%" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Hotel</td>

            <td width="4%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Terms</td>

            <td colspan="5" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" align="center">Rooming</td>

            <td width="5%" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;border-right:1px #eaeaea solid">Status</td>

            <td rowspan="2" width="12%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Comments</td>

            </tr>

            <tr class="black_text">

              <td width="2%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Sin</td>

              <td width="3%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Twn</td>

              <td width="2%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid">Dbl</td>

              <td width="2%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;border-right:1px #eaeaea solid">Trp</td>

              <td width="4%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;border-right:1px #eaeaea solid">c. Bed</td>

            </tr>

            

              <?php  

$trip_sql = mysqli_query($conn,"SELECT  * FROM  tbl_itinerary WHERE trip_id = $tripID AND deleted=0 order by date asc")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($trip_sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="15" align="center" valign="middle" bgcolor="#fff" class="italix">No Itinerary Yet</td>

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

$comments=$result['remarks'];

$child_beds=$result['child_beds'];



	 

	

    if($i % 2) { //this means if there is a remainder

        

		?><tr>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"> <?php echo $title?>

      <br /></td>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php $dat=strtotime($date); echo date('d. M', $dat);?>    </td>

    <td height="37" colspan="4" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid; padding-left:2px;">

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

$trip_hotel_id  = $result['hotel_id'];

$booking  = $result['booking'];

$status  = $result['status'];



	$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $trip_hotel_id")or die(mysqli_error($conn)());

	$result_town = mysqli_fetch_assoc($town_sql);

	

	echo $hotel_name = $result_town['hotel_name'];

	

	}

	?></td>

    <td bgcolor="#F0F0F0" class="black_text" align="center" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $booking?></td>

    <td align="center" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $singles;?></td>

    <td align="center" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $twins?></td>

    <td bgcolor="#F0F0F0" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $doubles?></td>

    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $triples;?></td>

    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $child_beds?></td>

    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $status?></td>

    <td nowrap="nowrap"bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid; word-break: break-all;"><div style="width:100%; white-space:normal"><?php echo $comments?></div></td>

	

	</tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $title?><br /></td>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php $dat=strtotime($date); echo date('d. M ', $dat);?></td>

            <td height="37" colspan="4" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid; padding-left:2px;">

              <?php echo $details

	?>        </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php  

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

            <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $child_beds?></td>

            <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php   // hotel types

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id=$itnid and  trip_id = $tripID")or die(mysqli_error($conn)());



$result = mysqli_fetch_array($sql);

if(!$result){

	echo "-";

	//$booking="-";

	$status="-";

	} else{

//$trip_hotel_id  = $result['hotel_id'];

//$booking  = $result['booking'];

echo $status  = $result['status']; }?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid; word-break: break-all;"><div  style="width:100%; white-space:normal"><?php echo $comments?></div></td>

           

          </tr> 

          <?php

    }

   

}

	?> <tr class="black_text" style="border-top:2px #eded11 solid" bordercolor="#ff6600">

              <td height="25" colspan="15" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <tr class="black_text">

            <td height="33" colspan="5" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Flights</strong></td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="6" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            </tr> <tr>

             <td height="75" colspan="15" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><table width="95%" border="0" align="right" cellpadding="5" cellspacing="1" style=" border:#CCC 1px solid;">

               <tr>

                 <td width="22%" height="24" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Airline Name</strong></td>

                 <td width="31%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Route</strong></td>

                 <td width="17%" height="24" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Date</strong></td>

                 <td width="16%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Dep. Time</strong></td>

                 <td width="14%" height="24" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Arrival Time</strong></td>

                 </tr>

               <?php  

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_flights WHERE deleted=0 AND trip_id = $tripID")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);

if($numofrows == 0){?>

               

               <tr>

                 <td bgcolor="#FFFFFF" colspan="5">No flight has been scheduled!</td>

                 </tr>

               <?php	}

					

else{



while($result = mysqli_fetch_array($sql)){ //get a row from our result set

	$date  = $result['date'];

	$arr_time  = $result['arr_time'];

	$dep_time  = $result['dep_time'];

	$from  = $result['from'];	$to  = $result['to'];

	$status  = $result['status'];

	$flightid  = $result['flight_id'];

	$airline = $result['airline'];

		$flight_type = $result['flight_type'];

	   

	

    //if($i % 2) { //this means if there is a remainder

        

		?>

               

               

               <tr>

                 <td bgcolor="#FFFFFF">

                   <?php echo $airline?>                   </td>

                 <td bgcolor="#FFFFFF"> <?php echo $from?>-<?php echo $to?> <?php if($flight_type==2){ echo '<b>(Return Journey)</b>';}?></td>

                 <td bgcolor="#FFFFFF"><?php echo $date?></td>

                 <td bgcolor="#FFFFFF"><?php echo $dep_time ?></td>

                 <td bgcolor="#FFFFFF"><?php echo $arr_time?></td>

                 <?php }

				}?>

                 </tr>

               

               

               

             </table></td>

            </tr>



        </table></td>

      </tr>

     <tr id="servedby"class="italix">

            <td height="5" align="left" bgcolor="#333333"><p>

              <?php echo date("F j, Y, g:i a");?>

            </p></td>

            <td align="left" bgcolor="#333333">

              Served By:

            <?php echo $_SESSION['f_name']?>

            </td>

        <td height="5" colspan="10" align="center" bgcolor="#333333">&nbsp;</td>

           </tr>

  </table></div>

    <div id="bilaz"></div>



</div>



</div>

</div>

</body>

</html>