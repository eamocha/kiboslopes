<?php

session_start();

include('auth.php'); 



include('lib/config.php'); 



//call functions

include('lib/functions.php');

$tripID = $_GET['inc'];

//trip details

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trips WHERE trip_id = $tripID")or die(mysqli_error($conn)());

$result=mysqli_fetch_array($sql);



$tripname=$result['group_name'];

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

			



			

		});</script>

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

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">

      

      <li ><a title="KIBO SLOPES" href="view_trip.php?inc=<?php echo $tripID;?>"><img src="images/icon2.png" alt="" width="27" height="21" />  Trip</a></li>

      <li><a  title="KIBO SLOPES" href="flights.php?inc=<?php echo $tripID?>"><img src="images/icon2.png" width="27" height="21" />Flights</a></li>

      

      <li style="background:#F0F0F0;"><a title="KIBO SLOPES" href="hotels.php?inc=<?php echo $tripID?>"><img src="images/icon2.png" alt="" width="27" height="21" />Hotels</a></li>

    </ul>

<div><span class="al-head">Alerts</span><span  id="alerts">-Others data<br />

</span></div>

<div><span class="al-head">Changes</span><span id="changes"><?php

$changes_sql=mysqli_query($conn,"SELECT * FROM `tbl_changes` left join `tbl_users` on tbl_users.user_id=tbl_changes.user_id WHERE `trip_id`='$tripID' and (tbl_changed_id=3 or (tbl_changed_id=1 and (changed_item_id=4 or changed_item_id=5 or changed_item_id=6 or changed_item_id=7))) order by change_date desc") or die('Unable to get changes data'.mysqli_error($conn)());



if(mysqli_num_rows($changes_sql)==0){

	echo ' No Hotel changes have been made';

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

        <td width="341" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Hotels </a></div>

            <ul>

              <li>

                <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_hotel.php?inc=<?php echo $tripID?>" title="Hotel" style="padding-left:25px;">Add Hotel</a></li>

                  </ul>

                </li>

              

             

              <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                

                <ul>

                

                  <li><a class='example5' href="#" title="Kiboslopes" style="padding-left:25px;">Print List</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td width="379" height="62" align="right" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">

        <thead>  <tr class="black_text">

       

            <th width="10%"  ><strong>Date</strong></th>

            <th width="23%" ><strong>Booking Voucher </strong></th>

            <th width="22%" ><strong>Hotel Name</strong></th>

            <th width="11%"  ><strong>Status</strong></th>

            <th width="16%"  >Accounts</th>

            <th width="18%" >&nbsp;</th>

            </tr></thead>

  <?php  $sql_itn = mysqli_query($conn,"SELECT   * FROM   tbl_itinerary WHERE trip_id = $tripID and deleted=0 ")or die(mysqli_error($conn)());



$numofrows = mysqli_num_rows($sql_itn);

 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="7" align="center" valign="middle" bgcolor="#fff" class="italix">No Hotels!</td>

            </tr>

	<?php	}

	else{

 $result_itn = mysqli_fetch_array($sql_itn);

$tripid= $result_itn['trip_id'];

$itn_id=$result_itn['itinerary_id'];

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE trip_id = $tripid and deleted=0  group by hotel_id order by booking_date ")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);



for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($sql); //get a row from our result set

	$trip_hotel_id  = $result['trip_hotel_id'];

	$trip_id  = $result['trip_id'];

	$hotel_id  = $result['hotel_id'];

	$booking_voucher  = $result['voucher_remarks'];

	//$in_date  = $result['in_date'];

	//$out_date  = $result['out_date'];

	$booking_date  = $result['booking_date'];

	$status  = $result['status'];

	$booking  = $result['booking'];

	$itinerary_id=$result['itineray_id'];

	

	   

	

    if($i % 2) { //this means if there is a remainder

        

		?><tr class="alt_row2">



    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

    <?php echo date('d.m.Y',strtotime($booking_date))?>

     </td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $tripname?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

      <?php 

	

	$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $hotel_id")or die(mysqli_error($conn)());

	while($result_town = mysqli_fetch_assoc($town_sql)){

	echo $hotel_name = $result_town['hotel_name'];

	}

	?>

	

    </td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $status?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><a href="view_hotel.php?inc=<?php echo $tripID?>&hot=<?php echo $hotel_id?>">View Details</a> <!--| <a href="includes/delete_trip_hotel.php?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel_id?>">Cancel </a> !--></td>

    </tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr class="alt_row1">

       

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

                <?php echo date('d.m.Y',strtotime($booking_date))?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $tripname?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

             <?php 

	

	$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $hotel_id")or die(mysqli_error($conn)());

	while($result_town = mysqli_fetch_assoc($town_sql)){

	echo $hotel_name = $result_town['hotel_name'];

	}

	?>

            </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $status?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a href="view_hotel.php?inc=<?php echo $tripID?>&hot=<?php echo $hotel_id?>">View Details</a> <!--| <a href="includes/delete_trip_hotel.php?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel_id?>"> Cancel</a>--></td>

            </tr> <?php

    }

   

}

	}?>

          

          <tr>

            <td height="24" colspan="7" bgcolor="#333333" class="white_text">&nbsp;</td>

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