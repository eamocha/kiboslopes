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

  <div id="content_box_title"><img src="images/logoprint.jpg"? /> </div>  <div id="content-title-right">Group <?php echo $group_name?> Visitors Details</div>

  <div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="center_pane_bi"><table width="100%" border="0" cellpadding="0" cellspacing="0">

          <tr class="black_text">

            <td height="24" colspan="11" nowrap="nowrap" bgcolor="#CCC" style="border-bottom:3px #C0C0C0 solid" >Vistors List for <b><?php echo $group_name?></b></td>

            

          </tr> <tr class="black_text">

            <td height="24" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >ID</td>

            <td colspan="3" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Full Name</td>

            <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Passport</td>

            <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Home Address</td>

            <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Nationality</td>

            <td bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Room</td>

            <td colspan="2" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Insurance</td>

            <td width="6%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Age</td>

            </tr>

  <?php  

$sql = mysqli_query($conn,"SELECT * FROM  tbl_visitors WHERE trip_id = $tripID AND deleted=0 ")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="12" align="center" valign="middle" bgcolor="#fff" class="italix">No  Visitors Details entered on this trip</td>

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

	$gender=$result['gender'];

	$insurance=$result['insurance'];

	$sharing_tripple=$result['sharing_triple'];

	$age  = $result['age'];



	   

	

  //this means if there is a remainder

        

		?><tr style="border-bottom:1px #C0C0C0 solid">

    <td height="37" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"> <?php echo $visitor_id?></td>

    <td height="37" colspan="3" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $visitor_name?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years)'; }?>

      <br /></td>

    <td bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $passport_details?>

  </td>

    <td bgcolor="#F3F3F3" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $address

	?>    </td>

    <td bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $nationality?>  </td>

    <td nowrap="nowrap" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $room_type?>    </td>

    <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $insurance?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $age?></td>

  

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

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $sharing_with?>

         <br /></td>

            <td height="37" colspan="3" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php

							 echo $v_name;

				   ?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years)'; }?>

            </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $pp_details?>

           </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $home_address?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $nation?>   

            </td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $room_type?>

        </td>

            <td colspan="2" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $insurance_details?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $age?></td>

          </tr>

           <?php }}

	

	



			

    }

   



	?>   

                    

          

     <tr id="servedby"class="italix">

            <td height="5" align="left" bgcolor="#333333"><p>

              <?php echo date("F j, Y, g:i a");?>

            </p></td>

            <td align="left" bgcolor="#333333">

              Served By:

            <?php echo $_SESSION['f_name']?>

            </td>

        <td height="5" colspan="9" align="center" bgcolor="#333333">&nbsp;</td>

           </tr>

  </table></div>

    <div id="bilaz"></div>



</div>



</div>

</div>

</body>

</html>