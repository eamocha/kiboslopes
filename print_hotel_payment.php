<?php
session_start();

$userID=0;

if(isset($_SESSION['u_id']))
{
	$userID = $_SESSION['u_id'];
}


$fullName = $_REQUEST['f_name'];

$f_name = $fullName;


include('lib/config.php'); 
include('lib/functions.php'); 


$tripID = $_GET['inc']; 

mysqli_query($conn,"SET SQL_BIG_SELECTS=1");  //Set it before your main query

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trips WHERE trip_id = $tripID and deleted=0")or die(mysqli_error($conn)());

$result=mysqli_fetch_array($sql);



$tripname=$result['group_name'];

//hotel

$trip_hotel=$_REQUEST['hot'];

 $sql = mysqli_query($conn,"SELECT * FROM tbl_trip_hotels  WHERE trip_id = $tripID and hotel_id=$trip_hotel AND deleted=0")or die(mysqli_error($conn)());

    $result= mysqli_fetch_array($sql); 

	$trip_hotel_id  = $result['trip_hotel_id'];

	$trip_id  = $result['trip_id'];

	$hotel_id  = $result['hotel_id'];

	$booking_voucher  = $result['voucher_remarks'];

	$booking_date  = $result['booking_date'];

	$status  = $result['status'];

	$booking  = $result['booking'];



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
	$family_rooms=$rowItenerary['fr'];
	
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



define('TOTAL_AMOUNT_PAYABLE',$tt_payable);//for use at bottom of page


//determine day in and day out, split if they are on different days

$dates = array();

$strSQLReservations="SELECT  * FROM  tbl_itinerary WHERE trip_id=$tripID and hotel_id=$trip_hotel and deleted=0";

$reservation = mysqli_query($conn,$strSQLReservations)or die(mysqli_error($conn)());

$num=mysqli_num_rows($reservation);

while($reservation_result=mysqli_fetch_array($reservation)){

	 $dates[]=strtotime($reservation_result['date']);

}

$ii = 0;

$max = count($dates);

$nights=0;


	 $dates[]=strtotime('2030-01-04');

	$consec = array(); 

$strCheckInCheckOutDate="";
	

for($i = 0; $i < count($dates)-1; $i++) {

    $consec[$ii][] = date('Y-m-d',$dates[$i]);



    if($ii < $max+1) {

        $dif = $dates[$i + 1] - $dates[$i];

        if($dif >= 90000) {
		
			
		   $strCheckInCheckOutDate.= ' In '. date('d-M Y',strtotime(reset($consec[$ii]))); 

		   $strCheckInCheckOutDate.=", Out ";

		   $out= date(end($consec[$ii])); 

		   $strCheckInCheckOutDate.= date('d-M Y',strtotime($out."+ 1 days"));
			
			
			$ii++;
		
		}
	}
	
}//end for


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KIBO SLOPES - Reservation Management System</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<style type="text/css">
body{

	font-family:  helvetica, arial, sans-serif; font-weight: 100;

	font-size:12px;

	margin:0;

	background:#FFF;

	}


td{

font-size:98%}

table tr:nth-child(odd)    { background-color:#eee; }

table tr:nth-child(even)    { background-color:#fff; }
</style>
</head>
<body>
<div id="container">
<div class="clear"></div>
<div id="mid_content"><img src="images/logoprint.jpg" alt="" width="283" height="95" /></div>
<div class="clear"></div>
<div id="mid_content_inner" style="margin-right:100px">
<div id="content_form"> 
<div id="content_box_stepper"></div>
<div id="content_box_rule"></div>
<div id="cente_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="250" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        <td width="200" height="62" align="center" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        <td align="justify" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">

        <table width="349">

          <tr>

            <td>Total cost</td>

            <td>Total  paid</td>

            <td>Balance</td>

          </tr><tr>

            <td><?php echo $cur.':'. $tt_payable?></td>

            <td><?php echo $cur.':'. $paid?></td>

            <td><?php echo $cur.':'.$bal; ?></td>

          </tr>

        </table></td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">

          <tr class="black_text">

            <td height="75" colspan="5" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:#CCC 1px solid;">

              <tr>

                <td width="20%" bgcolor="#FFFFFF"> Voucher No:</td>

                <td width="32%" bgcolor="#FFFFFF" style="font-weight:bolder"><span style="font-size:125%; font-weight:600"><?php echo $tripname?></span></td>

                <td width="16%" bgcolor="#FFFFFF">Date</td>

                <td width="32%" bgcolor="#FFFFFF"><?php echo date("F j, Y");?></td>

              </tr>

              <tr>

                <td rowspan="2" bgcolor="#FFFFFF">To:</td>

                <td rowspan="2" bgcolor="#FFFFFF"><span style="font-size:125%; font-weight:600"><?php 

	

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

                <td bgcolor="#FFFFFF">Email</td>

                <td bgcolor="#FFFFFF"><?php echo $fax?></td>

              </tr>

              <tr>

                <td rowspan="3" bgcolor="#FFFFFF">From:</td>

                <td rowspan="3" bgcolor="#FFFFFF"><?php echo $f_name;?>

<br/>

                 (Kibo Slopes Safaris)</td>

                <td bgcolor="#FFFFFF" style="border-top:1px solid #dedede;">Phone</td>

                <td bgcolor="#FFFFFF"  style="border-top:1px solid #dedede;"><span style="border-top:1px solid #dadada;">+254 20 2139981 / 2633217</span></td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Mobile</td>

                <td bgcolor="#FFFFFF">+254 719 381 519</td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Email:</td>

                <td bgcolor="#FFFFFF">sales@kiboslopessafaris.com</td>

                </tr>

             

            </table>

              <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:#CCC 1px solid;">

             

                    <tr class="black_text">

            <td align="center" bgcolor="#E1E1E1"><span style="border-bottom:1px #C0C0C0 solid; font-size: 14px; font-weight:bold; text-decoration:underline;">RE: Hotel Payment Details</span></td>

            </tr>

              </table></td>

            </tr>

          <tr class="black_text">
            <td height="20" colspan="5" bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>
          </tr>
          <tr class="black_text">
            <td height="33" colspan="5" bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><table cellspacing="0" cellpadding="0">
              
              <col width="89" />
              
              <col width="136" />
              
              <col width="89" span="6" />
              
              <col width="127" />
              
              <col width="95" />
              
              
              
              <tr>
                
                <td colspan="10" height="20" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid"><span style="font-size: 14px; font-weight:bold; text-decoration:underline;">Rate Calculation(<?php echo $strCheckInCheckOutDate;?>)</span></td>
                
                </tr>
              
              <tr>
                <td width="43" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Date</strong></td>
                
                <td width="90" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"> <strong>Singles</strong></td>
                
                <td width="126" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Doubles</strong></td>
                
                <td width="64" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Twins</strong></td>
                
                <td width="115" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Triples</strong></td>
                <td width="72" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Family</strong></td>
                
                <td width="72" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Child Beds</strong></td>
                
                <td width="42" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Extra Cost</strong></td>
                
                <td style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong> Rate</strong></td>
                
                <td width="75" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Terms</strong></td>
                </tr>
              
              
              <!--loop from here-->
              <?php
                
				$strSQLReservationsRates="SELECT i.date,i.itinerary_id,i.singles,i.doubles,i.twins,i.triples,i.child_beds,i.family_rooms,th.booking,hc.mode_of_payment,hc.used_currency,hc.hotel_reference,hc.single_price,hc.db_price,hc.twin_price,hc.trp_price,hc.kid_price,hc.family_room_price,hc.extra_charges FROM tbl_itinerary AS i LEFT JOIN tbl_trip_hotels th ON i.itinerary_id=th.itineray_id LEFT JOIN  tbl_hotel_charges hc ON th.trip_hotel_id=hc.trip_hotel_id WHERE i.trip_id=$tripID AND i.hotel_id=$trip_hotel AND i.deleted=0";
				$reservation = mysqli_query($conn,$strSQLReservationsRates)or die(mysqli_error($conn)());
				
				
				
				
				while($reservation_result=mysqli_fetch_array($reservation))
				{
					
					$bookingdate= date('d M',strtotime($reservation_result['date']));
					
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
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;">&nbsp;</td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php 
				  
				  if(($singles." x ".$s)=="0 x 0")
				  {
				  	echo "-";
				  }
				  else
				  {
					echo $singles." x ".$s;  
				  }
				  
				  ?></td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php
				  
				  if(($doubles." x ".$d)=="0 x 0")
				  {
				  	echo "-";
				  }
				  else
				  {
					echo $doubles." x ".$d;
				  }
				  
				   ?></td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php 
				  
				   if(($twins." x ".$t)=="0 x 0")
				   {
						echo "-";
				   }
				   else
				   {
						echo $twins." x ".$t;
				   }
				  ?></td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php
				   if(($triples." x ".$tr)=="0 x 0")
				   {
						echo "-";
				   }
				   else
				   {
						echo $triples." x ".$tr;
				   }
				   ?></td>
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;">
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
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php 
				   if(($child_beds." x ".$k)=="0 x 0")
				   {
						echo "-";
				   }
				   else
				   {
						echo $child_beds." x ".$k;
				   }
				  ?></td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php
				  if($e==0)
				  {
				  	echo "-";
				  }
				  else
				  {
				  	echo $e;
				  }
				  
				   ?></td>
                
                <td style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;">          </td>
                
                <td style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;">&nbsp;</td>
                </tr>
              
              <tr height="30" style="border-bottom:#0C6; background-color:#ddd">
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php echo $bookingdate?></td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php echo $singles*$s?></td>
                
                <td style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;" align="center"><?php echo $doubles*$d?></td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php echo $twins*$t?></td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php echo $triples*$tr?></td>
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php echo $family_rooms*$f?></td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php echo $child_beds*$k?></td>
                
                <td align="center" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php echo $e?></td>
                
                <td style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php echo $cur.':'?> <?php echo $tt_payable?>      </td>
                
                <td style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><?php echo $terms;?></td>
                </tr>  
              <?php
				}
				?>  
              <!--end looping here-->
              <?php $payeble=mysqli_query($conn,"SELECT * FROM tbl_payments where hotel_id=$trip_hotel and trip_id=$tripID and is_deleted=0 ORDER BY transactiondate") or die(mysqli_error($conn)());
			$i=1;
			
		 while( $rows=mysqli_fetch_array($payeble)){

			
				$cur=$rows['currency_used'];
	
				$amountpaid=$rows['amountpaid'];
	
				$payment_date=$rows['transactiondate']; 

				?>
              <?php 

			   }?>
              
              <tr>
                
                <td colspan="10" align="left" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Extra Costs Details:</strong></td>
                </tr>
                
              <?php
              $strSQLExtraCostDetails="SELECT i.date,hc.hotel_reference,hc.extra_cost_details,hc.extra_charges FROM tbl_itinerary AS i LEFT JOIN tbl_trip_hotels th ON i.itinerary_id=th.itineray_id LEFT JOIN  tbl_hotel_charges hc ON th.trip_hotel_id=hc.trip_hotel_id WHERE i.trip_id=$tripID AND i.hotel_id=$trip_hotel AND i.deleted=0 AND extra_charges>0";
			  $resultExtraDetails = mysqli_query($conn,$strSQLExtraCostDetails);
			  
			  if(mysqli_num_rows($resultExtraDetails)>0)
			  {
				  while($rowExtraDetails = mysqli_fetch_array($resultExtraDetails)){
				  ?>  
				  <tr>
				    <td align="left" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;">&nbsp;</td>
					<td align="left" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"> &nbsp;<?php echo date('d M Y',strtotime($rowExtraDetails['date']));?></td>
					<td colspan="8" align="left" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"> &nbsp;<?php echo $rowExtraDetails['extra_cost_details'];?></td>
				  </tr>
				  <?php
				  }
			  }
			  else
			  {
				?>
				<tr>
                <td colspan="10">No extra cost</td>
                </tr>
				<?php
			  
			  }
			  
			  ?>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="3" align="right"><strong>Total Amount</strong></td>
                <td><strong><?php echo $cur.':'. TOTAL_AMOUNT_PAYABLE;?></strong></td>
                <td>&nbsp;</td>
              </tr>
              
              </table></td>
          </tr>
          <tr class="black_text">
            
            <td height="20" colspan="5" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><span style="font-size: 14px; font-weight:bold; text-decoration:underline;">Payment  Details: </span></td>
            
          </tr>

          <tr class="black_text">
            
            <td width="21%" height="20" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Date </td>
            
            <td width="23%" height="20" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Details</td>
            <td width="14%" height="20" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Mode of payment</td>
            <td width="21%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" > Ref No.</td>
            <td width="21%" height="20" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Amount</td>
            </tr>
		<?php 
   		$payeble=mysqli_query($conn,"SELECT paymentid,reference_no,mode_of_payment,currency_used,amountpaid,transactiondate,payment_description FROM tbl_payments where hotel_id=$trip_hotel and trip_id=$tripID and is_deleted=0 ORDER BY transactiondate") or die(mysqli_error($conn)());
		$i=0;
		$intTotalPayments = mysqli_num_rows($payeble);
		$strRowStyle="";
		
		if($intTotalPayments>0){
		
         	 while($rowPayment=mysqli_fetch_object($payeble)){
				
				$i++;
			
				$cur=$rowPayment->currency_used;
				$amountpaid=$rowPayment->amountpaid;
				$payment_date=$rowPayment->transactiondate; 
				$reference_no = $rowPayment->reference_no;
				$payment_description = $rowPayment->payment_description;
				$mode_of_payment= $rowPayment->mode_of_payment;
		 		
				
				//if last payment highlight to show it is current for the payment
				if($i==$intTotalPayments)
				{
					$strRowStyle="font-weight: bold;";	
				
				}
				else
				{
					$strRowStyle="font-weight: normal;";	
				}
				
				
                        ?>
                        <tr class="black_text">
                            <td  bgcolor="#FFFFFF" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"  ><span style="<?php echo $strRowStyle;?>"><?php echo date('jS M Y',strtotime($rowPayment->transactiondate));?></span></td>
                            <td  bgcolor="#FFFFFF" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"  ><span style="<?php echo $strRowStyle;?>"><?php echo $payment_description;?></span></td>
                            <td  bgcolor="#FFFFFF" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"  ><span style="<?php echo $strRowStyle;?>"><?php echo $mode_of_payment;?></span></td>
                            <td  bgcolor="#FFFFFF" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"  ><span style="<?php echo $strRowStyle;?>"><?php echo $reference_no;?></span></td>
                            <td  bgcolor="#FFFFFF" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"  ><span style="<?php echo $strRowStyle;?>"><?php echo $cur.":"?><?php echo $amountpaid?></span></td>
                        </tr>
                       <?php
                    
              }
		}
		else//no payment record
		{
		?>
		 <tr class="black_text">
            <td colspan="5"  bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid"  >No payments done yet.</td>
         </tr>
		<?php
		
		}
    
        ?>
         <tr class="black_text">
            <td height="20" bgcolor="#FFFFFF"  colspan="3" align="left" >&nbsp;</td>
            <td height="20" bgcolor="#FFFFFF"   align="left" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong>Balance:</strong></td>
            <td height="20" bgcolor="#FFFFFF"   align="left" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid;"><strong><?php echo $cur.':'.$bal; ?></strong></td>
         </tr>
         
        
            <tr height="30">
              <td height="20" bgcolor="#FFFFFF"  colspan="2" align="left" >&nbsp;</td>
              <td height="20" bgcolor="#FFFFFF"  colspan="4" align="left" >&nbsp;</td>
            </tr>
            <tr height="30" id="servedby" class="black_text">
              
              <td height="20"  colspan="2" align="left" bgcolor="#F0F0F0"><?php echo date("F j, Y, g:i a");?></td>
              
              <td height="20"  colspan="4" align="left" bgcolor="#F0F0F0">Kind Regards: 
                
                <?php echo $f_name;?> - Kibo Slopes safaris Ltd.</td>
              
            </tr>

              

  </table></td>

      </tr>

    </table></div>

    <div class="clear"></div>
</div>

</div>

</div>

</body>

</html>