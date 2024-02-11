<?php
session_start();

include("../auth.php");

//include connection to the database
include_once("../lib/config.php"); 

//update the event here
if(!isset($_POST['eventid']) or !isset($_POST['driverid']))
{
	echo "origin not valid";
	exit;
}

//get event id
$eventid =  mysqli_real_escape_string($conn,$_POST['eventid']);

//get date
$eventdate = mysqli_real_escape_string($conn,$_POST['eventdate']);

//get driver id
$driverid = mysqli_real_escape_string($conn,$_POST['driverid']);

//get driver name
$drivername = mysqli_real_escape_string($conn,$_POST['drivername']);

//driver colour
$drivercolour = mysqli_real_escape_string($conn,$_POST['drivercolour']);

//get the logged in person
$loggedinuser = mysqli_real_escape_string($conn,$_POST['loggedinuser']);

//update the database
$strSQL="INSERT INTO events_drivers(eventid,taskdate,driverid,driverbgcolor,drivername,editor) 
			VALUES (".$eventid.",'".$eventdate."',".$driverid.",'".$drivercolour."','".$drivername."','".$loggedinuser."')";

mysqli_query($conn,$strSQL) or die(mysqli_error($conn)());



//return json with details for this event
$strSQLDriver="SELECT events_drivers_id,eventid,drivername,driverbgcolor FROM events_drivers WHERE eventid=".$eventid." AND taskdate='".$eventdate."' ORDER BY drivername";
$rSet = mysqli_query($conn,$strSQLDriver);


$noOfDrivers = mysqli_num_rows($rSet);
		
			echo "<ul>";
			
			switch($noOfDrivers)
			{
				
				case 0:
				
					echo "<li style=\"background-color:#FFFFFF;\">&nbsp;</li>";
					break;
				
				default:
				
					$intPercentage =round(99/$noOfDrivers,1,PHP_ROUND_HALF_DOWN);
					
					while($rowDriver = mysqli_fetch_object($rSet))
					{
						
						echo "<li class=\"drivercolorbox\" title=\"".$rowDriver->drivername."\" event_driver_id=\"".$rowDriver->events_drivers_id."\" drivercolour=\"".$rowDriver->driverbgcolor."\" style=\"width:".$intPercentage."%; background-color:".$rowDriver->driverbgcolor.";\">&nbsp;</li>";
						
					}
					
					break;
			
			}

	echo "</ul>";

?>