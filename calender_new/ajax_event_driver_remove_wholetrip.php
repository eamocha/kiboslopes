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
$eventid = 0;
$trip_id = 0;
$driver_id = 0;
$eventdate = date('Y-m-d',time());

$event_id_array = array();

//get the eventid first
$strSQLEventId = "SELECT eventid,taskdate,driverid FROM events_drivers WHERE events_drivers_id=".$event_driver_id;
$resultEventId = mysqli_query($conn,$strSQLEventId);

if(mysqli_num_rows($resultEventId)>0)
{
	$row_event = mysqli_fetch_object($resultEventId);
	$eventid = $row_event->eventid;
	$eventdate = $row_event->taskdate;
	$driver_id = $row_event->driverid;
	
}
mysqli_free_result($resultEventId);


//get the trip id in order to get events and remove driver
//get the trip id first
$strSQLTripId="SELECT i.trip_id FROM tbl_itinerary AS i INNER JOIN `events` AS e ON i.itinerary_id=e.itinerary_id WHERE e.event_id=".$eventid;
$resultTripId = mysqli_query($conn,$strSQLTripId);

if(mysqli_num_rows($resultTripId)>0)
{
	$rowTrip = mysqli_fetch_object($resultTripId);
	$trip_id = $rowTrip->trip_id;
}

mysqli_free_result($resultTripId);



if($trip_id!=0){

	//get the whole dates range for the trip based on iteneray of event
	$strSQLAllEvents = "SELECT e.event_id,e.s_date,e.itinerary_id FROM `events` AS e WHERE itinerary_id IN (SELECT itinerary_id FROM tbl_itinerary WHERE trip_id=$trip_id AND deleted=0) ORDER BY e.s_date";
	
	$resultTripEvents = mysqli_query($conn,$strSQLAllEvents);
	
	//delete driver and event details
	while($rowTripEvents = mysqli_fetch_object($resultTripEvents)){
		
		//insertDriverToNewCalender($rowTripEvents->event_id,$rowTripEvents->s_date,$driverid);
		
		//get the event ids array
		$event_id_array[] = $rowTripEvents->event_id;
		
		//update the database
		$strSQL="DELETE FROM events_drivers WHERE eventid=".$rowTripEvents->event_id." AND driverid=".$driver_id;
		mysqli_query($conn,$strSQL) or die(mysqli_error($conn)());
	}
	
	mysqli_free_result($resultTripEvents);
}

getCalendarEventsJson($event_id_array);

exit;
?>