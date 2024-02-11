<?php

session_start();

include('auth.php'); 

include('lib/config.php'); 

$todates=date('Y.m.d');

//call functions

include('lib/functions.php');

//pagination

 include_once ('pagination/function.php');



    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

    	$limit = 40;

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

         <script type="text/javascript"  src="js/jquery.tablesorter.min.js" ></script>

         <!--archives -->

         <script type="text/javascript" src="archive_exec.js"></script>



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

			$("#table").tablesorter({ sortlist: [0,0] });

//fetch years



$.getJSON('years.php', function(data){

    var html = '';

    var len = data.length;

    for (var i = 0; i< len; i++) {

        html += '<option value="' + data[i].ay + '">' + data[i].ay + '</option>';

    }

    $('#sel_year').append(html);

});

		

	

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

      

    <li ><a title="KIBO SLOPES" href="reservations.php"><img src="images/icon2.png" alt="" width="27" height="21" />  Trips</a></li>

      <li> <a title="KIBO SLOPES" href="deletedtrips.php"><img src="images/icon2.png" alt="" width="27" height="21"  />Deleted Trips</a></li>

      <li > <a title="KIBO SLOPES" href="past_trips.php"><img src="images/icon2.png" alt="" width="27" height="21"  />Past Trips</a></li>

      <li style="background:#F0F0F0;"> <a title="KIBO SLOPES" href="trip_archives.php"><img src="images/icon2.png" alt="" width="27" height="21"  />Archives</a></li>

       <li > <a title="KIBO SLOPES" href="hotel_list.php"><img src="images/icon2.png" alt="" width="27" height="21"  />Hotels</a></li>

    </ul>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="150" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

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

                  <li><a class='example5' href="print/trips_print.php" title="KAMPS" style="padding-left:25px;">Print List</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td height="62" align="right" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">

  <form id="DateForm"  name="DateForm" action="" method="post"><!--<input name="gname" class="inpuname" id="gname" value="<?php // =$todates;?>"  placeholder="Search name"/>-->

    Year

      <select class="filter"  name="sel_year" id="sel_year">

        

      </select>



  Month

     <select name="month" id="month" class="filter" >

     <option selected="selected" value="0" >Month</option>

  	 <option value="01">Jan</option>

     <option value="02">Feb</option>

     <option value="03">Mar</option>

     <option value="04">Apr</option>

     <option value="05">May</option>

     <option value="6">Jun</option>

     <option value="7">Jul</option>

     <option value="8">Aug</option>

     <option value="9">Sep</option>

     <option value="10">Oct</option>

     <option value="11">Nov</option>

     <option value="12">Dec</option>

     

     </select>

    <input type="submit" name="button" id="button" value="   Go   " /> 

    <?php 

 //$orderby=$_REQUEST['orderby'];

  ?></form>

          

         </td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"> <table id="table" width="100%" border="0" align="center" cellpadding="5" cellspacing="0">

          <thead><tr><th width="3%">No</th><th width="22%">Group Name</th><th width="4%">V.No</th><th width="10%"> Arrival Date</th><th width="7%"> Arrival t </th><th width="18%"> D. date</th><th width="11%"> D. Time</th><th width="13%"> T leader </th><th width="12%">Options</th></tr></thead>

           

<tbody id="loaddata">  </tbody>

          

          <tr>

            <td height="24" colspan="9" bgcolor="#333333" class="white_text"></td>

            </tr> <tr>

            <td  colspan="6" bgcolor="#fff" class="white_text"><?php

			     //   $statement = "`tbl_trips` where deleted=0  and datediff(now(), dep_date)>30 ";



	//echo pagination($statement,$limit,$page);

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