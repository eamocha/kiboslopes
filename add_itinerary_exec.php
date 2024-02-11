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


//itinerary type
$itenerary_type_id=$_REQUEST["itenerary_type_id"];



$day=$_REQUEST["day"];

$vehicle=$_REQUEST['vehicle'];

$driver=$_REQUEST['driver'];

$doubles=$_REQUEST['db'];

$singles=$_REQUEST['singles'];

$twins=$_REQUEST['twins'];

$triples=$_REQUEST['triples'];

$child_beds=$_REQUEST['children_beds'];

$family_rooms = $_REQUEST['family_rooms'];

$hotel=$_REQUEST['hotel'];

$voucher_comment=$_REQUEST['hotel_comment'];

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

$family_roomrates  = trim($_REQUEST['family_roomrates']);

if(!is_numeric($family_roomrates))
{
	$family_roomrates = 0;

}

$currency = $_REQUEST['currency'];

//calculate the hotel rates
$singlestotalcost = $singles * $singlesrate;
$dbtotalcost = $doubles * $dbrate;
$twinstotalcost = $twins * $twinsrate;
$triplestotalcost = $triples * $triplesrate;
$chidrentotalcost = $child_beds * $children_bedsrates;
$familytotalcost = $family_rooms * $family_roomrates;


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

  $sql="INSERT INTO tbl_itinerary (itenerary_type_id,`date`,`title`,`details`,`trip_id`,`hotel_id`,`deleted`,`remarks`,singles,`doubles`,`twins`,`triples`,`child_beds`,`family_rooms`) 
  		 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
  /* Prepare statement */
		$stmt = $conn->prepare($sql);
		if($stmt === false) {
			
		  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
		  
		}
		 
		/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
		$stmt->bind_param('isssiiisiiiiii',$itenerary_type_id,$indate,$day,$itnedetails,$tripid,$hotel,$deleted,$spreqs,$singles,$doubles,$twins,$triples,$child_beds,$family_rooms);
		 
		/* Execute statement */
		if($stmt->execute()==FALSE)
		{
			throw new Exception('Wrong SQL: ' . $sql . ' Error: ' . $conn->error);
		}
		
		$itenaryid = $stmt->insert_id;
		
		//echo $stmt->affected_rows;
		$stmt->close();

  		
		
		//
		
		if(isset($_REQUEST['include_hotel']))
		{
		
			$hoteln = $_REQUEST['hoteln'];
			
			$hotel = $_REQUEST['hotel'].''.$hoteln;
			
			$booking = $_REQUEST['booking'];
			
			$status = $_REQUEST['status'];
			
			$deleted = 0;
			
			
			
			$sqlHotel="INSERT INTO tbl_trip_hotels (trip_id,hotel_id,voucher_remarks,booking_date,status,booking,`deleted`,itineray_id,report_type,payment_due_date)  
				VALUES(?,?,?,?,?,?,?,?,?,?)"; 
			
			$stmt = $conn->prepare($sqlHotel);
			if($stmt === false) {
				
			  trigger_error('Wrong SQL: ' . $sqlHotel . ' Error: ' . $conn->error, E_USER_ERROR);
			  
			}
			 
			
			$report_type = 1;
		    
			
			/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
			$stmt->bind_param('iissssiiis',$tripid,$hotel,$voucher_comment,$indate,$status,$booking,$deleted,$itenaryid,$report_type,$payment_due);
			 
			/* Execute statement */
			if($stmt->execute()==FALSE)
			{
				throw new Exception('Wrong SQL: ' . $sqlHotel . ' Error: ' . $conn->error);
			}
			
			$trip_hotel_id = $stmt->insert_id;
			
			//echo $stmt->affected_rows;
			$stmt->close();

			
			//add room rates when hotel details is selected
			//insert to hotel_payment, if no values provided, just put zeroes
			//tbl_hotel_payments, can only have one row with trip_hotel_id, if alredy exists, only update
			
			$sqlRoomRate="INSERT INTO tbl_hotel_charges(trip_hotel_id,trip_id,hotel_id,mode_of_payment,used_currency,kibo_reference,hotel_reference,single_price,single_total,db_price,db_total,twin_price,twin_total,trp_price,trp_total,kid_price,kid_total,family_room_price,family_room_total,extra_charges,extra_cost_details,comments,is_deleted,payment_due_date,last_modified_on,last_modified_by)
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			
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
			$stmt->bind_param('iiissssdddddddddddddssisss',$trip_hotel_id,$tripid,$hotel,$mode_of_payment,$currency,$kibo_reference,$hotel_reference,$singlesrate,$singlestotalcost,$dbrate,$dbtotalcost,$twinsrate,$twinstotalcost,$triplesrate,$triplestotalcost,$children_bedsrates,$chidrentotalcost,$family_roomrates,$familytotalcost,$extracost,$extracostcomments,$comments,$is_deleted,$payment_due,$currentdatetime,$last_modified_by);
			 
			/* Execute statement */
			if($stmt->execute()==FALSE)
			{
				throw new Exception('Wrong SQL: ' . $sqlRoomRate . ' Error: ' . $conn->error);
			}
			
			$hotel_charges_id = $stmt->insert_id;
			
			//echo $stmt->affected_rows;
			$stmt->close();
			
		}
		
		if(isset($_POST['chkItineraryCountryId']))
		{
			
			foreach($_POST['chkItineraryCountryId'] as $itinerary_country_id){
				
				//insert to the database
				$sqlItineraryCountries="INSERT INTO tbl_itinerary_country(countryid,itinerary_id) VALUES (?,?)";
				
				$stmt = $conn->prepare($sqlItineraryCountries);
				
				if($stmt === false) {
					
				  trigger_error('Wrong SQL: ' . $sqlEvents . ' Error: ' . $conn->error, E_USER_ERROR);
				  
				}
				
				$stmt->bind_param('ii',$itinerary_country_id,$itenaryid);
			 
				/* Execute statement */
				if($stmt->execute()==FALSE)
				{
					throw new Exception('Wrong SQL: ' . $sqlEvents . ' Error: ' . $conn->error);
				}
				
				$stmt->close();
			
			}
			
		}
		
  		//select visitor's list
		//update visitor's list for the hotel
		if(isset($_POST['chkVisitorId']))
		{
			
			foreach($_POST['chkVisitorId'] as $visitor_share_id){
				
				//get the room type
				$visitor_room_type = $_POST['visitorroomtype_'.$visitor_share_id];
				
				//split visitor share id
				$visitor_share_id_split = split("_",$visitor_share_id);
				
				$visitor_type = $visitor_share_id_split[0];
				$visitor_ref_id = $visitor_share_id_split[1];
				
				//insert to the database
				$sqlHotelVisitorRoom="INSERT INTO tbl_visitor_itenerary(itenerary_id,visitor_share_id,visitor_type,visitor_ref_id,room_type) VALUES (?,?,?,?,?)";
				
				$stmt = $conn->prepare($sqlHotelVisitorRoom);
				
				if($stmt === false) {
					
				  trigger_error('Wrong SQL: ' . $sqlEvents . ' Error: ' . $conn->error, E_USER_ERROR);
				  
				}
				
				$stmt->bind_param('issis',$itenaryid,$visitor_share_id,$visitor_type,$visitor_ref_id,$visitor_room_type);
			 
				/* Execute statement */
				if($stmt->execute()==FALSE)
				{
					throw new Exception('Wrong SQL: ' . $sqlEvents . ' Error: ' . $conn->error);
				}
				
				$stmt->close();
				
			}

		}
		
  		
		
		$pud=$indate; //use the same date as the itenerary date to avoid double entries $_REQUEST['pud'];

		$put=$_REQUEST['put'];
		
		$dropoff=$_REQUEST['dropoff'];
		
		$pup=$_REQUEST['pup'];
		
		$route=$pup.' - '.$dropoff;
		
		
		
		// enter data to operations ie events
		if(isset($_REQUEST['operation'])){
		
			$sqlEvents="INSERT INTO events(`event_type`,`title`, `description`, `category_id`, `venue`, `s_date`, `e_date`, `s_time`,`user_id`,`itinerary_id`,`remarks`) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
			
			
			$stmt = $conn->prepare($sqlEvents);
			if($stmt === false) {
				
			  trigger_error('Wrong SQL: ' . $sqlEvents . ' Error: ' . $conn->error, E_USER_ERROR);
			  
			}
			
			
			$event_type=1;
			$user_id=1;
			$category_id=3;
			
			/* Bind parameters. TYpes: s = string, i = integer, d = double,  b = blob */
			$stmt->bind_param('ississssiis',$event_type,$group_name,$itnedetails,$category_id,$route,$indate,$indate,$put,$user_id,$itenaryid,$spreqs);
			 
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
header("location:forms/add_itinerary.php?inc=$tripid");

?>