<?php
session_start();

include("../auth.php");

//include connection to the database
include_once("../lib/config.php"); 

include_once("../lib/functions.php"); 

//update the event here
if(!isset($_POST['event_driver_id']))
{
	echo "origin not valid";
	exit;
}

//get event id
$event_driver_id =  mysqli_real_escape_string($conn,$_POST['event_driver_id']);

//get the event id
$eventid =  mysqli_real_escape_string($conn,$_POST['eventid']);

if($eventid=="")
{
	$eventid = 0;
}

//get date
$eventdate = mysqli_real_escape_string($conn,$_POST['eventdate']);

//get the logged in person
$loggedinuser = mysqli_real_escape_string($conn,$_POST['loggedinuser']);
$trip_id=0;
$driverid=0;

$event_id_array = array();

//get the trip id first
$strSQLTripId="SELECT i.trip_id FROM tbl_itinerary AS i INNER JOIN `events` AS e ON i.itinerary_id=e.itinerary_id WHERE e.event_id=".$eventid;
$resultTripId = mysqli_query($conn,$strSQLTripId);


//get the driver id
$strSQLDriverId = "SELECT driverid FROM events_drivers WHERE events_drivers_id=".$event_driver_id;
$resultDriver = mysqli_query($conn,$strSQLDriverId);
if(mysqli_num_rows($resultDriver)>0)
{
	
	$rowDriver = mysqli_fetch_object($resultDriver);
	$driverid = $rowDriver->driverid;

}

mysql_free_result($resultDriver);

if(mysqli_num_rows($resultTripId)>0)
{
	$rowTrip = mysqli_fetch_object($resultTripId);
	$trip_id = $rowTrip->trip_id;
}

mysql_free_result($resultTripId);


if($trip_id!=0){

	//get the whole dates range for the trip based on iteneray of event
	$strSQLAllEvents = "SELECT e.event_id,e.s_date,e.itinerary_id FROM `events` AS e WHERE itinerary_id IN (SELECT itinerary_id FROM tbl_itinerary WHERE trip_id=$trip_id AND deleted=0) ORDER BY e.s_date";
	
	$resultTripEvents = mysqli_query($conn,$strSQLAllEvents);
	
	//update driver and event details
	while($rowTripEvents = mysqli_fetch_object($resultTripEvents)){
		
		insertDriverToNewCalender($rowTripEvents->event_id,$rowTripEvents->s_date,$driverid);
		
		//get the event ids array
		$event_id_array[] = $rowTripEvents->event_id;
	}
	
	mysql_free_result($resultTripEvents);
}

//return json with details for this event

//built json based on the eventid
//have driver details
//create object and output it has json to have nested json
getCalendarEventsJson($event_id_array);

exit;

?>