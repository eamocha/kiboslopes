<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding imprest</title>
</head>

<?php 
//include connection to the database
include_once("lib/config.php"); 

//call functions
include_once("lib/functions.php");
$tripID=$_REQUEST['inc'];
$account=$_REQUEST['imp'];
//get the values and clean them
echo $dates=clean($_REQUEST['dates']);
$receiver=clean($_REQUEST['receiver']);$currency=clean($_REQUEST['currency']);     $ref=clean($_REQUEST['ref']);

$mode=clean($_REQUEST["mode"]);
$particulars=clean($_REQUEST["particulars"]);
$amount=clean($_REQUEST["amount"]);

  
$sql="update  tbl_accounts SET `particulars`='$particulars', `amount`='$amount',`mode_of_payment`='$mode',`date`='$dates',`reciever`='$receiver',`curency`='$currency',`ref`='$ref' where account_id=$account";
$data=mysqli_query($conn,$sql);

if($data){
	header("location:view_imprest.php?inc=$tripID");
	}
	else
	{
		echo "failed".mysqli_error($conn)();
	}
?>


</html>