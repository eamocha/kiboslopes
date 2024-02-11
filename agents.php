<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];



include('lib/config.php'); 



//call functions

include('lib/functions.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KIBO SLOPES - Reservation Management System</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.2.js"></script>
    <script src="js/js/languages/jquery.validationEngine-en.js" type="text/javascript"></script>
    <script src="js/js/jquery.validationEngine.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
        <!--Validation End-->

        <!--date picker-->

        <link rel="stylesheet" href="js/datepicker/jqueryui.css" type="text/css" />

        <script src="js/datepicker/jqueryui.js" type="text/javascript" ></script>

        <!-- Color Box -->

        <link media="screen" rel="stylesheet" href="css/colorbox.css" />

        <script src="js/jquery.colorbox.js"></script> 

         <!-- Color Box End -->
     <script language="javascript">   
	 $(document).ready(function(){

			$("#MyForm").validationEngine();

 			$(".example5").colorbox();

			$(".resetpass").click(function(){

			  var r = confirm("Reset Password?");
			  	
				if (r == true) {
     					x = "You pressed OK!";
 				}
			
			});

		});
        
  
  function confirmreset(){
   if (confirm("Are you sure you want to reset password?")==true)
		return true; 
	else 
	return false;
 }

  
  </script>
</head>
<body>
<div id="container">
<div id="bilaz"></div>
<div id="mid_content">
 <div id="logo"><img src="images/logo.png" width="242" height="70" /></div>
  <div id="menu">
  <div style="margin-top:40px; text-align:right; padding-right:10px; color:#FFF;">Welcome, <?php echo $fullName?> | <a href="login.php">Logout</a></div>
  </div>
</div>
<div id="bilaz"></div>
<div id="mid_content_inner">
  <div id="content_form"> 
  <div id="content_box_title">Trip Management</div>
  <div id="content_menu">
  <ul id="content_menu_side">  
    <li class="content_bottom_border" > <a href="dashboard.php">dashboard</a></span></li>

     <li><a href="reservations.php">RESERVATIONS</a> </li>

      <li><a href="accounts.php">ACCOUNTS </a></li>

    <li ><a href="operations.php">OPERATIONS </a></li>

    <li>&nbsp;&nbsp;&nbsp;&nbsp;ADMINISTRATION&nbsp;&nbsp;&nbsp;&nbsp;</li>

  </ul>

  </div><div id="content_box_stepper"></div>

    <div id="bilaz"></div>

  <div id="content_box_rule"></div>

  <div id="left_nav">

  <span class="header"> <strong>Your Tools</strong></span>

    <ul id="left_nav_menu">

      

      <li><a title="KIBO SLOPES" href="users.php">Users and Roles</a></li>

      <li><a class=''  title="KIBO SLOPES" href="vehicles.php">Vehicles/Drivers</a></li>

<li><a class=''  title="KIBO SLOPES" href="hotel.php">Hotels</a></li>

<li><a class=''  title="KIBO SLOPES" href="deleted_users.php">Deleted Users</a></li>
<li style="background:#F0F0F0;"><a class=''  title="KIBO SLOPES" href="agents.php">Agents</a></li>
    </ul>

</div>

<div id="center_pane_big"><table width="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td width="341" height="62" align="left" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"><ul id="menu_settings">

          <li>

            <div id="menu_icon"><img src="images/settings.png" alt="" width="24" height="24" border="0" /></div>

            <div id="menu_text"><a href="#"> Agents </a></div>

            <ul>
              <li>

                <div id="sub_menu_icon"><img src="images/add_icon_settings.png" alt=""  border="0" /></div>

                <ul>

                  <li><a class='example5' href="forms/agent_form.php" title="AGENT" style="padding-left:25px;">add agent</a></li>

                  </ul>

                </li>

          </ul></td>

        <td width="379" height="62" align="right" valign="middle" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9"> <div id="dtsearch">

<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><input name="q" class="inputDate" id="qinput" value="<?php if(isset($_REQUEST['q'])){ echo $_REQUEST['q']; } ?>" />

    <input type="submit" name="button" id="button" value="   Go   " />

  </form></div>

  <div id="beat"></div></td>

        <td align="right" valign="top" bgcolor="#F4F4F4" style="border-bottom:1px solid #D9D9D9">&nbsp;</td>

        

      </tr>

      <tr>

        <td height="30" colspan="3" align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">

          <tr class="black_text">

          

            <td width="14%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid" ><strong>Name</strong></td>

            <td width="17%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Phone</strong></td>

            <td width="13%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Email</strong></td>

            <td width="24%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid"><strong>Country</strong></td>

            <td width="22%" bgcolor="#F0F0F0" style="border-bottom:3px #C0C0C0 solid">&nbsp;</td>

            </tr>

  <?php  


$sql_agents = "SELECT   * FROM tbl_agents";

if(isset($_REQUEST['q']))
{
	
	if($_REQUEST['q']!="")
	{
		$sql_agents.=" WHERE agent_name='".clean($_REQUEST['q'])."'";	
	}
	
}


$sql_agents.=" ORDER BY agent_name";

$sql = mysqli_query($conn,$sql_agents) or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);



 if($numofrows == 0){?>

		         <tr>

            <td height="47" colspan="6" align="center" valign="middle" bgcolor="#fff" class="italix">No agents in this system !</td>

            </tr>

	<?php	}

for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($sql); //get a row from our result set

	$agent_id  = $result['agent_id'];

	$agent_name  = $result['agent_name'];

	$telephone  = $result['telephone'];

	$email  = $result['email'];

	$country  = $result['country'];

	$isactive  = $result['isactive'];

	
		?>
   <tr>
    <td  style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $agent_name;?></td>
    <td  style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $telephone;?></td>
    <td  style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $email;?></td>
    <td style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><?php echo $country;?></td>
    <td nowrap="nowrap" style="border-bottom:#EAEAEA 1px solid; border-right:#EAEAEA 1px solid"><a class="example5" href="forms/agent_form.php?agent_id=<?php echo $agent_id?>">Edit </a></td>
  </tr>
          <?php

     

}?><tr>
	<td height="24" colspan="6" bgcolor="#333333" class="white_text"><span style="color:#FFF">Served by <?php echo $fullName?></span></td>
</tr>

  </table></td>

      </tr>

    </table></div>

    <div id="bilaz"></div>



</div>

  </form>

</div>

</div>

</body>

</html>