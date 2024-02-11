<?php 

//include connection to the database
include_once("lib/config.php"); 
//call functions
include_once("lib/functions.php");
//$tripID=$_REQUEST['inc'];


//imprestserial

$imprestserial = getNextSequence('imprestserial');
$imprestdate=date('Y-m-d');

//get the values and clean them
$cboTripId = mysqli_real_escape_string($conn,$_REQUEST['cboTripId']);
$cboTripStaffId = mysqli_real_escape_string($conn,$_REQUEST['cboTripStaffId']);
$txtdutydatefrom = mysqli_real_escape_string($conn,$_REQUEST['txtdutydatefrom']);
$txtdutydateto = mysqli_real_escape_string($conn,$_REQUEST['txtdutydateto']);

$usdclientparkfees = trim(mysqli_real_escape_string($conn,$_REQUEST['usdclientparkfees']));

if(!is_numeric($usdclientparkfees))
{
	$usdclientparkfees = 0;
}

$usdhotelfees = trim(mysqli_real_escape_string($conn,$_REQUEST['usdhotelfees']));

if(!is_numeric($usdhotelfees))
{
	$usdhotelfees = 0;
}

$usdexcusionsfees = trim(mysqli_real_escape_string($conn,$_REQUEST['usdexcusionsfees']));

if(!is_numeric($usdexcusionsfees))
{
	$usdexcusionsfees = 0;
}

$usdothers1 = mysqli_real_escape_string($conn,$_REQUEST['usdothers1']);

if(!is_numeric($usdothers1))
{
	$usdothers1 = 0;
}

$usdothers2 = trim(mysqli_real_escape_string($conn,$_REQUEST['usdothers2']));

if(!is_numeric($usdothers2))
{
	$usdothers2=0;
}

$kshclientparkfees = trim(mysqli_real_escape_string($conn,$_REQUEST['kshclientparkfees']));

if(!is_numeric($kshclientparkfees))
{
	$kshclientparkfees = 0;
}

$kshdriverparkfees = trim(mysqli_real_escape_string($conn,$_REQUEST['kshdriverparkfees']));

if(!is_numeric($kshdriverparkfees))
{
	$kshdriverparkfees = 0;
}

$kshcarparkfee = trim(mysqli_real_escape_string($conn,$_REQUEST['kshcarparkfee']));

if(!is_numeric($kshcarparkfee))
{
	$kshcarparkfee = 0;
}

$kshtravelallowance = trim(mysqli_real_escape_string($conn,$_REQUEST['kshtravelallowance']));

if(!is_numeric($kshtravelallowance))
{
	$kshtravelallowance =0;
}

$kshothers1 = trim(mysqli_real_escape_string($conn,$_REQUEST['kshothers1']));

if(!is_numeric($kshothers1))
{
	$kshothers1 = 0;
}

$kshothers2 = trim(mysqli_real_escape_string($conn,$_REQUEST['kshothers2']));

if(!is_numeric($kshothers2))
{
	$kshothers2 = 0;
}

$kshothers3 = trim(mysqli_real_escape_string($conn,$_REQUEST['kshothers3']));

if(!is_numeric($kshothers3))
{
	$kshothers3 = 0;
}

$kshothers4 = trim(mysqli_real_escape_string($conn,$_REQUEST['kshothers4']));

if(!is_numeric($kshothers4))
{
	$kshothers4 = 0;
}

$mineralwater = trim(mysqli_real_escape_string($conn,$_REQUEST['mineralwater']));

$smartcards = trim(mysqli_real_escape_string($conn,$_REQUEST['smartcards']));

$binoculars = trim(mysqli_real_escape_string($conn,$_REQUEST['binoculars']));

$simcards = trim(mysqli_real_escape_string($conn,$_REQUEST['simcards']));

$itemothers1 = trim(mysqli_real_escape_string($conn,$_REQUEST['itemothers1']));

$itermother2 = trim(mysqli_real_escape_string($conn,$_REQUEST['itermother2']));

$itemother3 = trim(mysqli_real_escape_string($conn,$_REQUEST['itemother3']));




$sql="INSERT INTO tbl_imprest_staff(imprestserial,imprestdate,driver_id,trip_id,dutydatefrom,dutydateto,usdclientparkfees,usdhotelfees,usdexcursionfees,usdother1fees,usdother2fees,kshclientparkfees,kshdriverparkfees,kshcarparkfees,kshtravelallowance,kshothers1fees,kshothers2fees,kshothers3fees,kshothers4fees,itemmineralwater,itemsmartcards,itembinoculars,itemsimcards,itemothers1,itemothers2,itemothers3)
		VALUES('$imprestserial','$imprestdate',$cboTripStaffId,$cboTripId,'$txtdutydatefrom','$txtdutydateto',$usdclientparkfees,$usdhotelfees,$usdexcusionsfees,$usdothers1,$usdothers2,$kshclientparkfees,$kshdriverparkfees,$kshcarparkfee,$kshtravelallowance,$kshothers1,$kshothers2,$kshothers3,$kshothers4,'$mineralwater','$smartcards','$binoculars','$simcards','$itemothers1','$itermother2','$itemother3')";

$data=mysqli_query($conn,$sql) or die(mysqli_error($conn)()."<br>".$sql);

//generate the excelsheet


if($data){

	header("location:imprests_staff.php");

	}

	else

	{

		echo "failed".mysqli_error($conn)();

	}

?>