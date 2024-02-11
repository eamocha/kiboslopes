<?php
include('lib/config.php');
    $dbQ = "SELECT category_id,name FROM categories order by name";
    $result =mysqli_query($conn,$dbQ) or die(mysqli_error($conn)());

      while($row = mysqli_fetch_assoc($result)) :
        $data[] = $row;
      endwhile;

    echo json_encode($data);
?>