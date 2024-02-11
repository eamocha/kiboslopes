<?php session_start();

	include('lib/config.php'); 

	$car_id=$_REQUEST['inc'];

//call functions

include('lib/functions.php');





$sel ="SELECT * FROM `tbl_vehicle` WHERE `vehicle_id`=$car_id AND `deleted`=0"or die(mysqli_error($conn)());

$vehicle=mysqli_query($conn,$sel);

$row=mysqli_fetch_array($vehicle);

		$vehicle_code=$row['reg_code'];	

		$capacity=$row['veh_capacity'];		

		$driverID=$row['driver_id'];		

		$desc=$row['description'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<style type="text/css">

		body{font:12px/1.2 Verdana, Arial, san-serrif; padding:0 10px;}

		a:link, a:visited{text-decoration:none; color:#416CE5; border-bottom:1px solid #416CE5;}

		h2{font-size:13px; margin:15px 0 0 0;}

	.washana {

	color: #C03;

}

#currency2{

	width:100px;

	}

	

	#servedby{

		color:#fff;

		font:"Arial Black", Gadget, sans-serif, Helvetica, sans-serif;

		}

    </style>

   

<title>Cars</title>

<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="css/styles.css" type="text/css" />

<link   rel="stylesheet" href="css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="js/jquery-1.8.2.js" type="text/javascript"></script>

<script src="js/js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script  src="js/datepicker/jqueryui.js" type="text/javascript"></script>

        <!--Validation End-->

     <script>   $(document).ready(function(){



		

			$("#addvehicle").validationEngine();

			

			//character cases

	$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});

$('#vehcode').keyup(function(){

    this.value = this.value.toUpperCase();

});

//end character cases

		});

        </script>

        

      

</head>



<body>

<form id="addvehicle"  name="addvehicle" class="formular" method="post" action="edit_veh_exec.php?inc=<?php echo $car_id?>"><table width="450px" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Add New Vehicle  Details</td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Vehicle Code: <br />

          <input name="vehcode" type="text"  class="validate[required] text-input" id="vehcode" value="<?php echo $vehicle_code?>" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Capacity<br />

        <input name="capacity" type="text"  class="validate[required] text-input" id="capacity" value="<?php echo $capacity?>" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Other details<br />

          <input name="description" type="text"  class="text-input" id="description" value="<?php echo $desc?>" size="30" /></td>

      </tr><tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Drivers<br />

          <select name="driver" id="driver" class="text-input" >

              <option value="<?php echo $driverID?>" selected="selected">-- select one --</option>

              <?php  

  $sql = mysqli_query($conn,"SELECT * FROM tbl_users WHERE role_id=3 and deleted=0")or die(mysqli_error($conn)());

  while($result= mysqli_fetch_array($sql)){

  

	$full_name  = $result['full_name']; 

	$user_id=$result['user_id'];

	

	?>

              <option value="<?php echo $user_id?>">

                <?php echo $full_name?>

              </option>

              <?php } //end loop ?>

            </select></td>

        <td align="left" bgcolor="#FFFFFF">&nbsp;</td>

        <td align="left" bgcolor="#FFFFFF">&nbsp;</td></tr>

      <tr>

        <td height="35" colspan="3" align="left"><input type="submit" name="button" id="button" value="  Save   " /></td>

      </tr>

      <tr id="servedby" class="italix">

        <td height="20" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="2" align="center" bgcolor="#333333">Served By: 

        <?php echo $_SESSION['f_name']?></td>

      </tr>

    </table></form>

</body>



</html>

