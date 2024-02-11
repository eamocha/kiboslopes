<?php
include('lib/config.php');
    $dbQ = "SELECT year(arrival_date) as ay,year(dep_date) as dy FROM tbl_trips  group by ay order by arrival_date";
    $result =mysqli_query($conn,$dbQ) or die(mysqli_error($conn)());

      while($row = mysqli_fetch_assoc($result)) :
        $data[] = $row;
      endwhile;

    echo json_encode($data);
?>