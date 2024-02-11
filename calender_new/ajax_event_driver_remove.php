<?php
session_start();

include("../auth.php");

//include connection to the database
include_once("../lib/config.php"); 

//update the event here
if(!isset($_POST['event_driver_id']))
{
	echo "origin not valid";
	exit;
}

//get event id
$event_driver_id =  mysqli_real_escape_string($conn,$_POST['event_driver_id']);
$eventid = 0;
$eventdate = date('Y-m-d',time());

//get the eventid first
$strSQLEventId = "SELECT eventid,taskdate FROM events_drivers WHERE events_drivers_id=".$event_driver_id;
$resultEventId = mysqli_query($conn,$strSQLEventId);

if(mysqli_num_rows($resultEventId)>0)
{
	$row_event = mysqli_fetch_object($resultEventId);
	$eventid = $row_event->eventid;
	$eventdate = $row_event->taskdate;
	
}
mysqli_free_result($resultEventId);


//update the database
$strSQL="DELETE FROM events_drivers WHERE events_drivers_id=".$event_driver_id;


mysqli_query($conn,$strSQL) or die(mysqli_error($conn)());



//return json with details for this event
//$strSQLDriver="SELECT events_drivers_id,eventid,drivername,driverbgcolor,driverid FROM events_drivers WHERE eventid=".$eventid." AND taskdate='".$eventdate."' ORDER BY drivername";
$strSQLDriver="SELECT ed.events_drivers_id,ed.drivername,ed.driverbgcolor,ed.driverid,c.label1 AS vehicle, c.label2 AS phonenumber FROM categories AS c INNER JOIN events_drivers AS ed ON c.category_id=ed.driverid WHERE eventid=".$eventid." AND taskdate='".$eventdate."' ORDER BY drivername";

$rSet = mysqli_query($conn,$strSQLDriver);


$noOfDrivers = mysqli_num_rows($rSet);
		
			echo "<ul>";
			
			switch($noOfDrivers)
			{
				
				case 0:
				
					echo "<li style=\"background-color:#FFFFFF;\">&nbsp;</li>";
					break;
				
				default:
				
					//$intPercentage =round(99/$noOfDrivers,1,PHP_ROUND_HALF_DOWN);
					$intPercentage =floor(99/$noOfDrivers);
					
					while($rowDriver = mysqli_fetch_object($rSet))
					{
						
						$strDriverLabel=$rowDriver->drivername;
						
						if($rowDriver->vehicle!="")
						{
							$strDriverLabel.=", ".$rowDriver->vehicle;
						}
						
						if($rowDriver->phonenumber!=""){
							$strDriverLabel.=", ".$rowDriver->phonenumber;
						}
						
						echo "<li class=\"drivercolorbox\" title=\"".$strDriverLabel."\" driver_li_id=\"".$rowDriver->driverid."\" event_id=\"".$eventid."\" id=\"".$rowDriver->events_drivers_id."\" event_driver_id=\"".$rowDriver->events_drivers_id."\" drivercolour=\"".$rowDriver->driverbgcolor."\" style=\"width:".$intPercentage."%; background-color:".$rowDriver->driverbgcolor.";\">&nbsp;</li>";
						
					}
					
					break;
			
			}

	echo "</ul>";

?>