<?php 
  include('lib/config.php"');
  $r=array();
@$mnth=$_REQUEST["mnth"];
@$yr=$_REQUEST["yr"];
$thisyear=date('Y');
$thismonth=date('m');
if(!isset($_REQUEST["mnth"])||$mnth==0||!isset($_REQUEST["yr"])||$yr==0){
	$result = mysqli_query($conn,"SELECT * FROM tbl_trips where YEAR(dep_date)=$thisyear and MONTH(dep_date)=$thismonth and deleted=0 and archived=1");   
	}
else{
  $result = mysqli_query($conn,"SELECT * FROM tbl_trips where MONTH(arrival_date)=$mnth AND YEAR(dep_date)=$yr and deleted=0 and archived=1") or die(mysqli_error($conn)()); 
   }
            //query
 while( $array = mysqli_fetch_row($result)){                        //fetch result    
$r[]=$array;
  }
  echo json_encode($r);

?>
