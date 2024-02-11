<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];



include('lib/config.php'); 



//call functions

include('lib/functions.php');

$tripID = $_GET['tripID'];

$fid = $_GET['fid'];



?>

  <?php  $fl_sql = mysqli_query($conn,"SELECT   * FROM   tbl_flights WHERE deleted=0 AND flight_id = $fid")or die(mysqli_error($conn)());

$numofrowsf = mysqli_num_rows($fl_sql);



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

	(int)$adults  = $fl_result['adults'];

	(int)$kids  = $fl_result['kids'];

	(int)$adultsfare  = $fl_result['adultfare'];

	(int)$kidfare  = $fl_result['kidfare'];

	$flight_type  = $fl_result['flight_type'];	

	$airline  = $fl_result['airline'];	$contacts  = $fl_result['contacts'];

  

	

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

        

        

        </script>

        

</head>



<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

<img src="print_hotel_clip_image001.jpg" alt="" width="547" height="70" />

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="">

  <table width="100%" border="0" cellpadding="0" cellspacing="0">



  

      

   <tr>

                <td  height="30" width="20%" bgcolor="#FFFFFF" >Booking Voucher</td>

                <td colspan="3"  bgcolor="#FFFFFF">

				<?php

                $sql = mysqli_query($conn,"SELECT   * FROM   tbl_trips WHERE trip_id = $tripID and deleted=0")or die(mysqli_error($conn)());

$result=mysqli_fetch_array($sql);



echo $tripname=$result['group_name'];

				?></td>

          </tr>

              <tr>

                <td height="30"  bgcolor="#FFFFFF">To</td>

                <td width="43%" bgcolor="#FFFFFF" >

                

                <?php echo $airline?>

                

                

                </td>

                <td width="6%" bgcolor="#FFFFFF" >Fax</td>

                <td  bgcolor="#FFFFFF">[<?php echo $contacts?>]</td>

              </tr>

              <tr>

                <td  height="35" colspan="4" bgcolor="#FFFFFF"style="border-bottom:1px #C0C0C0 solid; border-right:0px #C0C0C0 solid"><strong>ATTENTION: Reservation</strong></td>

                </tr>

               <tr>

                <td rowspan="2" bgcolor="#FFFFFF">From</td>

                <td height="30" bgcolor="#FFFFFF" ><?php echo $_SESSION['f_name'];?></td>

                <td height="30" bgcolor="#FFFFFF" >Phone</td>

                <td height="30" bgcolor="#FFFFFF" >+254 2 2139981/2633217</td>

               </tr>

              <tr>

                <td height="30" bgcolor="#FFFFFF" >[Kibo Slopes Safaris Ltd.]</td>

                <td height="30" bgcolor="#FFFFFF" >Fax</td>

                <td height="30" width="31%" bgcolor="#FFFFFF" >+254 2 3861513</td>

              </tr>

              <tr>

                <td height="30" colspan="2" bgcolor="#FFFFFF" style="border-bottom:0px #C0C0C0 solid; border-right:0px #C0C0C0 solid">&nbsp;</td>

                <td bgcolor="#FFFFFF" style="border-bottom:0px #C0C0C0 solid; border-right:0px #C0C0C0 solid">E- mail</td>

                <td  bgcolor="#FFFFFF">[sales@kiboslopessafaris.com]</td>

              </tr>

              <tr>

                <td height="30" colspan="4" bgcolor="#FFFFFF" style="border-bottom:0px #C0C0C0 solid; border-right:0px #C0C0C0 solid"><p><u>Reservation Reference: <b><?php echo $reservation_ref?></b></u></p></td>

                </tr>

     

    </table>

    </table></tr>

     <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">

     <tr><td height="25"  style="border:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid" >Date</td>

     <td  style="border:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid">Arline</td>

     <td  style="border:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid">Destination/route</td>

     <td  style="border:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid">Dep. Time</td>

     <td  style="border:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid">Arrival</td></tr>

     <tr><td  height="25" style="border-bottom:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid"><?php echo $date?></td>

     <td  style="border-bottom:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid"><?php echo $plane_no?></td>

     <td  style="border-bottom:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid"><?php echo $from?>-<?php echo $to?> <?php if($flight_type==2){ echo '<b>(2 way)</b>';}?></td>

     <td  style="border-bottom:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid"><?php echo $dep_time?></td>

     <td  style="border-bottom:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid"><?php echo $arr_time?></td></tr>

     <tr><td  height="25" colspan="5"  style="border-bottom:0px #C0C0C0 solid; border-right:0px #C0C0C0 solid">&nbsp;</td>

     </tr>

     

     

     

     </table>

<table width="100%" style="border-collapse:collapse">

<tr class="black_text">

     <td colspan="2"><table width="177%" style="border-collapse:collapse">

<tr class="black_text">

     <td height="20" style="color:fff" align="left" bgcolor="#f3f3f3">Visitors list</td>

    </tr>

  <tr class="black_text">

    <td height="24" colspan="4" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Full Name</td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Nationality</td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Extra services </td>

  </tr>

  <?php 

$sql = mysqli_query($conn,"SELECT * FROM  tbl_flight_pax WHERE flight_id =$flightid GROUP BY visitor_id")or die(mysqli_error($conn)());

 $numofrows = mysqli_num_rows($sql); 



 if($numofrows == 0){?>

  <tr>

    <td height="47" colspan="6" align="center" valign="middle" bgcolor="#fff" class="italix">No Visitors on this flight</td>

  </tr>

  <?php	}

  else{

while($result = mysqli_fetch_array($sql)){ 

$visitor_id  = $result['visitor_id'];

   //get a row from our result set

$sql1 = mysqli_query($conn,"SELECT * FROM  tbl_visitors WHERE visitor_id=$visitor_id AND deleted=0 ")or die(mysqli_error($conn)());



$result1 = mysqli_fetch_array($sql1);//get a row from our result set

	

	$visitor_name  = $result1['visitor_name'];

$nationality  = $result1['nationality'];

$age  = $result1['age'];

$room_type= $result1['age'];

	/*$visitor_id  = $result['visitor_id'];



	$address  = $result['address'];



	$passport_details  = $result['passport_details'];

	$room_type  = $result['room_type'];

	$sharing_double=$result['sharing_double'];

	$insurance=$result['insurance'];

	$sharing_tripple=$result['sharing_triple'];*/



 //this means if there is a remainder

        

		?>

  <tr style="border-bottom:1px #C0C0C0 solid">

    <td height="37" colspan="4" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $visitor_name?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years old)'; }?>

   </td>

    <td class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $nationality?></td>

    <td  class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

  </tr>

 

  

  <?php

		

			

    }



    if($room_type!=''|| $room_type!='Single'){

		

              $share="SELECT `sharing_id`, `v_name`, `sharing_with`, `pp_details`, `insurance_details`, `home_address`, `nation`, `age` FROM `tbl_sharing` WHERE `sharing_with`=$visitor_id and deleted=0" or die();

			  $quer=mysqli_query($conn,$share);

			  $share_q=mysqli_fetch_array($quer);

				  $sharing_id=$share_q['sharing_id'];

				    $sharing_with=$share_q['sharing_with'];

				    $v_name=$share_q['v_name'];

					  $pp_details=$share_q['pp_details'];

					    $insurance_details=$share_q['insurance_details'];

						  $home_address=$share_q['home_address'];

						    $nation=$share_q['nation'];

							 (int)$age=$share_q['age'];

							 ?>

							 

							 <tr style="border-bottom:1px #C0C0C0 solid">

    <td height="37" colspan="4" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $v_name?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years old)'; }?>

   </td>

    <td class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $nation?></td>

    <td  class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

  </tr>

		<?php			 

    

            

	}

	}

   



	?>

</table></td>

    </tr>

 

    <tr>

      <td><p><?php echo $adults?> Adult(s) <b> <?php echo $currency?>  <?php echo $adultsfare?> </b> p.person</p>

      <?php if($kids>0){

		  ?>

		  <p><?php echo $kids?> Kids fare <b> <?php echo $currency?>  <?php echo $kidfare?></b>  p.child</p>

		  <?php }?>

        <p>Thank you in advance.</p></td>

      <td><span style="font-size:130%">Total<?php echo ' ';

	  echo $currency; echo '. ';

	  echo $total=$kids*$kidfare+$adults*$adultsfare;?> </span></td>

    </tr>

          <tr height="30" id="servedby" class="black_text">

               <td height="20"  colspan="2" align="left"bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

               <td height="20"  colspan="" align="left"bgcolor="#333333">Kind Regards: 

                 <?php echo $_SESSION['f_name']?>-Kibo Slopes</td>

                </tr>

</table>

<div id="messages"></div>

</div>

    <div id="bilaz"></div>



</div>

  </form>

</div>

</div>

</body>

</html>