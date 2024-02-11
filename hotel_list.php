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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/grey.css" rel="stylesheet" type="text/css" />
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

//search live

 $("#keywords").keyup(function()

  {

    var kw = $("#keywords").val();

	//alert(kw);

	if(kw != '')  

	 {

	  $.ajax

	  ({

	     type: "POST",

		 url: "search/search.php",

		 data: "kw="+ kw,

		 success: function(option)

		 {

		   $("#results").html(option);

		 }

	  });

	 }

	 else

	 {

	   $("#results").html("");

	 }

	return false;

  });

   

   $(".overlay").click(function()

   {

     $(".overlay").css('display','none');

	 $("#results").css('display','none');

   });

   $("#keywords").focus(function()

   {

     $(".overlay").css('display','block');

     $("#results").css('display','block');

   });

			

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

      <li > <a title="KIBO SLOPES" href="deletedtrips.php"><img src="images/icon2.png" alt="" width="27" height="21"  />Deleted Trips</a></li>

      <li > <a title="KIBO SLOPES" href="past_trips.php"><img src="images/icon2.png" alt="" width="27" height="21"  />Past Trips</a></li>

      <li> <a title="KIBO SLOPES" href="trip_archives.php"><img src="images/icon2.png" alt="" width="27" height="21"  />Archives</a></li>

       <li style="background:#F0F0F0;"> <a title="KIBO SLOPES" href="hotel_list.php"><img src="images/icon2.png" alt="" width="27" height="21"  />Hotels</a></li>

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

                <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_hot.php" title="KIBO" style="padding-left:25px;">Add Hotel</a></li>

                  </ul>

                </li>

              <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/add_parcel.php" title="KIBO" style="padding-left:25px;">Print List</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td   height="62" align="right" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"> <div class="ajax_body">

  <div id="inputbox"><span>Search :</span>

  

    <input type="text" id="keywords" name="keywords" class="text-input" placeholder='search here' value="" />

  </div>

</div>

<div id="results"></div></td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">

          <tr>

            <td height="47" colspan="3" align="center" valign="middle" bgcolor="#fff" class="italix"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">

              <tr class="black_text">

            

                <td  width="20%" height="24" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Hotel Name</strong></td>

                <td  width="15%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Location</td>

                <td width="15%"  nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Email</td>

                <td width="15%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Phone</td>

                <td  width="20%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Description</td>

                <td  nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

              </tr>

              <?php  

$trip_sql = mysqli_query($conn,"SELECT 

  *

FROM

  tbl_hotels where deleted=0 order by hotel_name LIMIT {$startpoint} , {$limit}")or die(mysqli_error($conn)());

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

              <tr class="alt_row2">

             

                <td  bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $hotel_name?></td>

                <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $location?></td>

                <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $fax?></td>

                <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $phone?></td>

                <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $des?></td>

                <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a class="example5" href="edit_hotel.php?inc=<?php echo $hotel_id?>">Edit</a> | <a href="includes/deletehotel.php?inc=<?php echo $hotel_id?>">Delete</a></td>

              </tr>

              <?php

    } else { //if there isn't a remainder we will do the else

       ?>

              <tr class="alt_row1">

               

                <td  bgcolor="#FFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $hotel_name?></td>

                <td bgcolor="#Fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $location?></td>

                <td bgcolor="#Fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $fax?></td>

                <td bgcolor="#Fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $phone?></td>

                <td bgcolor="#Fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $des?></td>

                <td nowrap="nowrap" bgcolor="#fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a class="example5" href="edit_hotel.php?inc=<?php echo $hotel_id?>">Edit </a>| <a href="includes/deletehotel.php?inc=<?php echo $hotel_id?>">Delete</a></td>

              </tr>

              <?php

    }

   

}

	?>

              <tr>

                <td height="24" colspan="9" bgcolor="#333333" class="white_text">&nbsp;</td>

              </tr>

              <tr>

                <td colspan="9" bgcolor="#fff" class="white_text"><?php

			        $statement = "`tbl_hotels` where `deleted` = 0";



	echo pagination($statement,$limit,$page);

?></td>

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