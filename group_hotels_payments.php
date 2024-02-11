<?php

session_start();

include("auth.php");


include('lib/config.php'); 



//call functions

include('lib/functions.php');

//$tripID = $_GET['inc'];

//trip details



 // $now=date('Y-m-d');


//$month=date('m');
//$year = date('Y');




//get maximum and minimum booking years

//maximum and minum dates

$MinYear=date('Y',strtotime(date('Y-m-d')."- 1 years"));
$MaxYear=date('Y',strtotime(date('Y-m-d')."+ 1 years"));

$MinFullDate = date('Y-m-d');
$MaxFullDate = date('Y-m-t');


$strSQLMaxMinDates = "SELECT MAX(booking_date) AS MaxDate, MIN(booking_date) AS MinDate FROM tbl_trip_hotels WHERE deleted<>1 AND booking_date<>'0000-00-00'";
$resultMaxMinDate = mysqli_query($conn,$strSQLMaxMinDates);

if(mysqli_num_rows($resultMaxMinDate)>0)
{
	$rowDate=mysqli_fetch_array($resultMaxMinDate);
	
	$MinYear=date('Y',strtotime($rowDate['MinDate']));
	$MaxYear=date('Y',strtotime($rowDate['MaxDate']));
	
	
	$MinFullDate = $rowDate['MinDate'];
	$MaxFullDate = $rowDate['MaxDate'];

}


//work from here
//the month and year must have value to use and must not be empty
if(isset($_REQUEST['month']) and isset($_REQUEST['year']) and !empty($_REQUEST['month']) and !empty($_REQUEST['year']))
{
	$month=$_REQUEST['month'];	
	$year=$_REQUEST['year'];	

	$query_date=$year."-".$month."-"."01";
	
	//make start date
	$MinFullDate = date('Y-m-d',strtotime($query_date));
	$MaxFullDate = date('Y-m-t',strtotime($query_date));
}
else
{
	//use the default dates
}


//work to here
include_once ('pagination/function.php');

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

$limit = 40;

$startpoint = ($page * $limit) - $limit;

//check if filters are in place
 

$sql="SELECT SQL_CALC_FOUND_ROWS 

     t.group_name AS g,

    th.trip_hotel_id AS thId,

    th.trip_id AS tId,

    th.status AS sts,

    th.booking_date AS bDate,

    th.hotel_id AS hId,

    h.hotel_name AS hName ,

    th.payment_due_date AS pDue ,

    th.voucher_remarks AS vRmks,
	th.itineray_id AS itineray_id

  FROM 

    ((tbl_trip_hotels  th JOIN tbl_hotels h ON((th.hotel_id = h.hotel_id))) JOIN tbl_trips t ON((th.trip_id = t.trip_id))) 

  WHERE 

    (th.deleted = 0) AND (th.status='Fully paid' OR th.status='Deposit paid' OR th.status='Confirmed' OR th.status='Depost Required' OR th.status='Requested')";


//put filter for group name
if(isset($_REQUEST['groupname']) and !empty($_REQUEST['groupname'])){

	$sql.=" AND (t.group_name LIKE '%".mysqli_real_escape_string($conn,trim($_REQUEST['groupname']))."%') ";	
}


$sql.=" GROUP BY th.hotel_id, th.trip_id";
$sql.=" ORDER BY t.group_name  LIMIT {$startpoint} , {$limit}";
//GROUP BY th.hotel_id, th.trip_id

//echo $sql;
//exit;


$res=mysqli_query($conn,$sql) or die(mysqli_error($conn)());

$sqlFoundRows = "SELECT FOUND_ROWS() AS `found_rows`;";
$rowsFound = mysqli_query($conn,$sqlFoundRows);
$rowsFound = mysqli_fetch_assoc($rowsFound);
$total_rows = $rowsFound['found_rows'];

$numofrows = mysqli_num_rows($res);



if(!isset($_REQUEST['groupname']))
{
	
	$numofrows = 0;

}



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/grey.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script src="js/jquery-1.8.2.js"></script>
<script src="js/validation/jquery.validationEngine.js" type="text/javascript"></script>
<script src="js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="js/jquery.tablesorter.min.js" type="text/javascript" ></script>
<script src="js/jquery.colorbox.js"></script> 
<style>

[readonly]{

	border:none}</style>

<script language="javascript">   
$(document).ready(function(){


	$("#MyForm").validationEngine();

	$(".example5").colorbox();

			
/*
$.getJSON('years.php', function(data){

    var html = '';

    var len = data.length;

    for (var i = 0; i< len; i++) {

        html += '<option value="' + data[i].ay + '">' + data[i].ay + '</option>';

    }

    $('select.year').append(html);

});

*/
	$("#product-table").tablesorter({ sortlist: [0,0] });		

});
</script>
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

  <div id="content_box_title">Group Accounts</div>

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

      

      <li><a href="hotel_payments.php?inc=1">Hotels</a></li>
	 
      <li style="background:#F0F0F0;"><a href="group_hotels_payments.php">Group Accounts</a></li>
      
      <li><a href="Past_payments.php">Past payments</a></li>

      <li><a href="flight_payments.php">Flights</a></li>

    </ul>

</div>

<div id="center_pane_big"><table  width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="170" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        <td height="62" align="right" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"> <form method="get" action="group_hotels_payments.php">
           Enter group to search : 
            <input name="groupname" type="text" id="groupname" value="<?php if(isset($_REQUEST['groupname'])) echo $_REQUEST['groupname'];?>" title="Enter group name" />
          <input type="submit" name="button" id="button" value="   Go   " />
        </form>
          
          </td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF">

        <table id="product-table" width="100%" border="0" align="center" cellpadding="5" cellspacing="0">

           <thead> <tr class="black_text">
       
            <th width="23%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Group Name</strong></th>

            <th width="16%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Hotel Name</strong></th>

            <th width="7%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Amt Due</strong></th>

            <th width="6%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Paid</strong></th>

            <th width="11%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Balance</strong></th>

            </tr></thead>

  <?php  


if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="6" align="center" valign="middle" bgcolor="#F0F0F0" class="italix">Enter group to search/No hotels found matching your criteria</td>

            </tr>

<?php
}
else
{


$strTitleToDisplay="";
$gname="";


for($i = 0; $i<$numofrows; $i++) {



   	$result = mysqli_fetch_array($res); //get a row from our result set

	$trip_hotel_id  = $result['thId'];
	
	$itinerary_id = $result['itineray_id'];
	
	
	if($gname!=$result['g'])
	{
	
		$gname  = $result['g'];
		
		$strTitleToDisplay = $gname;
	}
	else
	{
		$strTitleToDisplay = "";
		//$gname="";
	}
	
	

	$trip_id  = $result['tId'];

	$hotel_id  = $result['hId'];

	$payment_due  = $result['pDue'];

	$booking_date  = $result['bDate'];

	$status  = $result['sts'];

	$hotel  = $result['hName'];

	$vouche_remarks=$result['vRmks'];

   

$color="";//this means if there is a remainder

$payeble=0;
$bal=0;	
$tt_payable=0;
$paid=0;
$comments="";
$curr="";

//loop through amount due for each hotel per trip

$trip_sql = "SELECT itinerary_id,singles AS s,child_beds as cb,doubles AS d,twins AS t,triples AS tp FROM  tbl_itinerary i  WHERE i.trip_id=$trip_id AND i.hotel_id=$hotel_id AND i.deleted=0 order by i.date desc";



$resultItenerary = mysqli_query($conn,$trip_sql) or die(mysqli_error($conn)());

while( $rowItenerary = mysqli_fetch_array($resultItenerary)){ //start loop to get totals

    //get a row from our result set
	
	//get the individual iteneraryid to use for rates
	$itinerary_id=$rowItenerary['itinerary_id'];
	
	$singles=$rowItenerary['s'];
	$twins=$rowItenerary['t'];
	$doubles=$rowItenerary['d'];
	$triples=$rowItenerary['tp'];
	$child_beds=$rowItenerary['cb'];
	
	//get the rates
	$strSQLHotelRates = "SELECT TH.trip_hotel_id,HC.used_currency,HC.hotel_charges_id,HC.single_price,HC.db_price,HC.twin_price,HC.trp_price,HC.kid_price,HC.extra_charges FROM tbl_trip_hotels TH INNER JOIN tbl_hotel_charges AS HC  ON TH.trip_hotel_id=HC.trip_hotel_id WHERE TH.itineray_id=".$itinerary_id." AND TH.deleted=0";
	
			$resultPayable = mysqli_query($conn,$strSQLHotelRates) or die(mysqli_error($conn)());
			
			if(mysqli_num_rows($resultPayable)>0)
			{
				
			   $rowHotelRates = mysqli_fetch_array($resultPayable);
			   
			   $curr=$rowHotelRates['used_currency'];;
			   
			   $s=(float)$rowHotelRates['single_price'];

			   $d=(float)$rowHotelRates['db_price'];
	
			   $t=(float)$rowHotelRates['twin_price'];
	
			   $tr=(float)$rowHotelRates['trp_price'];
	
			   $k=(float)$rowHotelRates['kid_price'];
	
			   $e=(float)$rowHotelRates['extra_charges'];

		   	   $tt_payable+=($s*$singles+$d*$doubles+$t*$twins+$triples*$tr+$k*$child_beds+$e);
			   
			  
			   
			  
			}
			
			//get the total paid
			 //$paid=(float)$rowHotelRates['total_amount_paid'];
			 
			$strSQLPaid = "SELECT SUM(amountpaid) AS total_amount_paid FROM tbl_payments WHERE trip_id=$trip_id AND hotel_id=$hotel_id";
			$resultPaid = mysqli_query($conn,$strSQLPaid);
			
			if(mysqli_num_rows($resultPaid)>0)
			{
				
				$rowHotelPayment = mysqli_fetch_array($resultPaid);
				
				$paid=(float)$rowHotelPayment['total_amount_paid'];
			}
			 
			$bal=($tt_payable - $paid);
				
			//get the balance
			
			
}//end loop to get totals
			

		if($status=="Depost Required"){
	
			$color="RED";}else
	
			$color="";

   

if($i % 2) { 

?><tr class="alt_row1" >
    <td height="37" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $strTitleToDisplay;?></td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $hotel;?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><?php if($curr!="") echo $curr.":";?> <?php if($tt_payable==0) echo '0'; else echo $tt_payable;?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">
      <?php if($curr!="") echo $curr.":";?>
    </span>      <?php if($paid==0) echo '0'; else echo $paid;?></td>

    <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">
      <?php if($curr!="") echo $curr.":";?>
    </span><?php echo $tt_payable-$paid;?></td>

    </tr>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <tr class="alt_row2">

       
            <td height="37" bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $strTitleToDisplay; ?></td>

            <td bgcolor="#FFFFFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php 	echo $hotel	?></td>

            <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">
              <?php if($curr!="") echo $curr.":";?>
            </span>              <?php if($tt_payable==0) echo '0'; else echo $tt_payable;?></td>

            <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">
              <?php if($curr!="") echo $curr.":";?>
            </span>              <?php if($paid==0) echo '0'; else echo $paid?></td>
        
            <td nowrap="nowrap" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid""><span class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">
              <?php if($curr!="") echo $curr.":";?>
            </span><?php echo $tt_payable-$paid;?></td>

            </tr> 

          <?php

    

   

}}

}?>

          

          

  </table></td>

      </tr>

      <tr>

            <td height="24" colspan="10" bgcolor="#333333" class="white_text"><?php

			if($numofrows!=0){
				echo pagination('',$limit,$page,'',$total_rows);
			}
			?></td>

          </tr>

    </table></div>

    <div id="bilaz"></div>



</div>



</div>

</div>

</body>

</html>