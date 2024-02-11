<?php

session_start();

include('auth.php'); 



include('lib/config.php'); 



//call functions

include('lib/functions.php');

include("roles/administrator_roles.php");

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

  <div id="content_box_title">Administration</div>

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

      <li><a   title="KIBO SLOPES" href="vehicles.php">Vehicles/Drivers</a></li>

<li><a   title="KIBO SLOPES" href="settings.php">Settings</a></li>

<li><a  title="KIBO SLOPES" href="hotel.php">Hotels</a></li>
<li><a class=''  title="KIBO SLOPES" href="agents.php">Agents</a></li>
    </ul>

</div>

<div id="center_pane_big">

  <table border="0" cellpadding="5" cellspacing="0" width="100%">

    <tr>

      <td width="239" bgcolor="#FFFFFF"><table width="700" border="0" cellpadding="0" cellspacing="0">

        <tr>

          <td width="319" height="174" align="center" valign="middle" bgcolor="#FFFFFF"><img src="images/fleet.jpg" alt="" width="263" height="112" /><br />

            <a href="vehicles.php">Vehicles and Drivers</a></td>

          <td width="503" align="center" valign="middle" bgcolor="#FFFFFF"><a href="hotel.php"><img src="images/cargo_parcel.jpg" alt="" width="263" height="112" border="0" /><br />

            <br />

            Hotels</a></td>

        </tr>

        <tr>

          <td height="126" align="center" valign="middle" bgcolor="#FFFFFF"><img src="images/settings.jpg" alt="" width="263" height="112" /><br />

            <a href="settings.php">Settings</a></td>

          <td align="center" valign="middle" bgcolor="#FFFFFF"><a href="users.php"><img src="images/auth.png" alt="" width="263" height="112" border="0" /><br />

            <br />

            User and Roles</a><br /></td>

        </tr>

      </table></td>

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