<?php
set_time_limit(360);
session_start();
include('auth.php');
include('lib/config.php');

/** PHPExcel_IOFactory */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel/IOFactory.php';

$imprest_id = 0;

//imprest form id
if(isset($_GET['imprestid']) and is_numeric($_GET['imprestid'])){
	
	$imprest_id = $_GET['imprestid'];
	
	
}
else
{
	//else redirect back to page
	header("location:imprests_staff.php");
}



//get details for form

$imprest_sql = "SELECT si.*,t.trip_id AS group_number,t.group_name,t.team_leader,t.arrival_date,t.arrival_time,t.dep_date,t.dep_time,t.special_requirements,s.name AS driver_name FROM tbl_imprest_staff si INNER JOIN categories s ON  s.category_id=si.driver_id INNER JOIN tbl_trips t ON t.trip_id=si.trip_id WHERE si.impresetid=".$imprest_id;
$resultImprest = mysqli_query($conn,$imprest_sql) or die(mysqli_error($conn)());

$group_no = 0;
$group_arrival_date="";
$group_arrival_time="";
$group_dep_date="";
$group_dep_time="";
$group_special_requirements="";

$imprestserial="";
$staffname="";
$tripname="";
$imprestdate="";
$dutydatefrom="";
$dutydateto="";
$issuereference="";

//usd allocation
$usdclientparkfees=0;
$usdhotelfees=0;
$usdexcursionfees=0;
$usdother1fees=0;
$usdother2fees=0;

//ksh allocation
$kshclientparkfees=0;
$kshdriverparkfees=0;
$kshcarparkfees=0;
$kshtravelallowance=0;
$kshothers1fees=0;
$kshothers2fees=0;
$kshothers3fees=0;
$kshothers4fees=0;


//other items
$itemmineralwater="";
$itemsmartcards="";
$itembinoculars="";
$itemsimcards="";
$itemothers1="";
$itemothers2="";
$itemothers3="";

//expenses
$usdexpenses="";
$usdbalance="";
$kshexpenses="";
$kshbalance="";




if(mysqli_num_rows($resultImprest)>0)
{
	
	$rowImprest = mysqli_fetch_object($resultImprest);
	
	//group details
	$group_no = $rowImprest->group_number;
	$group_arrival_date = date('d.m.Y',strtotime($rowImprest->arrival_date));
	$group_arrival_time = $rowImprest->arrival_time;
	$group_dep_date = date('d.m.Y',strtotime($rowImprest->dep_date));
	$group_dep_time = $rowImprest->dep_time;
	$group_special_requirements = $rowImprest->special_requirements;
	
	$imprestserial = $rowImprest->imprestserial;
	$staffname = $rowImprest->driver_name;
	$tripname = $rowImprest->group_name;
	$imprestdate = date('d.M.Y',strtotime($rowImprest->imprestdate));
	$dutydatefrom = date('d.M.Y',strtotime($rowImprest->dutydatefrom));
	$dutydateto = date('d.M.Y',strtotime($rowImprest->dutydateto));
	$issuereference="";

	//usd allocation
	$usdclientparkfees = $rowImprest->usdclientparkfees;
	$usdhotelfees = $rowImprest->usdhotelfees;
	$usdexcursionfees = $rowImprest->usdexcursionfees;
	$usdother1fees = $rowImprest->usdother1fees;
	$usdother2fees = $rowImprest->usdother2fees;

	//ksh allocation
	$kshclientparkfees = $rowImprest->kshclientparkfees;
	$kshdriverparkfees = $rowImprest->kshdriverparkfees;
	$kshcarparkfees = $rowImprest->kshcarparkfees;
	$kshtravelallowance = $rowImprest->kshtravelallowance;
	$kshothers1fees = $rowImprest->kshothers1fees;
	$kshothers2fees = $rowImprest->kshothers2fees;
	$kshothers3fees = $rowImprest->kshothers3fees;
	$kshothers4fees = $rowImprest->kshothers4fees;
	
	
	//other items
	$itemmineralwater = $rowImprest->itemmineralwater;
	$itemsmartcards = $rowImprest->itemsmartcards;
	$itembinoculars = $rowImprest->itembinoculars;
	$itemsimcards = $rowImprest->itemsimcards;
	$itemothers1 = $rowImprest->itemothers1;
	$itemothers2 = $rowImprest->itemothers2;
	$itemothers3 = $rowImprest->itemothers3;
	
	//expenses
	$usdexpenses = "";
	$usdbalance = "";
	$kshexpenses = "";
	$kshbalance = "";
}


//get the trip itenerary
$resultItenerary = mysqli_query($conn,"SELECT `date` AS travel_date,`details` as travel_details FROM  tbl_itinerary WHERE trip_id = $group_no AND deleted=0 order by date")or die(mysqli_error($conn)());


$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load("templates/kibo_imprest_form.xls");


$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B3', $staffname)
            ->setCellValue('B5', $tripname)
			->setCellValue('J3', $imprestserial)
            ->setCellValue('J5', $imprestdate)
			->setCellValue('C7', $dutydatefrom)
			->setCellValue('F7', $dutydateto)
			->setCellValue('J7', $issuereference)
			->setCellValue('J5', $imprestdate)
			->setCellValue('B13', $usdclientparkfees)
			->setCellValue('B14', $usdhotelfees)
			->setCellValue('B15', $usdexcursionfees)
			->setCellValue('B16', $usdother1fees)
			->setCellValue('B17', $usdother2fees)
			->setCellValue('B27', $kshclientparkfees)
			->setCellValue('B28', $kshdriverparkfees)
			->setCellValue('B29', $kshcarparkfees)
			->setCellValue('B30', $kshtravelallowance)
			->setCellValue('B31', $kshothers1fees)
			->setCellValue('B32', $kshothers2fees)
			->setCellValue('B33', $kshothers3fees)
			->setCellValue('B34', $kshothers4fees)
			->setCellValue('B44', $itemmineralwater)
			->setCellValue('B45', $itemsmartcards)
			->setCellValue('B46', $itembinoculars)
			->setCellValue('B47', $itemsimcards)
			->setCellValue('B48', $itemothers1)
			->setCellValue('B49', $itemothers2)
			->setCellValue('B50', $itemothers3)
			->setCellValue('B65', $group_no)
			->setCellValue('B66', $tripname)
			->setCellValue('B67', $group_arrival_date)
			->setCellValue('B68', $group_dep_date)
			->setCellValue('C67', 'Time: '.$group_arrival_time)
			->setCellValue('C68', 'Time: '.$group_dep_time)
			->setCellValue('B70', $group_special_requirements);
			
//do itenerary list
$baseRow = 74;
$row=0;


$num_iteneraries = mysqli_num_rows($resultItenerary);

$visitorBaseRow = $baseRow + $num_iteneraries + 3;
 
if($num_iteneraries>0)
{

	while($rowItenerary = mysqli_fetch_object($resultItenerary))
	{
		$row = $baseRow + 1;
		
		$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);
		
		$objPHPExcel->getActiveSheet()->mergeCells('C'.$row.':K'.$row);
		$objPHPExcel->getActiveSheet()->getStyle('C'.$row.':K'.$row)
					->getAlignment()
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row, date('d.m.Y',strtotime($rowItenerary->travel_date)))
									  ->setCellValue('C'.$row, $rowItenerary->travel_details);
	}	
	$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);
	
	//delete the last extra row as well
	$objPHPExcel->getActiveSheet()->removeRow($num_iteneraries + $baseRow ,1);
		
}

//get visitors

//visitors starting row

$resultVisitors = mysqli_query($conn,"SELECT * FROM  tbl_visitors WHERE trip_id = $group_no AND deleted=0 ")or die(mysqli_error($conn)());

$num_of_visitors = mysqli_num_rows($resultVisitors);

if($num_of_visitors>0)
{

		while($rowVisitor = mysqli_fetch_object($resultVisitors))
		{
			
			$rowV = $visitorBaseRow + 1;
				
			$objPHPExcel->getActiveSheet()->insertNewRowBefore($rowV,1);
			
			$objPHPExcel->getActiveSheet()->mergeCells('B'.$rowV.':D'.$rowV);
			$objPHPExcel->getActiveSheet()->getStyle('B'.$rowV.':D'.$rowV)
										  ->getAlignment()
										  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
										  
			$objPHPExcel->getActiveSheet()->mergeCells('E'.$rowV.':F'.$rowV);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$rowV.':F'.$rowV)
										  ->getAlignment()
										  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
										  
			$objPHPExcel->getActiveSheet()->mergeCells('G'.$rowV.':H'.$rowV);
			$objPHPExcel->getActiveSheet()->getStyle('G'.$rowV.':H'.$rowV)
										  ->getAlignment()
										  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
										  
			$objPHPExcel->getActiveSheet()->mergeCells('I'.$rowV.':J'.$rowV);
			$objPHPExcel->getActiveSheet()->getStyle('I'.$rowV.':J'.$rowV)
										  ->getAlignment()
										  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			
			
			
			
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowV,$rowVisitor->visitor_id)
										  ->setCellValue('B'.$rowV,$rowVisitor->visitor_name)
										  ->setCellValue('E'.$rowV,$rowVisitor->passport_details)
										  ->setCellValue('G'.$rowV,$rowVisitor->address)
										  ->setCellValue('I'.$rowV,$rowVisitor->nationality)
										  ->setCellValue('K'.$rowV,$rowVisitor->room_type);
			
			//remember also those sharing
			
			 if($rowVisitor->room_type!=''|| $rowVisitor->room_type!='Single'){
		
				
		
					  $share="SELECT `sharing_id`, `v_name`, `sharing_with`, `pp_details`, `insurance_details`, `home_address`, `nation`, `age` FROM `tbl_sharing` WHERE `sharing_with`=$rowVisitor->visitor_id and deleted=0" or die();
		
					  $quer=mysqli_query($conn,$share);
		
						 while($rowSharingVisitor=mysqli_fetch_object($quer))
						 {
								  
								  $rowV = $visitorBaseRow + 1;
				
								  $objPHPExcel->getActiveSheet()->insertNewRowBefore($rowV,1);
								  
								  
									$objPHPExcel->getActiveSheet()->mergeCells('B'.$rowV.':D'.$rowV);
									$objPHPExcel->getActiveSheet()->getStyle('B'.$rowV.':D'.$rowV)
																  ->getAlignment()
																  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
																  
									$objPHPExcel->getActiveSheet()->mergeCells('E'.$rowV.':F'.$rowV);
									$objPHPExcel->getActiveSheet()->getStyle('E'.$rowV.':F'.$rowV)
																  ->getAlignment()
																  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
																  
									$objPHPExcel->getActiveSheet()->mergeCells('G'.$rowV.':H'.$rowV);
									$objPHPExcel->getActiveSheet()->getStyle('G'.$rowV.':H'.$rowV)
																  ->getAlignment()
																  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
																  
									$objPHPExcel->getActiveSheet()->mergeCells('I'.$rowV.':J'.$rowV);
									$objPHPExcel->getActiveSheet()->getStyle('I'.$rowV.':J'.$rowV)
																  ->getAlignment()
																  ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
								  
								  
									
								  $objPHPExcel->getActiveSheet()->setCellValue('A'.$rowV,$rowVisitor->visitor_id)
																->setCellValue('B'.$rowV,$rowSharingVisitor->v_name)
																->setCellValue('E'.$rowV,$rowSharingVisitor->pp_details)
																->setCellValue('G'.$rowV,$rowSharingVisitor->home_address)
																->setCellValue('I'.$rowV,$rowSharingVisitor->nation)
																->setCellValue('K'.$rowV,$rowVisitor->room_type);
						 }
						 
			 }
				
		}

	//delete the extra row at the top
	
	//$objPHPExcel->getActiveSheet()->removeRow($visitorBaseRow-1,1);

}



//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle($staffname." Imprest");


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


//get name for the excel sheet
$strDownloadFileName=$staffname."_".date('d.M.Y',time());

$strDownloadFileName = preg_replace('/[^a-z0-9_]/i', '-', $strDownloadFileName); 
$strDownloadFileName = preg_replace('/-[-]*/i', '-', $strDownloadFileName); 
$strDownloadFileName = preg_replace('/-$/i', '', $strDownloadFileName); 
$strDownloadFileName = preg_replace('/^-/i', '', $strDownloadFileName); 

$strDownloadFileName.=".xls";

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$strDownloadFileName.'"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;


?>