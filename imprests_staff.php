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

<script  src="js/datepicker/jqueryui.js" type="text/javascript"></script>
<link rel="stylesheet" href="js/datepicker/jqueryui.css" type="text/css" />

        

     <script language="javascript">   
	 
	 $(document).ready(function(){

			//$("#MyForm").validationEngine();

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

  <div id="content_box_title">Staff Imprests</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="dashboard.php">dashboard</a></span></li>

     <li ><a href="reservations.php">RESERVATIONS</a></li>

      <li><a href="accounts.php">ACCOUNTS</a></li>

    <li >&nbsp;&nbsp;&nbsp;&nbsp;OPERATIONS&nbsp;&nbsp;&nbsp;</li>

    <li><a href="administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu"> <li><a title="KIBO SLOPES" href="operations.php"><img src="images/icon2.png" alt="" width="27" height="21" /></a><a title="KIBO SLOPES" href="operations.php">operations</a></li>

       <li><a title="KIBO SLOPES" href="imprest.php"><img src="images/icon2.png" alt="" width="27" height="21" /></a><a title="KIBO SLOPES" href="cars_drivers.php">Cars and Drivers</a></li>

<li><a title="KIBO SLOPES" href="imprest.php"><img src="images/icon2.png" alt="" width="27" height="21" /></a><a class=''  title="KIBO SLOPES" href="car_hire.php">Car Hire</a></li>

<li><a title="KIBO SLOPES" href="imprest.php"><img src="images/icon2.png" alt="" width="27" height="21" /></a><a class=''  title="KIBO SLOPES" href="calender/index.php" target="_blank">Calender</a></li>

<li><a title="KIBO SLOPES" href="imprest.php"><img src="images/icon2.png" alt="" width="27" height="21" /></a><a href="imprests.php">Imprests</a></li>

      <li style="background:#F0F0F0;"><a title="KIBO SLOPES" href="imprest.php"><img src="images/icon2.png" alt="" width="27" height="21" /> Issued</a></li>

      <li> <a title="KIBO SLOPES" href="imprest.php"><img src="images/icon2.png" alt="" width="27" height="21" /></a>Recieved</li>

    </ul>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="341" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Imprests</a></div>

            <ul>

             

              <li>

                <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a href="forms/add_imperest.php" title="KAMPS" style="padding-left:25px;">Add Imprest</a></li>

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

        <td width="379" height="62" align="right" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">

          <tr class="black_text">
            <td  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Imprest No</strong></td>

         

            <td  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Staff</strong></td>

            <td  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Group Name</strong></td>

            <td  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Duty From</strong></td>

            <td  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Duty To</strong></td>

            <td  bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            </tr>

  <?php  

$imprest_sql = mysqli_query($conn,"SELECT si.impresetid,t.trip_id,t.group_name,t.team_leader,t.arrival_date,t.dep_date,s.name AS driver_name,si.dutydatefrom,si.dutydateto,si.imprestserial FROM tbl_imprest_staff si INNER JOIN categories s ON  s.category_id=si.driver_id INNER JOIN tbl_trips t ON t.trip_id=si.trip_id ORDER BY dutydatefrom DESC")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($imprest_sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="7" align="center" valign="middle" bgcolor="#fff" class="italix">No Imprests found!</td>

            </tr>

	<?php	}

for($i = 0; $i<$numofrows; $i++) {

    $result_imprest = mysqli_fetch_object($imprest_sql); //get a row from our result set
	
	$impresetid = $result_imprest->impresetid;
	$imprestserial = $result_imprest->imprestserial;
	$group_name = $result_imprest->group_name;
	$driver_name = $result_imprest->driver_name;
	$dutydatefrom = $result_imprest->dutydatefrom;
	$dutydateto = $result_imprest->dutydateto;
	$dutydatefrom = $result_imprest->dutydatefrom;
	

    if($i % 2) { //this means if there is a remainder

        

		?><tr class="alt_row2">
	  <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $imprestserial;?></td>

    

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $driver_name?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $group_name;?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo date('d M Y',strtotime($dutydatefrom));?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo date('d M Y',strtotime($dutydateto))?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a href="download_staff_imprest.php?imprestid=<?php echo $impresetid?>">Download Imprest Form</a></td>

    </tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr class="alt_row1">
            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $imprestserial;?></span></td>

          

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $driver_name?></span><br /></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $group_name;?></span></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo date('d M Y',strtotime($dutydatefrom));?></span></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo date('d M Y',strtotime($dutydateto))?></span></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a href="download_staff_imprest.php?imprestid=<?php echo $impresetid?>">Download Imprest Form</a></td>

            </tr> <?php

    }

   

}

	?>

          

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