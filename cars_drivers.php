<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />

	<link href="pagination/css/grey.css" rel="stylesheet" type="text/css" />



<link href="css/styles.css" rel="stylesheet" type="text/css" />

 <!-- Validation Engine-->

<script type="text/javascript" src="js/jquery-1.8.2.js"></script>



    <script src="js/js/languages/jquery.validationEngine-en.js" type="text/javascript"></script>

    <script src="js/js/jquery.validationEngine.js" type="text/javascript"></script>

    

    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

        

        

        <!--date picker-->

        <link rel="stylesheet" href="js/datepicker/jqueryui.css" type="text/css" />

        <script src="js/datepicker/jqueryui.js" type="text/javascript" ></script>

        <!-- Color Box -->

        <link media="screen" rel="stylesheet" href="css/colorbox.css" />

        <script src="js/jquery.colorbox.js"></script> 

         <!-- Color Box End -->

  <!--sort-->

        <script src="js/jquery.tablesorter.min.js" type="text/javascript" ></script>

        

     <script>   $(document).ready(function(){



		

			$("#MyForm").validationEngine();

			$(".example5").colorbox();



				$("#sort-table").tablesorter({ sortlist: [0,0] });

		});</script>

        <?php

session_start();

include('auth.php'); 



include('lib/config.php'); 



//call functions

include('lib/functions.php');

 include_once ('pagination/function.php');



    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

    	$limit = 40;

    	$startpoint = ($page * $limit) - $limit;

?>

        

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

    <ul id="left_nav_menu"> <li><a title="KIBO SLOPES" href="operations.php">Operations</a></li>

      <li style="background:#F0F0F0;"><a title="KIBO SLOPES" href="cars_drivers.php">Cars and Drivers</a></li>

     <li><a class=''  title="KIBO SLOPES" href="car_hire.php">Car Hire</a></li>

<li><a class=''  title="KIBO SLOPES" href="calender/index.php" target="_blank">Calender</a></li>

<li><a href="imprests.php">Imprests</a></li>

    </ul>

  </div>

  <div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="341" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Vehicles details </a></div>

            <ul>

             

              <li>

                <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_vehicle.php" title="cars" style="padding-left:10px; text-transform:capitalize">Add Vehicle</a></li>

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

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table id="sort-table" width="100%" border="0" align="center" cellpadding="5" cellspacing="0">

          <thead><tr class="black_text">

            <th width="2%" height="24" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >No</th>

            <th width="17%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Vehicle Code</strong></th>

            <th width="19%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Capacity</strong></th>

            <th width="22%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Driver</strong></th>

            <th width="17%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Phone</strong></th>

            <th width="23%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</th>

          </tr></thead>

  <?php

$bus_sql = mysqli_query($conn,"SELECT * FROM categories WHERE status > -1 LIMIT {$startpoint} , {$limit}")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($bus_sql);





for($i = 0; $i<$numofrows; $i++) {

    $result_bus = mysqli_fetch_array($bus_sql); //get a row from our result set

	$bus_id = $result_bus['category_id'];

	$capacity = $result_bus['sequence'];

	$bus_code = $result_bus['label1'];

	$desc=$result_bus['label2'];

	$driver=$result_bus['name'];

	

	

    if($i % 2) { //this means if there is a remainder

        

		?><tr class="alt_row2">

    <td height="37" ><?php echo $i+1?></td>

    <td height="37" >

      <?php echo $bus_code?>

    </td>

    <td bgcolor="#F0F0F0" >

      <?php echo $capacity?>

    </td> <td bgcolor="#F0F0F0" >

     <?php  

	echo $driver

	?>

    

 </td>

    <td><?php echo $desc?></td>

    <td ><a class='example5'href="forms/edit_vehicle.php?inc=<?php echo $bus_id?>" title="Vehicle Assignment" style="padding-left:5px;" >Assign</a> | <a class="example5" href="edit_vehicle.php?inc=<?php echo $bus_id?>">Edit </a> | <a href="includes/delete_vehicle.php?inc=<?php echo $bus_id?>">Delete</a></td>

    </tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr class="alt_row1">

            <td height="37" ><?php echo $i+1?></td>

            <td height="37" >

              <?php echo $bus_code?>

            </td>

            <td >

              <?php echo $capacity?>

            </td><td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $driver?>

        

            <td><?php echo $desc?></td>

            <td ><a class='example5'href="forms/edit_vehicle.php?inc=<?php echo $bus_id?>" title="Vehicle Assignment" style="padding-left:5px;" >Assign</a> | <a class="example5" href="edit_vehicle.php?inc=<?php echo $bus_id?>">Edit </a>  | <a href="includes/delete_vehicle.php?inc=<?php echo $bus_id?>">Delete</a></td>

            </tr> <?php

    }

   

}

	?>

          

         

  </table></td>

      <tr>

            <td height="24" colspan="10" bgcolor="#333333" class="white_text"><?php

			        $statement = " categories where  status > -1 ";



	echo pagination($statement,$limit,$page);?></td>

          </tr>

    </table></div>

    <div id="bilaz"></div>



</div>

  </form>

</div>

</div>

</body>

</html>