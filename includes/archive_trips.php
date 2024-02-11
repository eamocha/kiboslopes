<?php

session_start();

//if($_SESSION['role_id']!=1){



include_once("../lib/config.php");

$tripId=$_REQUEST['inc'];

$update = mysqli_query($conn,"UPDATE tbl_trips SET archived=1 WHERE trip_id=$tripId ")or die(mysqli_error($conn)());

if($update){



	header("location:../past_trips.php");

	}

	else

	{

		echo "failed".mysqli_error($conn)();

	}

	/*}

	else

	{

		?>

        <script>

		alert("You dont have permission.");

        </script>

        <?php

        }*/



?>

