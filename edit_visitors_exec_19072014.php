

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



		 

	

$sql="UPDATE tbl_visitors SET  visitor_name='$visitor_name',passport_details='$passport_details',address='$address', nationality='$nationality',room_type='$room_type',sharing_triple='$troom',age='$age', insurance='$insurance' WHERE visitor_id='$visitorid' ";

$data=mysqli_query($conn,$sql) or die(mysqli_error($conn)());



if($data){

	header("location:view_trip.php?inc=$tripID");

	}

	/*//end triple

	else if(isset($droom)&!isset($troom)){

	$troom="";

	$sroom=$droom;   

$sql="INSERT INTO tbl_visitors VALUES(' ','$visitor_name','$passport_details','$tripID','$address', '$nationality','$room_type','0','$sroom','$age', '$insurance','$randno') ";

$data=mysqli_query($conn,$sql);



if($data){

	header("location:view_trip.php?inc=$tripID");

	}

	else

	{

		echo "failed: ".mysqli_error($conn)();

	}

	}//end double

	else{

	if(!isset($droom)&!isset($troom)){

	$sroom="";   

$sql="INSERT INTO tbl_visitors VALUES(' ','$visitor_name','$passport_details','$tripID','$address', '$nationality','$room_type','0','$sroom','$age', '$insurance','$randno') ";

$data=mysqli_query($conn,$sql);



if($data){

	header("location:view_trip.php?inc=$tripID");

	}*/

	else

	{

		echo "failed: ".mysqli_error($conn)();

	}

	//}

	//}// single

	

?>

