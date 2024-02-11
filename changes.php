<?php



//initialize

$change_id='';

$user='';

$changed_data='';

$date_changed='';

$tablechanged='';

$description='';

$changed_item_id='';



$changes_sql=mysqli_query($conn,"SELECT * FROM `tbl_changes` WHERE `trip_id`='$tripID' ") or die('Unable to get changes data'.mysqli_error($conn)());

$changes=mysqli_fetch_array($changes_sql);

if(!$changes){

	echo ' changes have been made';

	} else{

while($changes){

$change_id=$changes['change_id'];

$user=$changes['user_id'];

$changed_data=$changes['chage_data'];

$date_changed=$changes['change_date'];

$tablechanged=$changes['tbl_changed_id'];

$description=$changes['description'];

$changed_item_id=$changes['changed_item_id'];

}

}?>