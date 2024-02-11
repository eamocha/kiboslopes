<?php 
session_start();
//include connection to the database
include('auth.php'); 


include_once("lib/config.php"); 
//call functions

include_once("lib/functions.php");

//DB_HOST,DB_USER,DB_PASSWORD,DB_NAME

//use mysqli to support transactions
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}



$tripid=$_GET['inc'];
$itnid=$_REQUEST['itnid'];


//get trip name

$sql = mysqli_query($conn,"SELECT * FROM tbl_trips WHERE trip_id = $tripid and deleted=0")or die(mysqli_error($conn)());

    $result= mysqli_fetch_array($sql); 

	$group_name  = $result['group_name']; 

	

/*
start the transaction statements here

*/

$indate=$_REQUEST['idate1'];

$itnedetails=$_REQUEST["itindetails"];

$spreqs=$_REQUEST["srequirements"];

$day=$_REQUEST["day"];

$vehicle=$_REQUEST['vehicle'];

$driver=$_REQUEST['driver'];

$doubles=$_REQUEST['db'];

$singles=$_REQUEST['singles'];

$twins=$_REQUEST['twins'];

$triples=$_REQUEST['triples'];

$hotel=$_REQUEST['hotel'];

$voucher_comment=$_REQUEST['hotel_comment'];

$child_beds=$_REQUEST['children_beds'];

$payment_due=$_REQUEST['payment_due'];

$hotel_reference = $_REQUEST['hotel_reference'];

$deleted=0;

//get rates
$singlesrate = trim($_REQUEST['singlesrate']);

if(!is_numeric($singlesrate))
{
	$singlesrate=0;
}


$dbrate = trim($_REQUEST['dbrate']);

if(!is_numeric($dbrate))
{
	$dbrate=0;
}

$twinsrate = trim($_REQUEST['twinsrate']);

if(!is_numeric($twinsrate))
{
	$twinsrate=0;
}

$triplesrate = trim($_REQUEST['triplesrate']);

if(!is_numeric($triplesrate))
{
	$triplesrate=0;
}

$children_bedsrates =trim($_REQUEST['children_bedsrates']);

if(!is_numeric($children_bedsrates))
{
	$children_bedsrates=0;
}

$currency = $_REQUEST['currency'];


//calculate the hotel rates
$singlestotalcost = $singles * $singlesrate;
$dbtotalcost = $doubles * $dbrate;
$twinstotalcost = $twins * $twinsrate;
$triplestotalcost = $triples * $triplesrate;
$chidrentotalcost = $child_beds * $children_bedsrates;

$extracost = trim($_REQUEST['extracost']);

if(!is_numeric($extracost))
{
	$extracost = 0;
}

$extracostcomments = trim($_REQUEST['extracostcomments']);


//get current datetime
$currentdatetime = date('Y-m-d H:i:s');


try
{
  /* switch autocommit status to FALSE. Actually, it starts transaction */
  $conn->autocommit(FALSE);

  $sql="UPDATE tbl_itinerary SET `date` = ?,`title` = ?,`details` = ?,`trip_id` = ?,`hotel_id` = ?,`deleted` = ?,`remarks` = ?,singles = ?,`doubles` = ?,`twins` = ?,`triples` = ?,`child_beds` =? 
  		  WHERE itinerary_id = ?"; 
  /* Prepare statement */
		$stmt = $conn->prepare($sql);
		if($stmt === false) {
			
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		  
		}
		 
		/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
		$stmt->bind_param('sssiiisiiiiii',$indate,$day,$itnedetails,$tripid,$hotel,$deleted,$spreqs,$singles,$doubles,$twins,$triples,$child_beds,$itnid);
		 
		/* Execute statement */
		if($stmt->execute()==FALSE)
		{
			throw new Exception('Wrong SQL: ' . $sql . ' Error: ' . $conn->error);
		}
		
		$itenaryid = $itnid;
		
		//echo $stmt->affected_rows;
		$stmt->close();

  		
		
		//
		
		if(isset($_REQUEST['include_hotel']))
		{
		
			$trip_hotel_id = $_REQUEST['trip_hotel_id'];
			
			$hoteln = $_REQUEST['hoteln'];
			
			$hotel = $_REQUEST['hotel'].''.$hoteln;
			
			$booking = $_REQUEST['booking'];
			
			$status = $_REQUEST['status'];
			
			$deleted = 0;
			
			
			
			if($trip_hotel_id==0){

			//insert the hotel details
			 
				$sqlHotel="INSERT INTO tbl_trip_hotels (trip_id,hotel_id,voucher_remarks,booking_date,status,booking,`deleted`,itineray_id,report_type,payment_due_date)  
					VALUES(?,?,?,?,?,?,?,?,?,?)"; 
			
			}
			else
			{
				//update existing
				$sqlHotel="UPDATE tbl_trip_hotels SET trip_id=?,hotel_id=?,voucher_remarks=?,booking_date=?,status=?,booking=?,`deleted`=?,itineray_id=?,report_type=?,payment_due_date=?  
					 WHERE trip_hotel_id=?"; 
			
			}
			
			$stmt = $conn->prepare($sqlHotel);
			if($stmt === false) {
				
			  trigger_error('Wrong SQL: ' . $sqlHotel . ' Error: ' . $conn->error, E_USER_ERROR);
			  
			}
			 
			
			$report_type = 1;
		    
			
			/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
			if($trip_hotel_id==0){
				//bind insert statement
				$stmt->bind_param('iissssiiis',$tripid,$hotel,$voucher_comment,$indate,$status,$booking,$deleted,$itenaryid,$report_type,$payment_due);
			}
			else
			{
				//bind update statement
				$stmt->bind_param('iissssiiisi',$tripid,$hotel,$voucher_comment,$indate,$status,$booking,$deleted,$itenaryid,$report_type,$payment_due,$trip_hotel_id);
			}
			
			
			/* Execute statement */
			if($stmt->execute()==FALSE)
			{
				throw new Exception('Wrong SQL: ' . $sqlHotel . ' Error: ' . $conn->error);
			}
			
			if($trip_hotel_id==0){//incase we are inserting return the insert id
			
				$trip_hotel_id = $stmt->insert_id;
			}
			//echo $stmt->affected_rows;
			$stmt->close();

			
			//add room rates when hotel details is selected
			//insert to hotel_payment, if no values provided, just put zeroes
			//tbl_hotel_payments, can only have one row with trip_hotel_id, if alredy exists, only update
			
			$hotel_charges_id = $_REQUEST['hotel_charges_id'];
			
			if($hotel_charges_id==0){
			
				$sqlRoomRate="INSERT INTO tbl_hotel_charges(trip_hotel_id,trip_id,hotel_id,mode_of_payment,used_currency,kibo_reference,hotel_reference,single_price,single_total,db_price,db_total,twin_price,twin_total,trp_price,trp_total,kid_price,kid_total,extra_charges,extra_cost_details,comments,is_deleted,payment_due_date,last_modified_on,last_modified_by)
					 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			
			}
			else
			{
				$sqlRoomRate="UPDATE tbl_hotel_charges SET trip_hotel_id=?,trip_id=?,hotel_id=?,mode_of_payment=?,used_currency=?,kibo_reference=?,hotel_reference=?,single_price=?,single_total=?,db_price=?,db_total=?,twin_price=?,twin_total=?,trp_price=?,trp_total=?,kid_price=?,kid_total=?,extra_charges=?,extra_cost_details=?,comments=?,is_deleted=?,payment_due_date=?,last_modified_on=?,last_modified_by=?
					  WHERE hotel_charges_id=?";
			
			}
			
			$stmt = $conn->prepare($sqlRoomRate);
			if($stmt === false) {
				
			  trigger_error('Wrong SQL: ' . $sqlRoomRate . ' Error: ' . $conn->error, E_USER_ERROR);
			  
			}
			 
			 
			 $mode_of_payment='';
			 $kibo_reference='';
			 $is_deleted=0;
			 $last_modified_by=$_SESSION['f_name'];
			 $comments='';
			
			/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
			if($hotel_charges_id==0){
				$stmt->bind_param('iiissssdddddddddddssisss',$trip_hotel_id,$tripid,$hotel,$mode_of_payment,$currency,$kibo_reference,$hotel_reference,$singlesrate,$singlestotalcost,$dbrate,$dbtotalcost,$twinsrate,$twinstotalcost,$triplesrate,$triplestotalcost,$children_bedsrates,$chidrentotalcost,$extracost,$extracostcomments,$comments,$is_deleted,$payment_due,$currentdatetime,$last_modified_by);
			}
			else
			{
				$stmt->bind_param('iiissssdddddddddddssisssi',$trip_hotel_id,$tripid,$hotel,$mode_of_payment,$currency,$kibo_reference,$hotel_reference,$singlesrate,$singlestotalcost,$dbrate,$dbtotalcost,$twinsrate,$twinstotalcost,$triplesrate,$triplestotalcost,$children_bedsrates,$chidrentotalcost,$extracost,$extracostcomments,$comments,$is_deleted,$payment_due,$currentdatetime,$last_modified_by,$hotel_charges_id);
			}
			
			
			/* Execute statement */
			if($stmt->execute()==FALSE)
			{
				throw new Exception('Wrong SQL: ' . $sqlRoomRate . ' Error: ' . $conn->error);
			}
			
			
			if($hotel_charges_id==0){
				$hotel_charges_id = $stmt->insert_id;
			}
			//echo $stmt->affected_rows;
			$stmt->close();
		
		
		}
	
  
  		
		$event_id = $_REQUEST['event_id'];
		
		$pud=$indate; //use the same date as the itenary date to avoid inconsistent //$_REQUEST['pud'];

		$put=$_REQUEST['put'];
		
		$dropoff=$_REQUEST['dropoff'];
		
		$pup=$_REQUEST['pup'];
		
		$route=$pup.' - '.$dropoff;
		
		
		
		// enter data to operations ie events
		if(isset($_REQUEST['operation'])){
		
			if($event_id==0){
				$sqlEvents="INSERT INTO events(`event_type`,`title`, `description`, `category_id`, `venue`, `s_date`, `e_date`, `s_time`,`user_id`,`itinerary_id`,`remarks`) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
			}
			else
			{
				$sqlEvents="UPDATE events SET `event_type`=?,`title`=?, `description`=?, `category_id`=?, `venue`=?, `s_date`=?, `e_date`=?, `s_time`=?,`user_id`=?,`itinerary_id`=?,`remarks`=? WHERE event_id=?";				
			}
			
			$stmt = $conn->prepare($sqlEvents);
			if($stmt === false) {
				
			  trigger_error('Wrong SQL: ' . $sqlEvents . ' Error: ' . $conn->error, E_USER_ERROR);
			  
			}
			
			
			$event_type=1;
			$user_id=1;
			$category_id=3;
			
			/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
			if($event_id==0){
				
				$stmt->bind_param('ississssiis',$event_type,$group_name,$itnedetails,$category_id,$route,$indate,$indate,$put,$user_id,$itenaryid,$spreqs);
			}
			else
			{
				$stmt->bind_param('ississssiisi',$event_type,$group_name,$itnedetails,$category_id,$route,$indate,$indate,$put,$user_id,$itenaryid,$spreqs,$event_id);				
			}
			 
			/* Execute statement */
			if($stmt->execute()==FALSE)
			{
				throw new Exception('Wrong SQL: ' . $sqlEvents . ' Error: ' . $conn->error);
			}
			
			$event_id = $stmt->insert_id;
			
			//echo $stmt->affected_rows;
			$stmt->close();
			
			
		
		}
		

	
  $conn->commit();
  //echo 'Transaction completed successfully!';


} catch (Exception $e) {
 
  echo 'Transaction failed: ' . $e->getMessage();
  $conn->rollback();
  exit;	
}

/* switch back autocommit status */
$conn->autocommit(TRUE);

//redirect if everything is OK
header("location:view_trip.php?inc=$tripid");

?>