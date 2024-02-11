<?php
include('lib/config.php');
    $dbQ = "SELECT * FROM tbl_trips where date(arrival_date) <NOW() - INTERVAL 1 MONTH  order by arrival_date desc";

    $result =mysqli_query($conn,$dbQ) or die(mysqli_error($conn)());
	//echo mysqli_num_rows($result);
      while($row = mysqli_fetch_assoc($result)) :
        $data[] = $row;
      endwhile;

    echo json_encode($data);
?>