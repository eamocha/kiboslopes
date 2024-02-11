<?php
include_once("lib/config.php");
    
	// connect your database here first 
    // 

    // Actual code starts here 

    $sql = "SELECT table_name FROM INFORMATION_SCHEMA.TABLES WHERE engine <> 'InnoDB'";
    $rs = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($rs))
    {
        $tbl = $row[0];
        $sql = "ALTER TABLE $tbl ENGINE=INNODB";
        mysqli_query($conn,$sql);
    }
?>