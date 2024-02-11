<?php

session_start();

include('auth.php'); 

include('lib/config.php'); 



//call functions

include('lib/functions.php');

//pagination

 include_once ('pagination/function.php');



    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

    	$limit = 10;

    	$startpoint = ($page * $limit) - $limit;

        

        //to make pagination

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>

<!--pagination-->

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />

	<link href="pagination/css/grey.css" rel="stylesheet" type="text/css" />

    <style type="text/css">

        .records {

            width: 510px;

            margin: 5px;

            padding:2px 5px;

            border:1px solid #B6B6B6;

        }

        

        .record {

            color: #474747;

            margin: 5px 0;

            padding: 3px 5px;

        	background:#E6E6E6;  

            border: 1px solid #B6B6B6;

            cursor: pointer;

            letter-spacing: 2px;

        }

        .record:hover {

            background:#D3D2D2;

        }

        

        

        .round {

        	-moz-border-radius:8px;

        	-khtml-border-radius: 8px;

        	-webkit-border-radius: 8px;

        	border-radius:8px;    

        }    

        

        p.createdBy{

            padding:5px;

            width: 510px;

        	font-size:15px;

        	text-align:center;

        }

        p.createdBy a {color: #666666;text-decoration: none;}        

    </style>   

<link href="css/styles.css" rel="stylesheet" type="text/css" />

<style>

#servedby{

		color:#fff;

		font:"Arial Black", Gadget, sans-serif, Helvetica, sans-serif;

		}

        </style>

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

<!-- datepickier -->



<link rel="stylesheet" href="js/datepicker/jqueryui.css" type="text/css" />





<script  src="js/datepicker/jqueryui.js" type="text/javascript"></script>

<script>

<!-- for the validator-->

$(document).ready(function(){





	//character cases

	$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});

			$(".example5").colorbox();





			

		});</script>

        



</head>



<body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="images/logo.png" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?>

     |<a href="changepass/change-pwd.php?id=<?php echo $id?>">Change Pass</a>| <a  href="lib/logout.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title">Trip Management</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="dashboard.php">dashboard</a></span></li>

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

      

      <li style="background:#F0F0F0;"><a title="KIBO SLOPES" href=""><img src="images/icon2.png" alt="" width="27" height="21" />  Trips</a></li>

      <li>More Changes</li>

    </ul>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="300" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Trips </a></div>

            <ul>

             

              <li>

                <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_trip.php" title="TRIPS" style="padding-left:25px;">Add New Trip</a></li>

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

        <td width="379" height="62" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"> 

<form id="DateForm"  name="DateForm" action="trips.php" method="post"><input name="gname" class="inpuname" id="gname" value="<?php // =$todates;?>"  placeholder="Search name"/> 

    

    Order By

    <select  name="orderby" id="orderby">

    <option value="arrival_date">arrival</option>

    <option value="dep_date">Departure</option><option value="group_name">Name</option><option value="no_of_visitors">Visitors No</option></select>

 <input type="submit" name="button" id="button" value="   Go   " /> 

  <?php 

 //$orderby=$_REQUEST['orderby'];

  ?></form>

  

 <div id="beat"></div></td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">

          <tr class="black_text">

            

            <td width="42%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Previous Data</strong></td>

            <td width="3%" height="24" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Changes</strong></td>

            <td width="16%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Date: Time</strong></td>

            <td width="21%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Departure</strong></td>

            <td width="18%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Team Leader</strong></td>

            <td width="18%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            </tr>

  <?php  

$trip_sql = mysqli_query($conn,"SELECT   * FROM tbl_trips where deleted=0 ORDER BY trip_id desc LIMIT {$startpoint} , {$limit} " )or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($trip_sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="6" align="center" valign="middle" bgcolor="#fff" class="italix">No Trips on !</td>

            </tr>

	<?php	}

for($i = 0; $i<$numofrows; $i++) {

    $result_tickets = mysqli_fetch_array($trip_sql); //get a row from our result set

	$trip_id  = $result_tickets['trip_id'];

	$group_name  = $result_tickets['group_name'];

	$team_leader  = $result_tickets['team_leader'];

	$arrival_date  = $result_tickets['arrival_date'];

	$dep_date  = $result_tickets['dep_date'];

		$no_of_visitors  = $result_tickets['no_of_visitors'];

	

	   

	

    if($i % 2) { //this means if there is a remainder

        

		?><tr>

    

    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

    <?php echo $group_name?>

      <br /></td><td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php if($no_of_visitors==0){

		echo 0;

		}

		else{

			echo $no_of_visitors;}?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $arrival_date?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $dep_date

	?>

    </td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $team_leader?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a href="view_trip.php?inc=<?php echo $trip_id?>">View Details</a>|<span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"> <a href="includes/cancel_trip.php?inc=<?php echo $trip_id?>">Cancel</a></span></td>

    </tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr>

           

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $group_name?><br /></td> <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php if($no_of_visitors==0){

		echo 0;

		}

		else{

			echo $no_of_visitors;}?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $arrival_date?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

              <?php echo $dep_date

	?>

            </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $team_leader?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a href="view_trip.php?inc=<?php echo $trip_id?>">View Details</a>| <a href="includes/cancel_trip.php?inc=<?php echo $trip_id?>">Cancel</a></td>

            </tr> <?php

    }

   

}

	?>

          

          <tr>

            <td height="24" colspan="6" bgcolor="#333333" class="white_text"></td>

            </tr> <tr>

            <td height="24" colspan="6" bgcolor="#fff" class="white_text"><?php

			        $statement = "`tbl_trips` where `deleted` = 0";



	echo pagination($statement,$limit,$page);

?>

</td>

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