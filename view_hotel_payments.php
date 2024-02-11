<?php

session_start();

require('auth.php');


include('lib/config.php'); 


//call functions

include('lib/functions.php');

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];


$tripID =$_GET['inc']; 

//hotel

$trip_hotel=$_REQUEST['hot'];


$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trips WHERE trip_id = $tripID and deleted=0")or die(mysqli_error($conn)());

$resulttrip=mysqli_fetch_array($sql);

$tripname=$resulttrip['group_name'];




//start totalpayment calculation

//get the rates
$s=0;
$d=0;
$t=0;
$tr=0;
$k=0;
$f=0;
$e=0;
$date_rate_put=date("d.m.Y",time());

$payeble=0;
$bal=0;	
$tt_payable=0;
$paid=0;
$comments="";
$cur="";

//loop through amount due for each hotel per trip

$trip_sql = "SELECT itinerary_id,singles AS s,child_beds as cb,doubles AS d,twins AS t,triples AS tp,family_rooms AS fr FROM  tbl_itinerary i  WHERE i.trip_id=$tripID AND i.hotel_id=$trip_hotel AND i.deleted=0 order by i.date desc";

//echo $trip_sql;
//exit;

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
	$family_rooms = $rowItenerary['fr'];
	
	//get the rates
	$strSQLHotelRates = "SELECT TH.trip_hotel_id,HC.used_currency,HC.hotel_charges_id,HC.single_price,HC.db_price,HC.twin_price,HC.trp_price,HC.kid_price,HC.family_room_price,HC.extra_charges FROM tbl_trip_hotels TH INNER JOIN tbl_hotel_charges AS HC  ON TH.trip_hotel_id=HC.trip_hotel_id WHERE TH.itineray_id=".$itinerary_id." AND TH.deleted=0";
	
			$resultPayable = mysqli_query($conn,$strSQLHotelRates) or die(mysqli_error($conn)());
			
			if(mysqli_num_rows($resultPayable)>0)
			{
				
			   $rowHotelRates = mysqli_fetch_array($resultPayable);
			   
			   $cur=$rowHotelRates['used_currency'];;
			   
			   $s=(float)$rowHotelRates['single_price'];

			   $d=(float)$rowHotelRates['db_price'];
	
			   $t=(float)$rowHotelRates['twin_price'];
	
			   $tr=(float)$rowHotelRates['trp_price'];
	
			   $k=(float)$rowHotelRates['kid_price'];
			   
			   $f=(float)$rowHotelRates['family_room_price'];
	
			   $e=(float)$rowHotelRates['extra_charges'];

		   	   $tt_payable+=($s*$singles+$d*$doubles+$t*$twins+$triples*$tr+$k*$child_beds+$f*$family_rooms+$e);
			   
			  
			   
			  
			}
			
			//get the total paid
			 //$paid=(float)$rowHotelRates['total_amount_paid'];
			 
			$strSQLPaid = "SELECT SUM(amountpaid) AS total_amount_paid FROM tbl_payments WHERE trip_id=$tripID AND hotel_id=$trip_hotel";
			$resultPaid = mysqli_query($conn,$strSQLPaid);
			
			if(mysqli_num_rows($resultPaid)>0)
			{
				
				$rowHotelPayment = mysqli_fetch_array($resultPaid);
				
				$paid=(float)$rowHotelPayment['total_amount_paid'];
			}
			 
			$bal=($tt_payable - $paid);
				
			//get the balance
			
			
}//end loop to get totals




//end total payment calculation
	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" type="text/css" />
<link rel="stylesheet" href="js/datepicker/jqueryui.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />
<script src="js/jquery-1.8.2.js"></script>
<script src="js/validation/jquery.validationEngine.js" type="text/javascript"></script>
<script src="js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="js/jquery.colorbox.js" type="text/javascript"></script> 
<script  src="js/datepicker/jqueryui.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.timepicker.js"></script>
<script type="text/javascript">   
	$(document).ready(function(){

			$("#MyForm").validationEngine();

			$(".example5").colorbox();
	});
</script>
<style type="text/css">
	td{

		font-size:98%
	}
    table tr:nth-child(odd) { background-color:#eee; }
	table tr:nth-child(even) { background-color:#fff; }
</style>

</head><body>

<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="images/logo.png" alt="logo" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?> | <a href="login.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title">View Hotels Payment</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="dashboard.php">dashboard</a></span></li>

     <li><a href="reservations.php">RESERVATIONS</a> </li>

      <li>&nbsp;&nbsp;&nbsp;ACCOUNTS &nbsp;&nbsp;&nbsp;</a></li>

    <li ><a href="operations.php">OPERATIONS </a></li>

    <li><a href="administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

  <ul id="left_nav_menu">

            

      <li style="background:#F0F0F0;">

        <a  href="hotel_payments.php?inc=<?php echo $tripID?>" title="KIBO SLOPES"><img src="images/icon2.png" alt="" width="27" height="21" />Hotels </a></li>

      <li><a  href="view_imprest.php?inc=<?php echo $tripID?>" title="KIBO SLOPES"><img src="images/icon2.png" alt="" width="27" height="21" />Imprests</a></li>

      <li><img src="images/icon2.png" alt="" width="27" height="21" />Flights</li>

    </ul><div><span class="al-head">Alerts</span><span  id="alerts">-Others data<br />

    -cdata 2</span></div>

<div id="notifications"><span class="al-head">Notifications</span><span id="notes">-Notes here</span></div>

<div><span class="al-head">Changes</span><span id="changes">-change sommthing</span></div>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="250" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> More Details</a></div>

            <ul>

             <li>

 <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>                <ul>

                 <li><a class='example5' href="forms/makepayment.php?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel?>" title="print" style="padding-left:25px;">Make Payment</a></li>

                  </ul>

                </li>
				
				<?php /*
                 <li>

					 <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>                <ul>

                  <li><a class='example5' href="forms/enter_rates.php?inc=<?php echo $tripID?>&amp;hot=<?php echo $trip_hotel?>" title="print" style="padding-left:25px;">Input hotel rates </a></li>

                  </ul>

                </li>
				*/ 
				
				$strURLQString="inc=".$tripID."&hot=".$trip_hotel."&f_name=".$fullName;;
				
				?>
                      

                <li>

                    <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>
    
                    <ul>
    					
                      <li><a  href="print_hotel_payment_voucher_pdf.php?<?php echo $strURLQString;?>" title="print" style="padding-left:25px;">Print Voucher</a></li>
    
                      </ul>

                </li> 
                
                
                <li>

                    <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>
    
                    <ul>
    
                      <li><a  target="_blank"  href="print_hotel_payment.php?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel?>&f_name=<?php echo $fullName;?>" title="View Voucher" style="padding-left:25px;">View Voucher</a></li>
    
                      </ul>

                </li> 

                
                <li>

                    <div id="sub_menu_icon"><img src="images/email.png" alt=""  border="0" padding-bootom:2px /></div>
    
                    <ul>
    
                      <li><a class='example5' href="#" title="email" style="padding-left:25px;">Email Voucher</a></li>
    
                      </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td width="200" height="62" align="center" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">

        

      <!--  <form id="hotelreport" name="hotelreport" method="post" action="<?php echo $_SERVER['PHP_SELF']?>?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel?>">Report Type<br />

        <select id="report_type" name="report_type">

        <option value="">--select--</option>

         <option value="Deposit Payment "> Deposit Payment  </option>

          <option value="Payment">Payment </option>

                </select>

                 <input type="submit" name="submit" id="submit" value="save" />

        </form> -->

               

            </td>

        <td align="justify" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">

        <table width="349">

          <tr>

            <td bordercolor="#333333">Total payable</td>

            <td>Amount paid</td>

            <td>Balance</td>

          </tr>

          <tr>

            <td bordercolor="#fff"><?php echo $cur.':'. $tt_payable?></td>

            <td><?php echo $cur.':'. $paid?></td>

            <td><?php echo $cur.':'.$bal; ?></td>

          </tr>

        </table></td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">

          <tr class="black_text">

            <td height="75" colspan="10" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:#CCC 1px solid;">

              <tr>

                <td width="20%" bgcolor="#FFFFFF"> Voucher No:</td>

                <td width="32%" bgcolor="#FFFFFF"><?php echo $tripname?></td>

                <td width="16%" bgcolor="#FFFFFF">Date</td>

                <td width="32%" bgcolor="#FFFFFF"><?php echo date("F j, Y");?></td>

              </tr>

              <tr>

                <td rowspan="2" bgcolor="#FFFFFF">To:</td>

                <td rowspan="2" bgcolor="#FFFFFF"><span style="font-size:160%; font-weight:400; text-decoration:underline"><?php 

	

	$sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $trip_hotel and deleted=0")or die(mysqli_error($conn)());

	$result = mysqli_fetch_assoc($sql);



	$phone= $result['phone'];

	echo $hotel_name = $result['hotel_name'];

	$fax= $result['fax'];

	

	

	?></span></td>

                <td bgcolor="#FFFFFF">Phone:</td>

                <td bgcolor="#FFFFFF"><?php echo $phone?></td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Fax</td>

                <td bgcolor="#FFFFFF"><?php echo $fax?></td>

              </tr>

              <tr>

                <td rowspan="3" bgcolor="#FFFFFF">From:</td>

                <td rowspan="3" bgcolor="#FFFFFF"><?php echo $_SESSION['f_name'];?>

<br/>

                 [Kibo Slopes Safaris]</td>

                <td bgcolor="#FFFFFF">Phone</td>

                <td bgcolor="#FFFFFF">+254 2 2139981/2633217</td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Fax</td>

                <td bgcolor="#FFFFFF">+254 2 3861513</td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Email:</td>

                <td bgcolor="#FFFFFF">sales@kiboslopes.com</td>

                </tr>

             

            </table>

              <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:#CCC 1px solid;">

             

                    <tr class="black_text">

            <td align="center" colspan="4" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><span style="font-size:125%"><u><strong>RE: Hotel Payment Details<?php /*

//terms

$sql = mysqli_query($conn,"SELECT * FROM tbl_trip_hotels WHERE trip_id=$tripID and hotel_id=$trip_hotel AND deleted=0 ")or die(mysqli_error($conn)());

 $report_result=mysqli_fetch_array($sql);

 $re=$report_result['report_type'];

 $typ='';

 $mes='-';

 if($re==1){

 $typ=' Reservation';

  $mes='<b> reserve</b> ';

 }

 else if($re==2){

  $typ=' Date Ammendment';

  $mes=' <b>amend </b>';

  }

  else if($re==3){

    $typ=' Cancellation';

  $mes=' <b>cancel </b>';

  }

   else if($re==4){

  $typ=' Rooming Ammendment';

  $mes=' <b>amend </b>';

  }

  

echo $typ; */?></strong></u></span></td>

            <td bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

        

                </tr>

              </table></td>

            </tr>

          <tr class="black_text">

            <td height="33" colspan="10" bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><!--Kindly Reserve<?php //=$mes;?> and Confirm for us accomodation under reference<b> 

              <?php echo $tripname?> </b>on the dates indicated below-->
              
              </td>

            </tr>

          <tr class="black_text">

            <td height="20" colspan="9" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Reservation Details</strong></td>

            <td width="21%" height="20" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

          </tr>

          <tr class="black_text">

            <td width="19%" height="20" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Date </td>

            <td width="15%" height="20" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >&nbsp;</td>

            <td width="12%" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">No of rooms</td>

            <td colspan="6" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Type of Rooms</td>

            <td rowspan="2" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

          </tr>

          <tr class="black_text">

            <td width="5%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; font-size:80%">Sn</td>

            <td width="5%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Db</td>

            <td width="6%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Twin</td>

            <td width="6%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Trip</td>
            <td width="6%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Fam</td>

            <td width="11%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Child Beds</td>

          </tr>

          <?php $dates = array();

$strSQLReservations="SELECT  * FROM  tbl_itinerary WHERE trip_id=$tripID and hotel_id=$trip_hotel and deleted=0";

$reservation = mysqli_query($conn,$strSQLReservations)or die(mysqli_error($conn)());

$num=mysqli_num_rows($reservation);

while($reservation_result=mysqli_fetch_array($reservation)){

	 $dates[]=strtotime($reservation_result['date']);

}

	 $dates[]=strtotime('2030-01-04');

	$consec = array(); 

$ii = 0;

$max = count($dates);

$nights=0;

//$nights=count($days)-1;	  


			

for($i = 0; $i < count($dates)-1; $i++) {

    $consec[$ii][] = date('Y-m-d',$dates[$i]);



    if($ii < $max+1) {

        $dif = $dates[$i + 1] - $dates[$i];

        if($dif >= 90000) {

          ?>

		  <tr class="black_text">

            <td  bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" > 

		  <?php

		   echo 'In '. date('d-M-Y',strtotime(reset($consec[$ii]))); 

		     echo " <br>Out ";

			$out= date(end($consec[$ii])); 

			

		echo date('d-M-Y',strtotime($out."+ 1 days"));

?></td>

            <td  bgcolor="#FFFFFF"  align="center" style="border-bottom:1px #C0C0C0 solid" ><?php echo count($consec[$ii]) .'night(s)'; ?></td>

            <td  bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" >

              <?php 
	    
		mysqli_query($conn,"SET SQL_BIG_SELECTS=1");  //Set it before your main query
		
		$reservation = mysqli_query($conn,"SELECT  * FROM  tbl_itinerary WHERE trip_id=$tripID and hotel_id=$trip_hotel and deleted=0")or die(mysqli_error($conn)());

		$reservation_result=mysqli_fetch_array($reservation);



	$days[]=$reservation_result['date'];

	

	$itinerary_id=$reservation_result['itinerary_id'];

	$singles=$reservation_result['singles'];
	
	$doubles=$reservation_result['doubles'];
	
	$twins=$reservation_result['twins'];
	
	$triples=$reservation_result['triples'];
	
	$family_rooms=$reservation_result['family_rooms'];
	
	$child_beds=$reservation_result['child_beds'];
	
	$rooms=$singles+$doubles+$twins+$triples+$family_rooms;

echo $rooms;

?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" >

			<?php

 echo $singles;


?>

<br/> <span style="font-family: 'Book Antiqua','comic sans ms', fantasy"><B><!--<?php // =$total_rooms?></b> rooms total--></span></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $doubles?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $twins?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $triples?></td>
            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $family_rooms;?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $child_beds ?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

          </tr>

              <?php $ii++;

        }   

    }

}

	?>   

              

          

            <tr class="black_text">

              <td height="25" colspan="10" bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" >

              <table cellspacing="0" cellpadding="0">

                <col width="89" />

                <col width="136" />

                <col width="89" span="6" />

                <col width="127" />

                <col width="95" />

                   

 <tr>

                  <td colspan="11"><strong>Rate Calculation</strong></td>

                  </tr>

                <tr>

                  <td width="90"> <strong>Singles</strong></td>

                  <td width="126"> <strong>Doubles</strong></td>

                  <td width="64"> <strong>Twins</strong></td>

                  <td width="115"><strong>Triples</strong></td>
                  <td width="72"><strong>Family</strong></td>

                  <td width="72"><?php //  =$k?><strong>Child Beds</strong></td>

                  <td width="42"><strong>Extra Cost</strong></td>

                  <td width="43">Date</td>

                  <td><strong> Total Amount</strong></td>

                  <td width="75"><strong>Terms</strong></td>
                  <td width="75">&nbsp;</td>

                </tr>

 
				<!--loop from here-->
                <?php
                
				$strSQLReservationsRates="SELECT i.date,i.itinerary_id,i.singles,i.doubles,i.twins,i.triples,i.family_rooms,i.child_beds,th.booking,hc.mode_of_payment,hc.used_currency,hc.hotel_reference,hc.single_price,hc.db_price,hc.twin_price,hc.trp_price,hc.kid_price,hc.family_room_price,hc.extra_charges FROM tbl_itinerary AS i LEFT JOIN tbl_trip_hotels th ON i.itinerary_id=th.itineray_id LEFT JOIN  tbl_hotel_charges hc ON th.trip_hotel_id=hc.trip_hotel_id WHERE i.trip_id=$tripID AND i.hotel_id=$trip_hotel AND i.deleted=0";
				$reservation = mysqli_query($conn,$strSQLReservationsRates)or die(mysqli_error($conn)());
				
				
				
				
				while($reservation_result=mysqli_fetch_array($reservation))
				{
					
					$bookingdate= date('d M Y',strtotime($reservation_result['date']));
					
					$itinerary_id=$reservation_result['itinerary_id'];
				
					$singles=$reservation_result['singles'];
					
					$doubles=$reservation_result['doubles'];
					
					$twins=$reservation_result['twins'];
					
					$triples=$reservation_result['triples'];
					
					$child_beds=$reservation_result['child_beds'];
					
					$family_rooms=$reservation_result['family_rooms'];
					
					$terms =$reservation_result['booking'];
					
					$currency = $reservation_result['used_currency'];
					
					if(is_null($currency)){
						
						$currency = '';
					}
					
					
					$s=$reservation_result['single_price'];
					
					if(is_null($reservation_result['single_price']))
					{
						
						$s=0;
					}
					
					
					
					$d=$reservation_result['db_price'];
					
					if(is_null($d))
					{
						
						$d=0;
					}
					
					$t=$reservation_result['twin_price'];
					
					if(is_null($t))
					{
						
						$t=0;
					}
					
					$tr=$reservation_result['trp_price'];
					
					if(is_null($tr))
					{
						
						$tr=0;
					}
					
					$k=$reservation_result['kid_price'];
					
					if(is_null($k))
					{
						
						$k=0;
					}
					
					
					$f=$reservation_result['family_room_price'];
					
					if(is_null($f))
					{
						
						$f=0;
					}
					
					
					$e=$reservation_result['extra_charges'];
					
					
					if(is_null($e))
					{
						
						$e=0;
					}
					
					$tt_payable=$s*$singles+$d*$doubles+$t*$twins+$triples*$tr+$k*$child_beds+$f*$family_rooms+$e;
					
				?>
                <tr>

                  <td align="center"><?php 
				  
				  if(($singles." x ".$s)=="0 x 0")
				  {
				  	echo "-";
				  }
				  else
				  {
					echo $singles." x ".$s;  
				  }
				  
				  ?></td>

                  <td align="center"><?php
				  
				  if(($doubles." x ".$d)=="0 x 0")
				  {
				  	echo "-";
				  }
				  else
				  {
					echo $doubles." x ".$d;
				  }
				  
				   ?></td>

                  <td><?php 
				  
				   if(($twins." x ".$t)=="0 x 0")
				   {
						echo "-";
				   }
				   else
				   {
						echo $twins." x ".$t;
				   }
				  ?></td>

                   <td><?php
				   if(($triples." x ".$tr)=="0 x 0")
				   {
						echo "-";
				   }
				   else
				   {
						echo $triples." x ".$tr;
				   }
				   ?></td>
                   <td>
                   <?php
				   if(($family_rooms." x ".$f)=="0 x 0")
				   {
						echo "-";
				   }
				   else
				   {
						echo $family_rooms." x ".$f;
				   }
				   ?>
                   </td>

                  <td><?php 
				   if(($child_beds." x ".$k)=="0 x 0")
				   {
						echo "-";
				   }
				   else
				   {
						echo $child_beds." x ".$k;
				   }
				  ?></td>

                  <td><?php
				  if($e==0)
				  {
				  	echo "-";
				  }
				  else
				  {
				  	echo $e;
				  }
				  
				   ?></td>

                  <td>&nbsp;</td>

                  <td>          </td>

                  <td>&nbsp;</td>
                  <td>&nbsp;</td>

                  </tr>

                   <tr height="30" style="border-bottom:#0C6; background-color:#ddd">

                  <td align="center"><?php echo $singles*$s?></td>

                  <td align="center"><?php echo $doubles*$d?></td>

                  <td><?php echo $twins*$t?></td>

                   <td><?php echo $triples*$tr?></td>
                   <td><?php echo $family_rooms*$f?></td>

                  <td><?php echo $child_beds*$k?></td>

                  <td><?php echo $e?></td>

                  <td><?php echo $bookingdate?></td>

                  <td><?php echo $cur.':'?> <?php echo $tt_payable?>      </td>

                  <td><?php echo $terms;?></td>
                  <td> <a href="forms/edit_itinerary.php?itnid=<?php echo $itinerary_id?>&inc=<?php echo $tripID?>">Update rates</a></td>

                   </tr>  
                <?php
				}
				?>  
                  <!--end looping here-->
                  <tr>

                  <td colspan="11">Payments</td>

                  </tr>

                  <?php $payeble=mysqli_query($conn,"SELECT * FROM tbl_payments where hotel_id=$trip_hotel and trip_id=$tripID and is_deleted=0 ORDER BY transactiondate") or die(mysqli_error($conn)());
			$i=1;
			
		 while( $rows=mysqli_fetch_array($payeble)){

			
				$cur=$rows['currency_used'];
	
				$amountpaid=$rows['amountpaid'];
	
				$payment_date=$rows['transactiondate']; 

				?>
                  <tr>

                    <td colspan="6">Payment <?php echo $i++?></td>

                    <td>&nbsp;</td>

                    <td><?php echo date('d M Y',strtotime($payment_date))?></td>

                    <td><?php echo $cur.":"?><?php echo $amountpaid?></td>

                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                    </tr>
                  <?php 

			   }?>
               
                <tr>

                    <td colspan="6">&nbsp;</td>

                    <td>&nbsp;</td>

                    <td>&nbsp;</td>

                    <td>&nbsp;</td>

                    <td><span style="font-size:130%; color:red; text-decoration:underline"><?php echo $bal?></span></td>
                    <td>&nbsp;</td>

                  </tr>

              </table>

                

                <p>Kindly confirm reservation by return fax of this voucher</p></td>

              </tr>

            <tr height="30" id="servedby" class="black_text">

               <td height="20"  colspan="3" align="left"bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

               <td height="20"  colspan="8" align="left"bgcolor="#333333">Kind Regards: 

                 <?php echo $_SESSION['f_name']?>-Kibo Slopes</td>

                </tr>

              <?php  $sql = mysqli_query($conn,"SELECT   * FROM   tbl_itinerary WHERE trip_id = $tripID")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);



 if($numofrows == 0){?>

	<?php	}

for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($sql); //get a row from our result set

	$date  = $result['date'];

	$title  = $result['title'];

	$details  = $result['details'];



	

	   

	

    if($i % 2) { //this means if there is a remainder

        

		?>

          <?php

    } else { //if there isn't a remainder we will do the else

       ?> <?php

    }

   

}

	?>

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