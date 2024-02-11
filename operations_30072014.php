<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>KIBO SLOPES - Reservation Management System</title>

<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="css/styles.css" type="text/css" />

<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="js/jquery-1.8.2.js" type="text/javascript"></script>

<script  src="js/datepicker/jqueryui.js" type="text/javascript"></script>

<script src="js/js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

 <link  rel="stylesheet" href="../css/colorbox.css" media="screen"/>

<script src="js/jquery.colorbox.js"></script> 

        

     <script>   $(document).ready(function(){



		

			$("#MyForm").validationEngine();

			$(".example5").colorbox();

		

			//populate select box

			$.getJSON('populatedrivers.php', function(data){

    var html = '';

    var len = data.length;

    for (var i = 0; i< len; i++) {

        html += '<option value="' + data[i].category_id + '">' + data[i].name + '</option>';

    }

    $('select.driver').append(html);

});



					$( "#dat").datepicker();//date picker

		

		});</script>

        <script language="javascript" type="text/javascript">

<!--

function popitup(url) {

	newwindow=window.open(url,'name','height=400,width=450');

	if (window.focus) {newwindow.focus()}

	return false;

}



// -->

</script>

        

</head>



<body><?php

session_start();

include('auth.php'); 

include('lib/config.php'); 



//call functions

include('lib/functions.php');



include('roles/operations_role.php')?>



<div id="container">

  <div id="bilaz"></div>

<div id="mid_content">

 <div id="logo"><img src="images/logo.png" width="242" height="70" /></div>

  <div id="menu">

  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?> |<a href="changepass/change-pwd.php?id=<?php echo $id?>">Change Pass</a>| <a href="lib/logout.php">Logout</a></div>

  </div>

</div>

<div id="bilaz"></div>

<div id="mid_content_inner">



  <div id="content_form"> 

  <div id="content_box_title">Operations</div>

  <div id="content_menu">

  <ul id="content_menu_side">  

    <li class="content_bottom_border" > <a href="dashboard.php">dashboard</a></span></li>

     <li><a href="reservations.php">RESERVATIONS </a></li>

      <li><a href="accounts.php">ACCOUNTS</a></li>

    <li >&nbsp;&nbsp;&nbsp;OPERATIONS&nbsp;&nbsp;&nbsp;</li>

    <li><a href="administration.php">ADMINISTRATION</a></li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">

      

 <li><a title="KIBO SLOPES" href="cars_drivers.php">Cars and Drivers</a></li>

<li><a class=''  title="KIBO SLOPES" href="car_hire.php">Car Hire</a></li>

<li><a class=''  title="KIBO SLOPES" href="calender/index.php" target="_blank">Calender</a></li>

<li><a href="imprests.php">Imprests</a></li>



    </ul>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

<?php if(isset($_REQUEST['go'])){

	$dat=clean($_REQUEST['dat']);

	$driv=clean($_REQUEST['driver']);}

    else {

		$dat=date('Y-m-d');}?>

<tr id="search_form" height="45px" ><td colspan="4"><form id="formID" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get"><label>Date</label><input type="text" class="text-input" id="dat" name="dat"  value="<?php echo $dat?>"? /> 

<label>Driver </label><select name="driver" class="driver"><option value="all">All</option></select><input type="submit" id="go" name="go"  value="go"/></form>

<td></td></tr>



<tr class="table_headers">

  <td width="15%">Trip </td>

  <td width="35%">Details</td>

  <td width="10%">Driver</td>

  <td width="10%">Vehicle</td>

  <td width="5%">Visitors</td>

  <td>Remarks</td>

  <td>&nbsp;</td>

</tr>

<?php $dbQuey=mysqli_query($conn,"SELECT e.remarks AS r,e.event_id as eid,c.category_id as d,c.label1 AS veh,c.name as dr,t.group_name AS trp, t.no_of_visitors as vsts, i.details as itn FROM events e

	INNER JOIN categories c ON c.category_id = e.category_id

	INNER JOIN users u ON u.user_id = e.user_id

	INNER JOIN  tbl_itinerary i ON i.itinerary_id=e.itinerary_id

	INNER JOIN tbl_trips t ON 	t.trip_id=i.trip_id 

	WHERE t.deleted=0 AND i.deleted=0 AND e.status >= 0 AND i.date='$dat'")or die(mysqli_error($conn)());

	$n=mysqli_num_rows($dbQuey);

	for($i=0; $i<$n;$i++){

		$rQ=mysqli_fetch_array($dbQuey);

		$t=$rQ['trp'];

		$itn=$rQ['itn'];

		$dr=$rQ['dr'];

		$veh=$rQ['veh'];

		$vsts=$rQ['vsts'];

		$rmks=$rQ['r'];

		$eid=$rQ['eid'];$d=$rQ['d'];

		if($i%2){?>



        <tr class="alt_row1"><td><?php echo $t?></td><td><?php echo $itn?></td><td><?php echo $dr?></td><td><?php echo $veh?></td><td align="center"><?php echo $vsts?></td><td><?php if($rmks=="") echo '-'; else echo $rmks?></td>

		  <td><a  onclick="return popitup('assign_driver.php?trip_name=<?php echo $t?>&eid=<?php echo $eid?>&d=<?php echo $d?>?>')"

	>Edit</a></td>

        </tr>

		<?php

			}

		else{?> <tr class="alt_row2"><td><?php echo $t?></td><td><?php echo $itn?></td><td><?php echo $dr?></td><td><?php echo $veh?></td><td align="center"><?php echo $vsts?></td><td><?php if($rmks=="") echo '-'; else echo $rmks?></td>

		  <td><a  onclick="return popitup('assign_driver.php?trip_name=<?php echo $t?>&eid=<?php echo $eid?>&d=<?php echo $d?>?>')"

	>Edit</a></td>

		</tr>

		<?php

			}

		}

?>

    

</table></div>

    <div id="bilaz"></div>



</div>

  </form>

</div>

</div>

</body>

</html>