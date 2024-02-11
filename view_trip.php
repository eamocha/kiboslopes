<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>

<link href="css/styles.css" rel="stylesheet" type="text/css" />

 <!-- Validation Engine-->

 	<script src="js/jquery-1.8.2.js" type="text/javascript"></script>
	<script  src="js/datepicker/jqueryui.js" type="text/javascript"></script>
	<script src="js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
	<script src="js/validation/jquery.validationEngine.js" type="text/javascript"></script>

    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

	<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

        <!--Validation End-->

        <!-- Color Box -->

        <link media="screen" rel="stylesheet" href="css/colorbox.css" />

        <script src="js/jquery.colorbox.js"></script> 
        <script type="text/javascript" src="js/jquery.timepicker.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />
        <link rel="stylesheet" href="js/datepicker/jqueryui.css" type="text/css" />


         <!-- Color Box End -->



        

<script language="javascript">   
	 
$(document).ready(function(){

	$("#MyForm").validationEngine();

	$('.example5').colorbox({ 

    	onComplete : function() { 

       $(this).colorbox.resize(); 

    	}    

	});

	$.colorbox.resize();

});


function getconfirm(strTitle){
		if (confirm("Are you sure you want to delete "+strTitle+"?")==true)
			return true; 
		else 
		return false;
}

</script>

<style type="text/css">
    tr:nth-child(even){ background-color:#f0f0f0;} 
	tr:nth-child(odd)  { background-color:#fff;}
	td{padding:2px;}
</style>
</head>

<?php

session_start();

include('auth.php'); 



include('lib/config.php'); 



//call functions

include('lib/functions.php');



$tripID = $_REQUEST['inc']; 

// include changes





 $sql = mysqli_query($conn,"SELECT * FROM tbl_trips WHERE trip_id = $tripID")or die(mysqli_error($conn)());

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

<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="images/logo.png" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?> |<a href="changepass/change-pwd.php?id=<?php echo $id?>">Change Pass</a>|<a href="lib/logout.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  

  

  <div id="content_box_title">Trip View</div><!--refres-->

  

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="dashboard.php">dashboard</a></li>

     <li>&nbsp;&nbsp;&nbsp;RESERVATIONS &nbsp;&nbsp;&nbsp;</li>

      <li><a href="accounts.php">ACCOUNTS </a></li>

    <li ><a href="operations.php">OPERATIONS </a></li>

    <li><a href="administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong><br />

  

  

 

    <ul id="left_nav_menu">

      

      <li style="background:#F0F0F0;"><a title="KIBO SLOPES" href="reservations.php"><img src="images/icon2.png" alt="" width="27" height="21" />  Trips</a></li>

      <li><a title="KIBO SLOPES" href="flights.php?inc=<?php echo $tripID?>"><img src="images/icon2.png" width="27" height="21" />Flights</a></li>

      

      <li><a title="KIBO SLOPES" href="hotels.php?inc=<?php echo $tripID?>"><img src="images/icon2.png" alt="" width="27" height="21" />Hotels</a></li>

    </ul>

<div><span class="al-head">Alerts</span><span  id="alerts">-Others data<br />

    -cdata 2</span></div>

<div><span class="al-head">Changes</span><span id="changes">



<!--pop up -->

<!-- ALWAYS ON TOP FLOATING LAYER POP-UP -->



<script language="JavaScript" type="text/javascript">



var y1 = 20;   // change the # on the left to adjuct the Y co-ordinate

(document.getElementById) ? dom = true : dom = false;



function hideIt() {

  if (dom) {document.getElementById("layer1").style.visibility='hidden';}

}



function showIt() {

  if (dom) {document.getElementById("layer1").style.visibility='visible';}

}



function placeIt() {

  if (dom && !document.all) {document.getElementById("layer1").style.top = window.pageYOffset + (window.innerHeight - (window.innerHeight-y1)) + "px";}

  if (document.all) {document.all["layer1"].style.top = document.documentElement.scrollTop + (document.documentElement.clientHeight - (document.documentElement.clientHeight-y1)) + "px";}

  window.setTimeout("placeIt()", 10); }

// -->

</script><!-- end pop up-->

<div id="layer1" style="position:absolute; color:#FFF; left:20; width:410px; height:10; visibility:hidden">

   <font face="verdana, arial, helvetica, sans-serif" size="2">

    <div style="float:left; background-color:#333; padding:3px; border:none; font-style:normal;">

    <span style="float:right; background-color:gray; color:white; font-weight:bold; width='20px'; text-align:center; cursor:pointer" onclick="javascript:hideIt()">&nbsp;X&nbsp;</span>

	<?php

$changes_sql=mysqli_query($conn,"SELECT * FROM `tbl_changes` left join `tbl_users` on tbl_users.user_id=tbl_changes.user_id WHERE `trip_id`='$tripID'  order by change_date desc") or die('Unable to get changes data'.mysqli_error($conn)());



if(mysqli_num_rows($changes_sql)==0){

	echo ' No changes have been made';

	} else{

		echo "<ol>";

while($changes=mysqli_fetch_array($changes_sql)){

$change_id=$changes['change_id'];

$user=$changes['user_id'];

$changed_data=$changes['chage_data'];

$date_changed=$changes['change_date'];

$tablechanged=$changes['tbl_changed_id'];

 $changed_item_id=$changes['changed_item_id'];

echo "<li>";

echo " <span style='color:red; display:block'>".$date_changed=$changes['change_date'].': </span>'; 

echo $description=$changes['description'];

echo ' </span><strong>By </strong>';

echo '<strong id="changesname">'.$changes['full_name'].'</strong>';

//$by=mysqli_query($conn,"SELECT * FROM `tbl_changes` WHERE user_id=$user ") or die('Failed '.mysqli_error($conn)());

//$res=mysqli_fetch_array($by);

//echo  /*

//$res['name'].'</li></ul>';



}

}?>  </div>

   </font>

</font>

</div><?php

$changes_sql=mysqli_query($conn,"SELECT * FROM `tbl_changes` left join `tbl_users` on tbl_users.user_id=tbl_changes.user_id WHERE `trip_id`='$tripID'  order by change_date Limit 10") or die('Unable to get changes data'.mysqli_error($conn)());



if(mysqli_num_rows($changes_sql)==0){

	echo ' No changes have been made';

	} else{

while($changes=mysqli_fetch_array($changes_sql)){

$change_id=$changes['change_id'];

$user=$changes['user_id'];

$changed_data=$changes['chage_data'];

$date_changed=$changes['change_date'];

$tablechanged=$changes['tbl_changed_id'];

 $changed_item_id=$changes['changed_item_id'];

echo "<ul><li>";

echo " <span onclick='showIt()' style='color:red; display:block'>".$date_changed=$changes['change_date'].': </span>'; 

echo $description=reduce_str($changes['description'],80);

echo ' </span><strong>By </strong>';

echo '<strong id="changesname">'.$changes['full_name'].'</strong>';

//$by=mysqli_query($conn,"SELECT * FROM `tbl_changes` WHERE user_id=$user ") or die('Failed '.mysqli_error($conn)());

//$res=mysqli_fetch_array($by);

//echo  /*

//$res['name'].'</li></ul>';



}

}?></span></div></div>

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

                  <li><a class='example5' href="forms/add_visitor.php?inc=<?php echo $tripID?>" title="KiboslopeS" style="padding-left:25px;">Add Visitors</a></li>

                  </ul>

                </li>

              

              <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                 <ul>

                  <li><a title="KiboslopeS" style="padding-left:25px;" class="example5" href="report_print.php?inc=<?php echo $tripID?>">Print itinerary</a></li>

                  </ul>

                </li>

                 <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                 <ul>

                  <li><a title="KiboslopeS" style="padding-left:25px;" class="example5" href="print_vistor_frame.php?inc=<?php echo $tripID?>">Print vistors</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td width="379" height="62" align="left" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9; padding-top:0px;"><a  href="forms/add_itinerary.php?inc=<?php echo $tripID?>" title="KiboslopeS"><img src="images/add_itin.jpg" width="48" height="42" /></a></td>

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

                <td bgcolor="#FFFFFF"><?php echo date('d.m.Y',strtotime($arrival_date))?></td>

                <td bgcolor="#FFFFFF">Time: <?php echo $arrival_time?></td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Departure </td>

                <td bgcolor="#FFFFFF"><?php echo date('d.m.Y',strtotime($dep_date))?></td>

                <td bgcolor="#FFFFFF">Time: <?php echo $dep_time?></td>

              </tr>

            </table>

                      <a  class='example5' href="edit_trip.php?gno=<?php echo $group_no?>"></a><a  class='example5' href="edit_trip.php?gno=<?php echo $group_no?>"></a></td>

            <td height="75" colspan="4" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid; border-right:1px #C0C0C0 solid;" >No. of pax:<strong>

<?php if($no_of_visitors==0){

				echo '<strong>uknown</strong>';

			}else{

			echo $no_of_visitors;

			} ?>

            </strong></td>

            <td height="75" colspan="6" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >T/L:<strong><?php echo $team_leader;?></strong></td>

            <td width="11%" height="75" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            </tr>

          <tr class="black_text">

            <td height="38" colspan="4" rowspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><a  class='example5' href="edit_trip.php?gno=<?php echo $group_no?>&user=<?php echo $id?>">Edit Details</a></td>

            <td height="38" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >Vehicle:<br/></td>

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

            <td height="38" rowspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

          </tr>

          <tr class="black_text">

            <td height="19" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >Driver:              </td>

            <td height="19" colspan="5" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><?php

			 

  $sql = mysqli_query($conn,"SELECT * FROM categories WHERE category_id=$driver and status=0")or die(mysqli_error($conn)());

 $numofrows=mysqli_num_rows($sql);

  while($result= mysqli_fetch_array($sql)){

  

	$full_name  = $result['name']; 

	$user_id=$result['category_id'];

	if($numofrows<0)

	 echo '/<b>not assigned</b> ';

			 else{

				 echo $full_name;

				 }

  }

	

	?></td>

            </tr>

            <tr class="black_text">

            <td height="50" colspan="5" bgcolor="#000" style="border-bottom:1px #C0C0C0 solid" ><span style="font-weight:bold; color:#FFF;">Special Requirements:</span></td>

            <td height="50" colspan="12" bgcolor="#fdfdfd" style="border-bottom:1px #C0C0C0 solid" ><?php echo 	$spreqs?></td>

            </tr>

            <tr class="black_text">

            <td height="33" colspan="6" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Itinerary List</strong></td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="7" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            </tr>

            <tr class="black_text">

            <td width="4%" height="24" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Day</td>

            <td width="5%" height="24" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Date</td>

            <td colspan="5" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Itinerary</td>

            <td width="9%" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Hotel</td>

            <td width="6%" rowspan="2" align="center" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Terms</td>

            <td colspan="6" align="center" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Rooming</td>

            <td rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;border-right:1px #eaeaea solid">Status</td>

            <td rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            </tr>

            <tr class="black_text">

              <td width="4%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid ;border-bottom:3px #C0C0C0 solid">Sin</td>

              <td width="4%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid; border-bottom:3px #C0C0C0 solid">Twn</td>

              <td width="4%" nowrap="nowrap" align="center"  bgcolor="#F0F0F0" style="border-right:#EAEAEA 1px solid; border-bottom:3px #C0C0C0 solid">Dbl</td>

              <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;border-right:1px #eaeaea solid">Trp</td>
              <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;border-right:1px #eaeaea solid">FMr</td>

              <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;border-right:1px #eaeaea solid">C.Bed</td>

            </tr>

            

              <?php  

$trip_sql = mysqli_query($conn,"SELECT  * FROM  tbl_itinerary WHERE trip_id = $tripID AND deleted=0 order by date asc")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($trip_sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="17" align="center" valign="middle" bgcolor="#fff" class="italix">No Itinerary Yet</td>

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

$child_beds=$result['child_beds'];

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

    <td bgcolor="#F0F0F0" align="center" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $twins?></td>

    <td align="center" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $doubles?></td>

    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $triples;?></td>
    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $family_rooms;?></td>

    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $child_beds?></td>

    <td align="center" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $status?></td>

    <td nowrap="nowrap"bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><a  href="forms/edit_itinerary.php?itnid=<?php echo $itnid?>&inc=<?php echo $tripID?>">Edit </a> </td>

	

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
            <td  align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $family_rooms;?></td>

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

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><a  href="forms/edit_itinerary.php?itnid=<?php echo $itnid?>&inc=<?php echo $tripID?>">Edit </a></td>

           

          </tr> 

          <?php

    }

   

}

	?> <tr class="black_text" style="border-top:2px #eded11 solid" bordercolor="#ff6600">

              <td height="25" colspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td height="25" colspan="3" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td colspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td height="25" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td height="25" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td height="25" colspan="2" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td width="4%" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>
              <td width="4%" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td width="4%" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

              <td bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <tr class="black_text">

            <td height="33" colspan="17" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Visitors List</strong></td>

            </tr>

          <tr class="black_text">

            <td height="24" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >ID</td>

            <td colspan="3" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Full Name</td>

            <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Passport</td>

            <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Home Address</td>

            <td colspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Nationality</td>

            <td bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Room</td>

            <td colspan="4" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Insurance</td>

            <td width="6%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Age</td>

            <td bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

          </tr>

  <?php  

$sql = mysqli_query($conn,"SELECT * FROM  tbl_visitors WHERE trip_id = $tripID AND deleted=0 ")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="17" align="center" valign="middle" bgcolor="#fff" class="italix">No Visitors on this trip</td>

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

    <td height="37" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"> <?php echo $visitor_id?></td>

    <td height="37" colspan="3" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $visitor_name?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years)'; }?>

      <br /></td>

    <td colspan="2" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $passport_details?>

  </td>

    <td colspan="2" bgcolor="#F3F3F3" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $address

	?>    </td>

    <td colspan="2" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $nationality?>  </td>

    <td nowrap="nowrap" bgcolor="#FaFaFa" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $room_type?>    </td>

    <td colspan="4" nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $insurance?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $age?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><a class="example5"  href="edit_visitors.php?inc=<?php echo $visitor_id?>&amp;tripid=<?php echo $tripID?>">Edit </a>   | <a onclick="return getconfirm('<?php echo addslashes($visitor_name);?>');" href="includes/delete_visitors.php?inc=<?php echo $visitor_id?>&amp;tripid=<?php echo $tripID?>">Delete</a></td>

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

            <td colspan="2" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $pp_details?>

           </td>

            <td colspan="2" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $home_address?></td>

            <td colspan="2" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $nation?>   

            </td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $room_type?>

        </td>

            <td colspan="4" nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $insurance_details?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><?php echo $age?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#c0c0c0 1px solid; border-right:#EAEAEA 1px solid"><a class="example5" href="edit_shared.php?inc=<?php echo $visitor_id?>&amp;tripid=<?php echo $tripID?>&amp;share_id=<?php echo $sharing_id?>">Edit </a> | <a onclick="return getconfirm('<?php echo addslashes($v_name);?>');" href="includes/delete_sharing_visitor.php?inc=<?php echo $visitor_id?>&amp;tripid=<?php echo $tripID?>&amp;share_id=<?php echo $sharing_id?>">Delete</a></td>

            </tr>

           <?php }}

	

	



			

    }

   



	?>   

                    

          

          <tr class="black_text">

            <td height="33" colspan="6" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Flights</strong></td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="7" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="33" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            </tr> <tr>

             <td height="75" colspan="17" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><table width="95%" border="0" align="right" cellpadding="5" cellspacing="1" style="border:#CCC 1px solid;">

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

    </table></div>

    <div id="bilaz"></div>



</div>

  </form>

</div>

</div>

</body>

</html>