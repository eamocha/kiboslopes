<?php 

//include connection to the database

include_once("lib/config.php"); 



//call functions

include_once("lib/functions.php");

 $randno =substr(md5(time() * rand()),0,10);;

	$tripID = $_REQUEST['inc']; 
	$share_id = $_REQUEST['share_id'];

    //get the values and clean them
	$visitor_name  = clean($_REQUEST['fname']);	
	$address = clean($_REQUEST['haddress']);
	$nationality =clean($_REQUEST['nationality']);
	$insurance=clean($_REQUEST['insurance']);
	$age=clean($_REQUEST['age']);
	$room_type=clean($_REQUEST['room']);
	$passport=clean($_REQUEST['pptdetails']);
	$v2_name  = clean($_REQUEST['v2_name']);
	$v3_name  = clean($_REQUEST['v3_name']);
	$v2_pptdetails  = clean($_REQUEST['v2_pptdetails']);
	$v2_insurance  = clean($_REQUEST['v2_insurance']);
	$v2_haddress  = clean($_REQUEST['v2_haddress']);
	$v2_nationality  = clean($_REQUEST['v2_nationality']);
	$v2_age  = clean($_REQUEST['v2_age']);

	//$v3_age  = clean($_REQUEST['v2_age']);

				

				

if(!empty($visitor_name)){

	

$sql="INSERT INTO tbl_visitors (visitor_name,passport_details,trip_id,address,nationality,room_type,`deleted`,gender,`age`,insurance,log_id,sharing_triple)  VALUES('$visitor_name','$passport','$tripID','$address', '$nationality','$room_type','0','','$age', '$insurance','$randno','') ";  
$data=mysqli_query($conn,$sql) or die(mysqli_error($conn)());

$last_insert_id=mysql_insert_id();


//remove details from shared
if(!empty($share_id)){
	
	$strSQLDel="DELETE FROM tbl_sharing WHERE sharing_id=".$share_id;
	mysqli_query($conn,$strSQLDel);

}
if(!empty($v2_name)){

	

				$insertv2="INSERT INTO `tbl_sharing`(`sharing_id`, `v_name`, `sharing_with`, `pp_details`, `insurance_details`, `home_address`, `nation`, `age`) VALUES ('','$v2_name','$last_insert_id','$v2_pptdetails','$v2_insurance','$v2_haddress','$v2_nationality','$v2_age')";

 $data=mysqli_query($conn,$insertv2);

}



if(!empty($v3_name)){

	

	$v3_pptdetails  = clean($_REQUEST['v3_pptdetails']);

		$v3_insurance  = clean($_REQUEST['v3_insurance']);

			$v3_haddress  = clean($_REQUEST['v3_haddress']);

				$v3_nationality  = clean($_REQUEST['v3_nationality']);

				$v3_age  = clean($_REQUEST['v3_age']);

				

 $insertv3="INSERT INTO `tbl_sharing`(`sharing_id`, `v_name`, `sharing_with`, `pp_details`, `insurance_details`, `home_address`, `nation`, `age`) VALUES ('','$v3_name','$last_insert_id','$v3_pptdetails','$v3_insurance','$v3_haddress','$v3_nationality','$v3_age')";

 $data=mysqli_query($conn,$insertv3);

	}

	

if($data){

	header("location:view_trip.php?inc=$tripID");

	}

	

	else

	{

		echo "failed: ".mysqli_error($conn)();

	}

	

	}

?>

