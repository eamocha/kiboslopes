<?php 

//include connection to the database

include_once("lib/config.php"); 



//call functions

include_once("lib/functions.php");

$tripid=$_GET['inc'];

//get trip name

$sql = mysqli_query($conn,"SELECT * FROM tbl_trips WHERE trip_id = $tripid and deleted=0")or die(mysqli_error($conn)());

    $result= mysqli_fetch_array($sql); 

	$group_name  = $result['group_name']; 

	

		

//get the values and clean them

$indate=clean($_REQUEST['idate1']);

$itnedetails=clean($_REQUEST["itindetails"]);

$spreqs=clean($_REQUEST["srequirements"]);

$day=clean($_REQUEST["day"]);

$vehicle=clean($_REQUEST['vehicle']);

$driver=clean($_REQUEST['driver']);

$doubles=clean($_REQUEST['db']);

$singles=clean($_REQUEST['singles']);

$twins=clean($_REQUEST['twins']);

$triples=clean($_REQUEST['triples']);

$hotel=clean($_REQUEST['hotel']);

$voucher_comment=clean($_REQUEST['hotel_comment']);

$child_beds=clean($_REQUEST['children_beds']);

$payment_due=clean($_REQUEST['payment_due']);

//end of tbl_itinerary

//
$deleted = 0;

//query db

$sql="INSERT INTO tbl_itinerary (`date`,`title`,`details`,`trip_id`,`hotel_id`,`deleted`,`remarks`,singles,`doubles`,`twins`,`triples`,`child_beds`) VALUES('$indate','$day','$itnedetails','$tripid','$hotel',$deleted,'$spreqs', '$singles','$doubles','$twins','$triples','$child_beds')"; 

$data=mysqli_query($conn,$sql) or die("Error occured during itenerary insert: ".mysqli_error($conn)());

$last_insert_id = mysql_insert_id();

//

if(isset($_REQUEST['include_hotel']))

{

	$hoteln=clean($_REQUEST['hoteln']);
	
	$hotel=clean($_REQUEST['hotel']).''.$hoteln;
	
	$booking=clean($_REQUEST['booking']);
	
	$status=clean($_REQUEST['status']);
	
	$deleted = 0;
	//
	
	$sql1="INSERT INTO tbl_trip_hotels (trip_id,hotel_id,voucher_remarks,booking_date,status,booking,`deleted`,itineray_id,report_type,payment_due_date)  VALUES('$tripid','$hotel','$voucher_comment','$indate','$status','$booking',$deleted,'$last_insert_id','1','$payment_due')"; 

//

	$data1=mysqli_query($conn,$sql1) or die(" failed to insert hotels trip ".mysqli_error($conn)());
}
	



$pud=clean($_REQUEST['pud']);

$put=clean($_REQUEST['put']);

$dropoff=clean($_REQUEST['dropoff']);

$pup=clean($_REQUEST['pup']);

$route=$pup.' '.$dropoff;



//$sql2="INSERT INTO tbl_operations  VALUES('NULL ','$hotel','$last_insert_id','$tripid','$pud','$put','','$dropoff','$pup')"; 



//$data2=mysqli_query($conn,$sql2);

// enter data to operations ie events
if(isset($_REQUEST['operation'])){

	$events="INSERT INTO events(`event_type`,`title`, `description`, `category_id`, `venue`, `s_date`, `e_date`, `s_time`,`user_id`,`itinerary_id`,`remarks`) VALUES('1','$group_name','$itnedetails','3','$route','$indate','$indate','$put','1','$last_insert_id','$spreqs')";
	
	$insertevent=mysqli_query($conn,$events) or die(" failed to insert operation event ".mysqli_error($conn)());

}

//redirect if everything is OK
header("location:forms/add_itinerary.php?inc=$tripid");

?>