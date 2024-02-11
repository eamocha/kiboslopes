<?php

session_start();



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>

<!--pagination-->

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />

	<link href="pagination/css/grey.css" rel="stylesheet" type="text/css" />

    <link href="css/styles.css" rel="stylesheet" type="text/css" />

 <!-- Validation Engine-->

 	<script src="js/jquery.min.js"></script>



    <script src="js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>

		<script src="js/validation/jquery.validationEngine.js" type="text/javascript"></script>

         <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

        <!--sort-->

        <script src="js/jquery.tablesorter.min.js" type="text/javascript" ></script>

        <!-- Color Box -->

        <link media="screen" rel="stylesheet" href="css/colorbox.css" />

        <script src="js/jquery.colorbox.js"></script> 

         <!-- Color Box End -->



        

     <script>   $(document).ready(function(){



		

			$("#MyForm").validationEngine();

			$(".example5").colorbox();

			

$.getJSON('years.php', function(data){

    var html = '';

    var len = data.length;

    for (var i = 0; i< len; i++) {

        html += '<option value="' + data[i].ay + '">' + data[i].ay + '</option>';

    }

    $('select.year').append(html);

});

			

		});</script>

        <script type="text/javascript">

$(document).ready(function() {

					$("#product-table").tablesorter({ sortlist: [0,0] });



});

</script>



        

</head>

<?php include('auth.php'); 

include('lib/config.php'); 



//call functions

include('lib/functions.php');

//$tripID = $_GET['inc'];

//trip details

 include_once ('pagination/function.php');



    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

    	$limit = 40;

    	$startpoint = ($page * $limit) - $limit;

        

?>

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

     <li ><a  href="reservations.php">RESERVATIONS</a></li>

      <li>&nbsp;&nbsp;&nbsp;ACCOUNTS &nbsp;&nbsp;&nbsp; </li>

    <li ><a href="operations.php">OPERATIONS </a></li>

    <li><a href="administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

  <ul id="left_nav_menu">

      

      <li ><a href="hotel_payments.php">Hotels</a></li>

      <li style="background:#F0F0F0;"><a href="Past_payments.php">Past payments</a></li>

      <li><a href="flight_payments.php">Flights</a></li>

    </ul>

</div>

<div id="center_pane_big"><table  width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="341" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Hotels </a></div>

            <ul>

           

                          

              <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                

                <ul>

                

                  <li><a class='' href="#" title="Kiboslopes" style="padding-left:25px;">Print List</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td width="379" height="62" align="right" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF">

        <table id="product-table" width="100%" border="0" align="center" cellpadding="2" cellspacing="0">

           <thead> <tr class="black_text">

       

            <th width="10%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Booking Date</strong></th>

            <th width="20%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Booking Voucher </strong></th>

            <th width="23%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Hotel Name</strong></th>

            <th width="15%"  nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Status</strong></th>

            <th width="14%"  nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Payment due date</strong></th>

            <th width="9%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Amt Due</strong></th>

            <th width="9%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Paid</strong></th>

            <th width="9%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>comments</strong></th>

            <th width="9%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</th>

            </tr></thead>

  <?php  

 // $now=date('Y-m-d');

 

  $sql="  SELECT 

    t.group_name AS g,

    th.trip_hotel_id AS thId,

    th.trip_id AS tId,

    th.status AS sts,

    th.booking_date AS bDate,

    th.hotel_id AS hId,

    h.hotel_name AS hName ,

    th.payment_due_date AS pDue ,

    th.voucher_remarks AS vRmks

  FROM 

    ((tbl_trip_hotels  th JOIN tbl_hotels h ON((th.hotel_id = h.hotel_id))) JOIN tbl_trips t ON((th.trip_id = t.trip_id))) 

  WHERE 

    (th.deleted = 0) AND (th.status='Fully paid' OR th.status='Deposit paid' OR th.status='Confirmed' OR th.status='Depost Required') AND (DATE(th.booking_date) <= DATE(curdate()))GROUP BY th.hotel_id, th.trip_id

ORDER BY th.payment_due_date,th.booking_date Desc LIMIT {$startpoint} , {$limit}";



$res=mysqli_query($conn,$sql) or die(mysqli_error($conn)());

 $numofrows = mysqli_num_rows($res);

 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="10" align="center" valign="middle" bgcolor="#fff" class="italix">No Hotels!</td>

            </tr>

	<?php	}

	else{

for($i = 0; $i<$numofrows; $i++) {



   $result = mysqli_fetch_array($res); //get a row from our result set

	$trip_hotel_id  = $result['thId'];

	$gname  = $result['g'];

	$trip_id  = $result['tId'];

	$hotel_id  = $result['hId'];

	$payment_due  = $result['pDue'];

	$booking_date  = $result['bDate'];

	$status  = $result['sts'];

	$hotel  = $result['hName'];

$vouche_remarks=$result['vRmks'];

   

	   

   

    if($i % 2) { //this means if there is a remainder

        

		?><tr class="alt_row1">



    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

 <?php echo date('d.m.Y',strtotime($booking_date))?>  

      </td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $gname?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

      <?php /* 

	

	$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $hotel_id")or die(mysqli_error($conn)());

	$result_town = mysqli_fetch_assoc($town_sql);

	echo $hotel_name = $result_town['hotel_name'];

	*/

	echo $hotel;

	?>

	

    </td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $status?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"> <?php if(strtotime($payment_due)==0) echo '-'; else echo date('d.m.Y',strtotime($payment_due))?>  </td>

   <?php $dbQry=mysqli_query($conn,"SELECT bill,comments,sum(single_price) as amt FROM tbl_hotel_payments WHERE trip_id=$trip_id and hotel_id=$hotel_id and deleted=0")or die(mysqli_error($conn)());

   $row=mysqli_fetch_array($dbQry);?> <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><?php echo $row['bill']?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><?php echo $row['amt']?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><?php echo $row['comments']?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><a href="view_hotel_payments.php?inc=<?php echo $trip_id?>&amp;hot=<?php echo $hotel_id?>">View Details</a></td>

    </tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr class="alt_row2">

       

            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

               <?php echo date('d.m.Y',strtotime($booking_date))?>  </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php

           /* $trip_sql="SELECT * FROM tbl_trips WHERE trip_id=$trip_id and deleted=0";

			$r=mysqli_query($conn,$trip_sql);

			$rs=mysqli_fetch_array($r);

			

			echo $tripname=$rs['group_name'];

			*/

			echo $gname; ?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

             <?php 

	/*

	$town_sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $hotel_id")or die(mysqli_error($conn)());

	$result_town = mysqli_fetch_assoc($town_sql);

	echo $hotel_name = $result_town['hotel_name'];

	*/

	echo $hotel

	?>

            </td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $status?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">  <?php if(strtotime($payment_due)==0) echo '-'; else echo date('d.m.Y',strtotime($payment_due))?>  </td>

             <?php $dbQry=mysqli_query($conn,"SELECT bill,comments,sum(single_price) as amt FROM tbl_hotel_payments WHERE trip_id=$trip_id and hotel_id=$hotel_id and deleted=0")or die(mysqli_error($conn)());

   $row=mysqli_fetch_array($dbQry);?> <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><?php echo $row['bill']?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><?php echo $row['amt']?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><?php echo $row['comments']?></td>

            <td nowrap="nowrap" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a href="view_hotel_payments.php?inc=<?php echo $trip_id?>&amp;hot=<?php echo $hotel_id?>">View Details</a></td>

            </tr> 

          <?php

    

   

}}

}?>

          

          

  </table></td>

      </tr>

      <tr>

            <td height="24" colspan="10" bgcolor="#333333" class="white_text"><?php

			        $statement = " ((tbl_trip_hotels  th JOIN tbl_hotels h ON((th.hotel_id = h.hotel_id))) JOIN tbl_trips t ON((th.trip_id = t.trip_id))) 

  WHERE 

    (th.deleted = 0) AND (th.status='Fully paid' OR th.status='Deposit paid' OR th.status='Confirmed' OR th.status='Depost Required') AND (DATE(th.booking_date) <= DATE(curdate())) ";



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