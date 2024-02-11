<?php 
session_start();

include("auth.php");

//include connection to the database

include_once("lib/config.php"); 



//call functions$singles=$result['s'];



include_once("lib/functions.php");

$tripID=$_REQUEST['inc'];

$hotel_id=$_REQUEST['hot'];

if(!empty($_POST['pay_amount']) and isset($_POST['pay_amount'])){

	$amount=clean($_POST['pay_amount']);

	$ref=clean($_REQUEST['ref']);

	$currency=clean($_REQUEST['currency']);  
	
	$mode=clean($_REQUEST["mode"]);

	$comments=clean($_REQUEST["comments"]); 
	
	$dates=clean($_REQUEST['dates']);
	
	$updatedby = clean($_SESSION['f_name']);

	$q="INSERT INTO `tbl_payments`(`trip_id`,`hotel_id`,`reference_no`,`mode_of_payment`,`currency_used`,`amountpaid`,`transactiondate`,`payment_description`,`lastupdatedby`)  
		VALUES($tripID,$hotel_id,'$ref','$mode','$currency',$amount,'$dates','$comments','$updatedby')";
	
	
	//echo $q;
	//exit;
	
	$data = mysqli_query($conn,$q) or die(mysqli_error($conn)());

	if($data){

		header("location:view_hotel_payments.php?inc=$tripID&hot=$hotel_id");

	}

	else

	{

		echo "failed".mysqli_error($conn)();

	}

}


?>





