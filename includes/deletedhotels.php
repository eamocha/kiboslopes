<?php

session_start();

include('auth.php'); 

include('lib/config.php'); 



//call functions

include('lib/functions.php');



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

     <li><a href="reservations.php">RESERVATIONS </a></li>

      <li><a href="accounts.php">ACCOUNTS</a></li>

    <li ><a href="operations.php">OPERATIONS</a></li>

    <li>&nbsp;&nbsp;&nbsp;ADMINISTRATION&nbsp;&nbsp;&nbsp;</li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">

      

      <li><a title="KIBO SLOPES" href="users.php">Users and Roles</a></li>

      <li><a class=''  title="KIBO SLOPES" href="vehicles.php">Vehicles/Drivers</a></li>

<li style="background:#F0F0F0;"><a class=''  title="KIBO SLOPES" href="hotel.php">Hotels</a></li>

<li>Deleted Hotels</li>

    </ul>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="200" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Hotels </a></div>

            <ul>

             

              <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_parcel.php" title="KAMPS" style="padding-left:25px;">Print List</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td  height="62" align="right" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">

          <tr>

            <td height="47" colspan="3" align="center" valign="middle" bgcolor="#fff" class="italix"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">

              <tr class="black_text">

            

                <td width="4%" height="24" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Code</strong></td>

                <td width="25%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Hotel Name</strong></td>

                <td width="16%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Location</td>

                <td width="15%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Email</td>

                <td width="15%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Phone</td>

                <td width="12%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Description</td>

                <td width="13%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

              </tr>

              <?php  

$trip_sql = mysqli_query($conn,"SELECT 

  *

FROM

  tbl_hotels where deleted=0")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($trip_sql);



 if($numofrows == 0){?>

              <tr>

                <td height="47" colspan="7" align="center" valign="middle" bgcolor="#fff" class="italix">&nbsp;</td>

              </tr>

              <?php	}

for($i = 0; $i<$numofrows; $i++) {

    $result_tickets = mysqli_fetch_array($trip_sql); //get a row from our result set

	$hotel_id  = $result_tickets['hotel_id'];

	$hotel_name  = $result_tickets['hotel_name'];

	$location= $result_tickets['hotel_location'];

	$phone= $result_tickets['phone'];

	

	$fax= $result_tickets['fax'];

	$des= $result_tickets['hotel_description'];

	   

	

    if($i % 2) { //this means if there is a remainder



		?>

              <tr>



                <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $hotel_id?></td>

                <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $hotel_name?></td>

                <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $location?></td>

                <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $fax?></td>

                <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $phone?></td>

                <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $des?></td>

                <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a class="example5" href="edit_hotel.php?inc=<?php echo $hotel_id?>">Edit</a> | <a href="includes/deletehotel.php?inc=<?php echo $hotel_id?>">Delete</a></td>

              </tr>

<?php

    } else { //if there isn't a remainder we will do the else

       ?>

              <tr>



                <td height="37" bgcolor="#FFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $hotel_id?></td>

                <td bgcolor="#Fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $hotel_name?></td>

                <td bgcolor="#Fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $location?></td>

                <td bgcolor="#Fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $fax?></td>

                <td bgcolor="#Fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $phone?></td>

                <td nowrap="nowrap" bgcolor="#fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $des?></td>

                <td nowrap="nowrap" bgcolor="#fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a class="example5" href="edit_hotel.php?inc=<?php echo $hotel_id?>">Edit </a>| <a href="includes/deletehotel.php?inc=<?php echo $hotel_id?>">Delete</a></td>

              </tr>

<?php

    }

   

}

	?>

              <tr>

                <td height="24" colspan="9" bgcolor="#333333" class="white_text">&nbsp;</td>

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