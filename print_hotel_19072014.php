<?php
session_start();

$userID = $_SESSION['u_id'];

$fullName = $_REQUEST['f_name'];

$f_name = $fullName;


include('lib/config.php'); 
include('lib/functions.php'); 


$tripID = $_GET['inc']; 

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
$e=0;
$date_rate_put=date("d.m.Y",time());

$payeble=0;
$bal=0;	
$tt_payable=0;
$paid=0;
$comments="";
$cur="";

//loop through amount due for each hotel per trip

$trip_sql = "SELECT itinerary_id,singles AS s,child_beds as cb,doubles AS d,twins AS t,triples AS tp FROM  tbl_itinerary i  WHERE i.trip_id=$tripID AND i.hotel_id=$trip_hotel AND i.deleted=0 order by i.date desc";

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
	
	//get the rates
	$strSQLHotelRates = "SELECT TH.trip_hotel_id,HC.used_currency,HC.hotel_charges_id,HC.single_price,HC.db_price,HC.twin_price,HC.trp_price,HC.kid_price,HC.extra_charges FROM tbl_trip_hotels TH INNER JOIN tbl_hotel_charges AS HC  ON TH.trip_hotel_id=HC.trip_hotel_id WHERE TH.itineray_id=".$itinerary_id." AND TH.deleted=0";
	
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
	
			   $e=(float)$rowHotelRates['extra_charges'];

		   	   $tt_payable+=($s*$singles+$d*$doubles+$t*$twins+$triples*$tr+$k*$child_beds+$e);
			   
			  
			   
			  
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

		   $strCheckInCheckOutDate.=" Out ";

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


	/*body, table{
	font-size:14px;}*/
	td{

		font-size:98%}

       table tr:nth-child(odd)    { background-color:#eee; }

table tr:nth-child(even)    { background-color:#fff; }
</style>
<body>
<div id="container">
<div id="bilaz"></div>
<div id="mid_content"><img src="images/logoprint.jpg" alt="" width="283" height="95" /></div>
<div id="bilaz"></div>
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

            <td>Total amount</td>

            <td>Amount paid</td>

            <td>Balance</td>

          </tr><tr>

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

            <td align="center" colspan="4" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><span style="font-size:125%"><u><strong>RE:<?php

//terms

$sql = mysqli_query($conn,"SELECT * FROM tbl_trip_hotels WHERE trip_id=$tripID and hotel_id=$trip_hotel AND deleted=0 ")or die(mysqli_error($conn)());

 $report_result=mysqli_fetch_array($sql);

 $re=$report_result['report_type'];

 $typ='';

 $mes='-';

 if($re==1){

 $typ=' RESERVATION';

  $mes='<b> reserve</b> ';

 }

 else if($re==2){

  $typ=' DATE AMENDMENT';

  $mes=' <b>amend</b>';

  }

  else if($re==3){

    $typ=' ROOMING AMENDMENT';

  $mes=' <b>amend</b>';

  }

   else if($re==4){

  $typ=' CANCELLATION';

  $mes=' <b>cancel</b>';

  }

  
  else if($re==5){

  $typ=' PROVISIONAL RESERVATION';

  $mes=' <b>provisonally reserve</b>';

  }

echo $typ;?></strong></u></span></td>

            <td bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

        

                </tr>

              </table></td>

            </tr>

          <tr class="black_text">

            <td height="33" colspan="10" bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" >Kindly <?php echo $mes;?> accomodation under reference<b> 

              <?php echo $tripname?> </b>on the dates indicated below</td>

            </tr>

          <tr class="black_text">

            <td height="20" colspan="8" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Reservation Details: <?php echo $strCheckInCheckOutDate;?></strong></td>

            <td height="20" colspan="2" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

          </tr>

          <tr class="black_text">

            <td height="20" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Date </td>

            <td height="20" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >&nbsp;</td>

            <td width="9%" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">No of rooms</td>

            <td colspan="5" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Type of Rooms</td>

            <td width="7%" rowspan="2" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Terms</td>

            <td width="12%" rowspan="2" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Comments</td>

          </tr>

          <tr class="black_text">

            <td width="5%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; font-size:80%">Sn</td>

            <td width="7%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Db</td>

            <td width="7%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Twin</td>

            <td width="6%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Trip</td>

            <td width="8%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">child Beds</td>

          </tr>

          <?php $dates = array();

$reservation = mysqli_query($conn,"SELECT *

FROM tbl_itinerary

JOIN tbl_trip_hotels ON tbl_itinerary.itinerary_id = tbl_trip_hotels.itineray_id

WHERE tbl_itinerary.trip_id =$tripID

AND tbl_trip_hotels.hotel_id =$trip_hotel

AND tbl_trip_hotels.deleted =0

ORDER BY tbl_itinerary.date")or die(mysqli_error($conn)());



$num=mysqli_num_rows($reservation);

while($reservation_result=mysqli_fetch_array($reservation)){
 
 	$dates[]=strtotime($reservation_result['date']);
	?>
	<tr class="black_text">
    <td  bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid"  ><?php echo date('jS M',strtotime($reservation_result['date']));?></td>
    <td  bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid"  >&nbsp;</td>
    <td  bgcolor="#FFFFFF" style="font-size:125%; padding-top:5px; padding-bottom:5px; border-bottom:1px #C0C0C0 solid" >
      <span style="font-weight:900"> <?php 
    
        $days[]=$reservation_result['date'];
        
        $itinerary_id=$reservation_result['itinerary_id'];
        
        $singles=$reservation_result['singles'];
        
        $doubles=$reservation_result['doubles'];
        
        $twins=$reservation_result['twins'];
        
        $triples=$reservation_result['triples'];
        
        $child_beds=$reservation_result['child_beds'];
        
        $rooms=$singles+$doubles+$twins+$triples;
        
        echo $rooms;
    
    ?></span></td>
    
     		<td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $singles;?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $doubles?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $twins?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $triples?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $child_beds?></td>

            <td  bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $reservation_result['booking'];?></td>
     <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $reservation_result['voucher_remarks'];?></td>
</tr>
	
	<?php

}

?>

          <tr class="black_text">

            <td height="20" colspan="3" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Rooming and Name List</strong></td>

            <td colspan="5" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="20" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="20" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

          </tr>

          <tr class="black_text">

            <td width="18%" height="24" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Room</td>

            <td width="21%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Full Name</td>

            <td nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Room Type</td>

            <td colspan="7" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            </tr>

  <?php  

$visitor_sql = mysqli_query($conn,"SELECT   *

FROM

  tbl_visitors WHERE trip_id = $tripID and deleted=0")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($visitor_sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="10" align="center" valign="middle" bgcolor="#fff" class="italix">To follow later!</td>

            </tr>

	<?php	}

for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($visitor_sql); //get a row from our result set

		$visitor_id  = $result['visitor_id'];

	$visitor_name  = $result['visitor_name'];

	$address  = $result['address'];

	$nationality  = $result['nationality'];

	$passport_details  = $result['passport_details'];

	$room_type  = $result['room_type'];

	$sharing_double=$result['gender'];

	$insurance=$result['insurance'];

	$sharing_tripple=$result['sharing_triple'];

	$age  = $result['age'];



	   

	

//this means if there is a remainder

        

		?><tr>

    <td height="20" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"> <?php echo $visitor_id?></td>

    <td height="20" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

      <?php echo $visitor_name?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years)'; }?>

</td>

    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $room_type?></td>

    <td colspan="7" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

    </tr>

          <?php

    if($room_type!=''|| $room_type!='Single'){

		

              $share="SELECT `sharing_id`, `v_name`, `sharing_with`, `pp_details`, `insurance_details`, `home_address`, `nation`, `age` FROM `tbl_sharing` WHERE `sharing_with`=$visitor_id and deleted=0" or die();

			  $quer=mysqli_query($conn,$share);

			  while($share_q=mysqli_fetch_array($quer)){

				  $sharing_id=$share_q['sharing_id'];

				    $sharing_with=$share_q['sharing_with'];

				    $v_name=$share_q['v_name'];

					  $pp_details=$share_q['pp_details'];

					    $insurance_details=$share_q['insurance_details'];

						  $home_address=$share_q['home_address'];

						    $nation=$share_q['nation'];

							 (int)$age=$share_q['age'];

							 ?>  

    

            

       <tr>

         <td height="20" bgcolor="#fFF" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">      <?php echo $sharing_with?></td>

         <td height="20" bgcolor="#fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">

           <?php

							 echo $v_name;

				   ?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years)'; }?>

  </td>

         <td bgcolor="#fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"> 

           <?php echo $room_type?>

         </td>

         <td colspan="7" bgcolor="#fff" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">&nbsp;</td>

         </tr>

       <?php }}

	

	



			

    }

   



	?>   

              

          

            <tr class="black_text">

              <td height="25" colspan="10" bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><table cellspacing="0" cellpadding="0">

                <col width="89" />

                <col width="136" />

                <col width="89" span="6" />

                <col width="127" />

                <col width="95" />

              </table>

              

                <p>Kindly confirm reservation by return  of this voucher</p></td>

              </tr>

            <tr height="30" id="servedby" class="black_text">

               <td height="20"  colspan="3" align="left"bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

               <td height="20"  colspan="8" align="left"bgcolor="#333333">Kind Regards: 

                 <?php echo $f_name;?> - Kibo Slopes safaris Ltd.</td>

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