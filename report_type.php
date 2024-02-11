 <?php
 session_start();
 
 $tripID =$_REQUEST['inc'];
 //include connection to the database
include_once("lib/config.php"); 

//call functions
include_once("lib/functions.php");

	if (isset($_REQUEST['submit'])){

echo $trip_hotel=$_REQUEST['hot'];
$report=$_REQUEST['report_type'];
$up="UPDATE `tbl_trip_hotels` SET `report_type`='$report' WHERE `hotel_id`='$trip_hotel'";
$settings=mysqli_query($conn,$up);

header("location:view_hotel.php?hot=$trip_hotel&inc=$tripID");


	}
	else {
		}
?>