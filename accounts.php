<?php

session_start();

include('auth.php'); 



include('lib/config.php'); 



//call functions

include('lib/functions.php');

include("roles/accounts_role.php");

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

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?> | <a href="lib/logout.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title">Accounts</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="dashboard.php">dashboard</a></span></li>

     <li><a href="reservations.php">RESERVATIONS </a></li>

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

    

    <li><a title="KIBO SLOPES" href="hotel_payments.php?inc=1"> Hotel Payments</a></li>

<li><a  title="KIBO SLOPES" href="flight_payments.php">Flights</a></li>

  </ul>

</div>

<div id="center_pane_big">

  <table width="700" border="0" cellpadding="0" cellspacing="0">

    <tr>

      <td width="319" height="174" align="center" valign="middle" bgcolor="#FFFFFF"><p><img src="images/user_256.png" alt="" width="140" height="141" /></p>

        <p><a href="imprests_acc.php">Imprests</a></p></td>

      <td width="503" align="center" valign="middle" bgcolor="#FFFFFF"><p><a href="hotel_payments.php?inc=1"><img src="images/cargo_parcel.jpg" alt="" width="263" height="112" border="0" /></a></p>

        <p><a href="hotel_payments.php?inc=1"><br />

          Hotels payments</a></p></td>

    </tr>

    <tr>

      <td height="174" align="center" valign="middle" bgcolor="#FFFFFF"><p><img src="images/flight.jpg" width="111" height="123" alt="flight" /></p>   

      <a href="flight_payments.php">Flights</a></td>

      <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;</td>

    </tr>

    </table>

</div>

    <div id="bilaz"></div>



</div>

  </form>

</div>

</div>

</body>

</html>