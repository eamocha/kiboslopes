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

<script type="text/javascript" src="js/jquery-1.8.2.js"></script>



    <script src="js/js/languages/jquery.validationEngine-en.js" type="text/javascript"></script>

    <script src="js/js/jquery.validationEngine.js" type="text/javascript"></script>

    

    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

        

        <!--Validation End-->

        <!--date picker-->

        <link rel="stylesheet" href="js/datepicker/jqueryui.css" type="text/css" />

        <script src="js/datepicker/jqueryui.js" type="text/javascript" ></script>

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

     <li><a href="reservations.php">&nbsp;&nbsp;&nbsp;RESERVATIONS &nbsp;&nbsp;&nbsp;</a></li>

      <li><a href="accounts.php">ACCOUNTS </a></li>

    <li >&nbsp;OPERATIONS&nbsp; </li>

    <li><a href="administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav"> <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">

      <li><a title="KIBO SLOPES" href="cars_drivers.php">Cars and Drivers</a></li>

      <li style="background:#F0F0F0;"><a class=''  title="KIBO SLOPES" href="car_hire.php">Car Hire</a></li>

      <li><a class=''  title="KIBO SLOPES" href="vehicle_assign.php">Assignments </a></li>

      <li>Combine Trips</li>



    </ul>

  </div>

  <div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="341" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Car Hire details </a></div>

            <ul>

             

              <li>

                <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_hire_company.php" title="cars" style="padding-left:10px; text-transform:capitalize">Add hire company</a></li>

                  </ul>

                </li>

                <li>

                <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_car_hire.php" title="Car" style="padding-left:25px;">Hire Car</a></li>

                  </ul>

                </li>

              <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_parcel.php" title="KAMPS" style="padding-left:25px;">Print List</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td width="379" height="62" align="right" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"> <div id="dtsearch">

<form id="DateForm"  name="DateForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><input name="inputDate" class="inputDate" id="inputDate" value="<?php // =$todates;?>" />

    <input type="submit" name="button" id="button" value="   Go   " />

  </form></div>

  <div id="beat"></div></td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">

          <tr class="black_text">

            <td width="16%" height="24" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Driver</strong></td>

            <td width="14%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Vehicle Code</strong></td>

            <td width="9%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Capacity</strong></td>

            <td width="21%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Contacts</strong></td>

            <td width="19%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Company</strong></td>

            <td width="21%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            </tr>

  <?php  

$sql = mysqli_query($conn,"SELECT   * FROM tbl_hire_car")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="6" align="center" valign="middle" bgcolor="#fff" class="italix">No hire service details in this system !</td>

            </tr>

	<?php	}

for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($sql); //get a row from our result set

	$driver  = $result['driver_name'];

	$pay  = $result['payment_status'];

	$hireday  = $result['day_of_hire'];

	$returnday  = $result['day_of_return'];

	$company  = $result['company_id'];

	

	   //DETAILS 

	    $hiresql=mysqli_query($conn,"SELECT * FROM tbl_hire_company WHERE company_id=$company");

	while($result = mysqli_fetch_array($hiresql)){

	 $vehiclecode=$result['vehicle_code'];

	 $comp_name=$result['company_name'];

	 $capacity=$result['capacity'];

	 $phone=$result['phone'];

	 	 $fax=$result['fax'];

		  $comments=$result['comments'];

	}

 

	

    if($i % 2) { //this means if there is a remainder

        

		?><tr>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $driver?></td>

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

     <?php echo $vehiclecode?>

      <br /></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

	<?php echo $capacity?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $phone

	?>

    </td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $comp_name?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a class='example5'href="forms/edit_vehicle.php&gt;" title="Vehicle Assignment" style="padding-left:5px;" >Assign</a> |<a href=""> Edit </a>|<a href=""> Delete</a></td>

    </tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $driver?></td>

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo  $vehiclecode?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $capacity?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $phone

	?>

            </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $comp_name?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a class='example5'href="forms/edit_vehicle.php" title="Vehicle Assignment" style="padding-left:5px;" >Assign</a> | <a href="">Edit </a>|<a href=""> Delete</a></a></td>

            </tr> <?php

    }

   

}

	?>

          

          <tr>

            <td height="24" colspan="6" bgcolor="#333333" class="white_text">&nbsp;</td>

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