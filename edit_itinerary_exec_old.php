<?php 



//include connection to the database

include_once("lib/config.php"); 



//call functions

include_once("lib/functions.php");

$tripID=$_GET['inc'];

$itnid=$_REQUEST['itnid'];

$id=$_REQUEST['user'];

//gete todays date

$today=$date = date('Y-m-d H:i:s');

//get the values and clean them



$indate=clean($_REQUEST['idate']);

$day=clean($_REQUEST["day"]);

$itn_details=clean($_REQUEST["itindetails"]);

$remarks=clean($_REQUEST["remarks"]);

$doubles=clean($_REQUEST['db']);

$singles=clean($_REQUEST['singles']);

$twins=clean($_REQUEST['twins']);

$triples=clean($_REQUEST['triples']);

$child_bed=clean($_REQUEST['child_beds']);

$payment_due=clean($_REQUEST['payment_due']);

$hotel_remarks=clean($_REQUEST['hotel_remarks']);



//end of tbl_itinerary

//select data from the database for comparison

$trip_sql = mysqli_query($conn,"SELECT  * FROM  tbl_itinerary WHERE itinerary_id =$itnid and deleted=0")or die(mysqli_error($conn)());

$i_ecords=mysqli_num_rows($trip_sql);

$result = mysqli_fetch_array($trip_sql); //get a row from our result set

$date  = (string)$result['date'];

$title  = (string)$result['title'];

$details  = (string)$result['details'];

$itnid=(string)$result['itinerary_id'];

$single=(string)$result['singles'];

$twin=(string)$result['twins'];

$double=(string)$result['doubles'];

$triple=(string)$result['triples'];

$child_beds=$result['child_beds'];

// hotel datta



$sql = mysqli_query($conn,"SELECT   * FROM   tbl_trip_hotels WHERE itineray_id =$itnid and deleted=0")or die(mysqli_error($conn)());

 $h_records=mysqli_num_rows($sql);

$result = mysqli_fetch_array($sql);

$trip_hotel_id  = $result['hotel_id'];

$terms  = $result['booking'];

$state  = $result['status'];

$booking_date  = $result['booking_date'];



//hotel name

$hotelstored='';//hot name

if($trip_hotel_id>0){

	$sql = mysqli_query($conn,"SELECT   * FROM   tbl_hotels WHERE hotel_id=$trip_hotel_id and deleted=0")or die(mysqli_error($conn)());



	$hot_r = mysqli_fetch_array($sql);

	

$hotelstored  = $hot_r['hotel_name'];

}

//commons

//$itnerarychange1="INSERT INTO `tbl_changes` values('','$id',";

//$itnerarychange2=",'$today','1',";  

if(strcmp($date,$indate)!=0){

	//$n=;

$description="itn $title: $date date changed to: $indate";

$d_sql="INSERT INTO `tbl_changes` values('','$id','$date','$today','1','$description','1','$tripID','')" or die(mysqli_error($conn).'error updating itinerary');

mysqli_query($conn,$d_sql);



	}

	

	

if($title!=$day){

	//$n="'2')";

$description="itn day: ".$title. '  changed to: '.$day;

$d_sql="INSERT INTO `tbl_changes` values('','$id','$title','$today','1','$description','2','$tripID','')" or die(mysqli_error($conn).'error updating itinerary');

	mysqli_query($conn,$d_sql);



	}

	if($details!=$itn_details){

		//$n="'3')";

$description="itn for day $title: ".$details. ' was altered to: '.$itn_details;

$d_sql="INSERT INTO `tbl_changes` values('','$id','$details','$today','1','$description','3','$tripID','')" or die(mysqli_error($conn).'error updating itinerary');

	mysqli_query($conn,$d_sql);



	}

	if($single!=$singles){

		//$n="'3')";

$description="Rooming details for $hotelstored altered: ".$singles. ' single(s)instead of: '.$single;

$d_sql="INSERT INTO `tbl_changes` values('','$id','$single','$today','1','$description','4','$tripID','')" or die(mysqli_error($conn).'error updating itinerary');

	mysqli_query($conn,$d_sql);



	}

		if($child_bed!=$child_beds){

		//$n="'3')";

$description="Rooming details for $hotelstored altered: ".$child_beds. ' child bed(s)instead of: '.$child_bed;

$d_sql="INSERT INTO `tbl_changes` values('','$id','$child_beds','$today','1','$description','8','$tripID','')" or die(mysqli_error($conn).'error updating itinerary');

	mysqli_query($conn,$d_sql);



	}

	if($double!=$doubles){

		//$n="'3')";

$description="Rooming details for $hotelstored altered: ".$doubles. ' double(s) instead of: '.$double;

$d_sql="INSERT INTO `tbl_changes` values('','$id','$double','$today','1','$description','5','$tripID','')" or die(mysqli_error($conn).'error updating itinerary');

	mysqli_query($conn,$d_sql);



	}

	if($twin!=$twins){

		//$n="'3')";

$description="Rooming details for $hotelstored altered: ".$twins. ' twin(s)instead of: '.$twin;

$d_sql="INSERT INTO `tbl_changes` values('','$id','$twin','$today','1','$description','6','$tripID','')" or die(mysqli_error($conn).'error updating itinerary');

	mysqli_query($conn,$d_sql);



	}

	if($triples!=$triple){

		//$n="'3')";

$description="Rooming details for $hotelstored altered: ".$triples. ' triple(s)instead of: '.$triple;

$d_sql="INSERT INTO `tbl_changes` values('','$id','$triple','$today','1','$description','7','$tripID','')" or die(mysqli_error($conn).'error updating itinerary');

	mysqli_query($conn,$d_sql);



	}

$hotel=clean($_REQUEST['hotel']);

$booking=clean($_REQUEST['booking']);

$status=clean($_REQUEST['status']);

//query db

$itsql="UPDATE tbl_itinerary SET title='$day',date='$indate',details='$itn_details',singles='$singles',doubles='$doubles',hotel_id='$hotel',twins='$twins',triples='$triples',remarks='$remarks', child_beds='$child_bed' WHERE itinerary_id=$itnid and deleted=0"; 

$data=mysqli_query($conn,$itsql) or die(mysqli_error($conn)());



	if($terms!=$booking){

	//$n=;

$description="$hotelstored terms: $terms changed to: $booking";

$d_sql="INSERT INTO `tbl_changes` values('','$id','$terms','$today','2','$description','2','$tripID','')"or die(mysqli_error($conn).'error updating hotel terms');

mysqli_query($conn,$d_sql);



	}

		if($status!=$state){

	//$n=;

$description="Booking status for $hotelstored changed: from $state to: $status";

$d_sql="INSERT INTO `tbl_changes` values('','$id','$state','$today','2','$description','3','$tripID','')"or die(mysqli_error($conn).'error updating hotel date');

mysqli_query($conn,$d_sql);



	}

	if($trip_hotel_id!=$hotel){

	//$n=;



	

		$h = mysqli_query($conn,"SELECT   * FROM   tbl_hotels WHERE hotel_id=$hotel and deleted=0")or die(mysqli_error($conn)());

	$hres = mysqli_fetch_array($h);

$newhotel = $hres['hotel_name'];

$description="Hotel $hotelstored was changed to $newhotel";

$d_sql="INSERT INTO `tbl_changes` values('','$id','$state','$today','2','$description','4','$tripID','')"or die(mysqli_error($conn).'error updating hotel date');



mysqli_query($conn,$d_sql);}

	

$sql1="UPDATE tbl_trip_hotels  SET hotel_id='$hotel',payment_due_date='$payment_due',voucher_remarks='$hotel_remarks',booking_date='$indate',status='$status',booking='$booking', deleted=0 WHERE itineray_id='$itnid'"; 

//

$data1=mysqli_query($conn,$sql1);



	

	 if($h_records==0){

		 $description="$newhotel was added to itinerary $title";

$d_sq="INSERT INTO `tbl_changes` values('','$id','$state','$today','2','$description','4','$tripID','')"or die(mysqli_error($conn).'error updating hotel date');

mysqli_query($conn,$d_sq);



$sql1=mysqli_query($conn,"INSERT INTO tbl_trip_hotels  VALUES('','$tripID','$hotel','$hotel_remarks','$indate','$status','$booking','','$itnid','1','$payment_due')") or die(mysqli_error($conn)()); 

	}

	//if{

//}



 // operational details

 $pud=clean($_REQUEST['pud']);

$put=clean($_REQUEST['put']);

$dropoff=clean($_REQUEST['dropoff']);

$pup=clean($_REQUEST['pup']);

  $sql = mysqli_query($conn,"UPDATE tbl_operations SET  pick_up_date='$pud',pick_up_time='$put',pick_up_point='$pup',drop_off_point='$dropoff'	WHERE itinerary_id=$itnid"); 

  if($sql){

	header("location:view_trip.php?inc=$tripID");

	}

	else

	{

		echo "failed".mysqli_error($conn)();

	}





?>