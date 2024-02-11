<?php 

session_start();

include_once("../lib/config.php");



//Get the vissitor id

 $itnid=$_REQUEST['itnid'];

 $id=$_REQUEST['user'];



 $trip=$_REQUEST['trip'];

//

$today=$date = date('Y-m-d H:i:s');

//query the visitors database

$user_role_id = $_SESSION['role_id'];

		//$adm= $_SESSION['role_id'];

		//if($user_role_id !=2)

//{

//header('Location: ../roles/delete_sales.php ');



	

		//}

include('../roles/delete_sales.php');

$sql1 = mysqli_query($conn,"UPDATE  tbl_itinerary SET deleted=1 WHERE itinerary_id = $itnid") or die(mysqli_query($conn,));



$sql = mysqli_query($conn,"UPDATE  tbl_trip_hotels SET deleted=1 WHERE itineray_id = $itnid");




if( mysqli_affected_rows()!=0){

	//$n="'2')";

//delete the event since they are no longer useful
$sqlEventDelete="DELETE FROM events WHERE itinerary_id=$itnid";
mysqli_query($conn,$sqlEventDelete);

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id=$itnid and  trip_id = $trip")or die(mysqli_error($conn)());

$result_hotel = mysqli_fetch_array($sql);

$hotel_id=$result_hotel['hotel_id'];

$description="Deleted a trip hotel and itinerary";

$d_sql="INSERT INTO `tbl_changes` values('','$id','','$today','3','$description','1','$trip','')" or die(mysqli_error($conn).'error deleting hotel');

	mysqli_query($conn,$d_sql);



	}

//$sql = mysqli_query($conn,"UPDATE  tb_opereations SET deleted=1 WHERE itinerary_id = $itnid");



$sql = mysqli_query($conn,"UPDATE  tbl_itinerary SET deleted=1 WHERE itinerary_id = $itnid");

if( mysqli_affected_rows()!=0){

	//$n="'2')";

	

$sql = mysqli_query($conn,"SELECT   * FROM   tbl_itinerary WHERE itinerary_id=$itnid")or die(mysqli_error($conn)());

$result = mysqli_fetch_array($sql);

$date  = $result['date'];

	$title  = $result['title'];

	$details  = $result['details'];

	$itnid=$result['itinerary_id'];

$singles=$result['singles'];

$twins=$result['twins'];

$doubles=$result['doubles'];

$triples=$result['triples'];



//update the operations section

	$operations = mysqli_query($conn,"UPDATE  events SET status='-1' WHERE itinerary_id = $itnid");

$description="Deleted an itinerary: for $details, $itnid";

$d_sql="INSERT INTO `tbl_changes` values('','$id','$itnid','$today','3','$description','2','$trip','')" or die(mysqli_error($conn).'error deleting itn');

	mysqli_query($conn,$d_sql);



	}

if($sql){

	header("location:../view_trip.php?inc=$trip");

	}



else {

	die(mysqli_error($conn)());

	}

?>

