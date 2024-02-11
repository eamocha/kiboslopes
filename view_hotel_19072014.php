<?php
session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];

include('lib/config.php'); 

//call functions

include('lib/functions.php');



$tripID =$_GET['inc']; 

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trips WHERE trip_id = $tripID and deleted=0")or die(mysqli_error($conn)());

$result=mysqli_fetch_array($sql);



$tripname=$result['group_name'];

//hotel

$trip_hotel=$_REQUEST['hot'];

//start totalpayment calculation

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


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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

        <link media="screen" rel="stylesheet" href="css/colorbox.css" type="text/css" />

        <script src="js/jquery.colorbox.js" type="text/javascript"></script> 

         <!-- Color Box End -->



        

     <script type="text/javascript">   $(document).ready(function(){


			$("#MyForm").validationEngine();

			$(".example5").colorbox();


		});</script>

        <style type="text/css">td{

		font-size:98%}

       table tr:nth-child(odd)    { background-color:#eee; }

table tr:nth-child(even)    { background-color:#fff; }

</style>

<!--pop up-->

<script>function popup(url){

  cuteLittleWindow = window.open(url, "littleWindow", "location=no,width=500,height=400"); 

}</script></head>

<?php 
/*

    //payments

		$paid=0;

		$bill=0;

		$sn=0;

		$dbs=0;

		$tr=0;

		$tw=0;

		$sprice=0;

		$dbprice=0;

		$twnprice=0;

		$trprice=0;

		$kids=0;

		$kid_price=0;$currency="";

	$paysql = mysqli_query($conn,"SELECT * FROM tbl_hotel_payments WHERE trip_id = $tripID and hotel_id=$trip_hotel and deleted=0")or die(mysqli_error($conn)());

   while( $result= mysqli_fetch_array($paysql)){

	$hot_p  = $result['hotel_payments_id'];

	$sn  += (int) $result['no_singles'];

	

	$dbs += (int)$result['no_doubles'];

	$tr += (int)$result['no_triples'];$tw  += (int) $result['no_twins'];

	$sprice  += (int)$result['single_price'];

	$dbprice  += (int)$result['db_price'];

	$twnprice  += (int) $result['twin_price'];

	$trprice  += (int)$result['trp_price'];	

	$currency=$result['currency'];

	$date=$result['date'];

	$bill += (int)$result['bill'];	$hotel_id  = $result['hotel_id'];	$kids  += (int) $result['kids'];

	

$kid_price  += (int) $result['kid_price'];

	$mode_of_payment  = $result['mode_of_payment'];

	

	$comments=$result['comments'];

	$refer=$result['refer'];

	$trip_id  = $result['trip_id'];

   

   //$paid

   }

   $paid=$sn*$sprice+$dbs*$dbprice+$tr*$trprice+$tw*$twnprice+$kids*$kid_price;

	 $bal=$bill-$paid;
*/
	 ?>

<body>

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

  <div id="content_box_title">Trip View</div>

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

      

      <li ><a title="KIBO SLOPES" href="view_trip.php?inc=<?php echo $tripID;?>"><img  src="images/icon2.png" alt="" width="27" height="21" />  Trip</a></li>

<li><a title="KIBO SLOPES" href="flights.php?inc=<?php echo $tripID?>"><img src="images/icon2.png" width="27" height="21" />Flights</a></li>

            

      <li style="background:#F0F0F0;">

      <a  href="hotels.php?inc=<?php echo $tripID?>" title="KIBO SLOPES"><img src="images/icon2.png" alt="" width="27" height="21" />Hotels </a></li>

    </ul><div><span class="al-head">Alerts</span><span  id="alerts">-Others data<br />

    -cdata 2</span></div>

<div id="notifications"></div>

<div><span class="al-head">Changes</span><span id="changes">-change sommthing</span></div>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="250" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Hotel Details</a></div>

            <ul>

             <li>

 					<div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>                <ul>

                  <li><a href="print_hotel_pdf.php?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel?>&f_name=<?php echo $fullName;?>" title="print">Print Voucher</a></li>

                  </ul>

                </li> 
                
                
                  <li>

 					<div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>                <ul>

                  <li><a target="_blank" href="print_hotel.php?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel?>&f_name=<?php echo $fullName;?>" title="print">View Booking Voucher</a></li>

                  </ul>

                </li>      
                      

                              <li>

                <div id="sub_menu_icon"><img src="images/report_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="cancel_hotel.php?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel?>" title="<input type='button' value='Print Report' onclick='window.print()' />" style="padding-left:25px;">Print cancelled Voucher</a></li>

                  </ul>

                </li> <li>

                <div id="sub_menu_icon"><img src="images/email.png" alt=""  border="0" padding-bootom:2px /></div>

                <ul>

                  <li><a class='example5' href="#" title="email" style="padding-left:25px;">Email Voucher</a></li>

                  </ul>

                </li>

              </ul>

            </li>

          </ul></td>

        <td width="200" height="62" align="center" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">

        

        <form id="hotelreport" name="hotelreport" method="post" action="report_type.php?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel?>">Report Type

        <select id="report_type" name="report_type">

        <option value="">--select--</option>

          <option value="1"> Reservation       </option>
		  <option value="5"> Provisional Reservation </option>
          <option value="2"> Date Amendment       </option>
		  <option value="3">Rooming Amendment       </option>
		  <option value="4">Cancellation        </option>

                 </select>

                 <input type="submit" name="submit" id="submit" value="save" />

        </form>

               

                 </td>

        <td align="justify" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">

        <table width="349">

          <tr>

            <td bordercolor="#333333">Total amount</td>

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

            <td height="75" colspan="11" bgcolor="#F0F0F0" style="border-bottom:1px #C0C0C0 solid" ><table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" style="border:#CCC 1px solid;">

              <tr>

                <td width="20%" bgcolor="#FFFFFF"> Voucher No:</td>

                <td width="32%" bgcolor="#FFFFFF"><STRONG><?php echo $tripname?></STRONG></td>

                <td width="16%" bgcolor="#FFFFFF">Date</td>

                <td width="32%" bgcolor="#FFFFFF"><?php echo date("F j, Y");?></td>

              </tr>

              <tr>

                <td rowspan="2" bgcolor="#FFFFFF">To:</td>

                <td rowspan="2" bgcolor="#FFFFFF"><B><?php 

	

	$sql = mysqli_query($conn,"SELECT * FROM tbl_hotels WHERE hotel_id = $trip_hotel")or die(mysqli_error($conn)());

	$result = mysqli_fetch_assoc($sql);



	$phone= $result['phone'];

	echo '<B>'.$hotel_name = $result['hotel_name'].'</B>';

	$fax= $result['fax'];

	

	

	?></B></td>

                <td bgcolor="#FFFFFF">Phone:</td>

                <td bgcolor="#FFFFFF"><?php echo $phone?></td>

              </tr>

              <tr>

                <td bgcolor="#FFFFFF">Email</td>

                <td bgcolor="#FFFFFF"><?php echo $fax?></td>

              </tr>

              <tr>

                <td rowspan="3" bgcolor="#FFFFFF">From:</td>

                <td rowspan="3" bgcolor="#FFFFFF"><?php echo $_SESSION['f_name'];?>

<br/>

                 [Kibo Slopes Safaris]</td>

                <td bgcolor="#FFFFFF"  style="border-top:1px solid #dadada;">Phone</td>

                <td bgcolor="#FFFFFF"  style="border-top:1px solid #dadada;">+254 20 2139981 / 2633217</td>

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

  $mes='<b> make reservation</b> ';

 }

 else if($re==2){

  $typ=' DATE AMENDMENT';

  $mes=' <b>amend date </b>';

  }

  else if($re==3){

    $typ=' ROOMING AMENDMENT';

  $mes=' <b>amend rooming</b>';

  }

   else if($re==4){

  $typ=' CANCELLATION';

  $mes=' <b>CANCEL / Release Services </b>';

  }
  else if($re==5){
	  
	   $typ=' PROVISIONAL RESERVATION';

  	   $mes=' <b>provisionally reserve</b>';
  }

echo $typ;?></strong></u></span></td>

            <td bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

        

                </tr>

              </table></td>

            </tr>

          <tr class="black_text">

            <td height="33" colspan="11" bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" >Kindly <?php echo $mes;?> under this reference<b> 

              <?php echo $tripname?> </b> as detailed below</td>

            </tr>

          <tr class="black_text">

            <td height="20" colspan="11" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Reservation Details</strong></td>

            </tr>

          <tr class="black_text">

            <td height="20" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Date </td>
            <td rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >&nbsp;</td>

            <td width="11%" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">No of rooms</td>

            <td colspan="5" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; text-align: center;">Type of Rooms</td>

            <td colspan="2" rowspan="2" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Terms</td>

            <td width="30%" rowspan="2" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">Comments</td>

          </tr>

          <tr class="black_text">

            <td width="4%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid; font-size:80%">Sn</td>

            <td width="3%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Db</td>

            <td width="3%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Twin</td>

            <td width="4%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">Trip</td>

            <td width="5%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid;font-size:80%">child beds</td>

            </tr>

          <?php  $dates = array();

$booking_terms=array();

$comments=array();

$doubles=array();

$twins=array();

$triples=array();

$singles=array();



$child_beds=array();

$reservation = mysqli_query($conn,"SELECT *

FROM tbl_itinerary

JOIN tbl_trip_hotels ON tbl_itinerary.itinerary_id = tbl_trip_hotels.itineray_id

WHERE tbl_itinerary.trip_id =$tripID

AND tbl_trip_hotels.hotel_id =$trip_hotel

AND tbl_trip_hotels.deleted =0

ORDER BY tbl_itinerary.date")or die(mysqli_error($conn)());

$num=mysqli_num_rows($reservation);

while($reservation_result=mysqli_fetch_array($reservation)){
?>
<tr class="black_text">
    <td  bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid"  ><?php echo date('jS M Y',strtotime($reservation_result['date']));?></td>
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
    
                <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" >
    
                <?php
    
     echo $singles;
    
    
    ?>
<br/> <span style="font-family: 'Book Antiqua','comic sans ms', fantasy"><!-- <?php // =$total_rooms?></b> rooms total--></span></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $doubles?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $twins?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $triples?></td>

            <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><?php echo $child_beds?></td>

            <td colspan="2" bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" >

              <?php echo $reservation_result['booking'];?></td>
     <td bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid"><?php
     if($reservation_result['voucher_remarks']<>"")
	 {
		 echo $reservation_result['voucher_remarks'];
	 }
	 else
	 {
	 	echo "-";
	 }
	 ?> (<a  href="javascript:popup('addcomment.php?trip_id=<?php echo $reservation_result['trip_id'];?>&trip_hotel_id=<?php echo $reservation_result['trip_hotel_id'];?>')">Update</a>)</td>
</tr>
<?php
}
?>
<tr class="black_text">

            <td height="20" colspan="3" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" ><strong>Rooming and Name List</strong></td>

            <td height="20" colspan="7" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

            <td height="20" bgcolor="#E1E1E1" style="border-bottom:1px #C0C0C0 solid" >&nbsp;</td>

          </tr>

          <tr class="black_text">

            <td width="14%" height="24" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Room Number</td>
            <td width="14%" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" >Full Name</td>

            <td colspan="9" nowrap="nowrap" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">RoomType</td>

            </tr>

  <?php  

$visitor_sql = mysqli_query($conn,"SELECT   *

FROM

  tbl_visitors WHERE trip_id = $tripID and deleted=0")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($visitor_sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="11" align="center" valign="middle" bgcolor="#fff" class="italix">To follow later!</td>

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
    <td bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">  <?php

							 echo $visitor_name;

				   ?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years)'; }?></td>

    <td colspan="9" bgcolor="#F0F0F0" class="black_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $room_type?></td>

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

         <td height="20" bgcolor="#fFF" class="white_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">      <?php echo $sharing_with?></td>
         <td bgcolor="#fFF" class="white_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid">  <?php

							 echo $v_name;

				   ?><?php if($age<18 and $age>0){

		  echo '-('.$age.'years)'; }?></td>

         <td colspan="9" bgcolor="#fff" class="white_text" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"> 
           
           <?php echo $room_type?>
           
         </td>

         </tr>

       <?php }}

	

	



			

    }

   



	?>   

              

          

            <tr class="black_text">

              <td height="25" colspan="11" bgcolor="#FFFFFF" style="border-bottom:1px #C0C0C0 solid" ><table cellspacing="0" cellpadding="0">

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

               <td height="20"  colspan="9" align="left"bgcolor="#333333">Kind Regards: 

                 <?php echo $_SESSION['f_name']?>

- Kibo Slopes safaris Ltd.</td>

                </tr>

              <?php  $sql = mysqli_query($conn,"SELECT  * FROM   tbl_itinerary WHERE trip_id = $tripID")or die(mysqli_error($conn)());

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