<?php 

//include connection to the database

include_once("lib/config.php"); 



//call functions

include_once("lib/functions.php");

$visitorid = $_GET['visitid'];

$tripID = $_REQUEST['inc']; 

//get the values and clean them



	$visitor_name  = clean($_REQUEST['fname']);

	$address  = clean($_REQUEST['haddress']);

	$nationality  = clean($_REQUEST['nationality']);

	$passport  = clean($_REQUEST['pptdetails']);

	$room_type  =clean($_REQUEST['room']);

	$droom  = clean($_REQUEST['doubleroom']);

	$troom  = clean($_REQUEST['troom']);



	$passport_details=$passport;

	$insurance=clean($_REQUEST['insurance']);

	$age=clean($_REQUEST['age']);



		 

	

$sql="UPDATE tbl_sharing SET  v_name='$visitor_name',pp_details='$passport_details',home_address='$address', nation='$nationality',age='$age', insurance_details='$insurance' WHERE sharing_id='$visitorid' ";

$data=mysqli_query($conn,$sql);



if($data){

	header("location:view_trip.php?inc=$tripID");

	}

	

	else

	{

		echo "failed: ".mysqli_error($conn)();

	}

	//}

	//}// single

	

?>