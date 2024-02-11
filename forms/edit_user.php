<?php

session_start();

include('../lib/config.php');

include('../lib/functions.php');

$user=$_REQUEST['user'];

$sql = mysqli_query($conn,"SELECT   * FROM tbl_users where user_id=$user and deleted=0")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);

    $result = mysqli_fetch_array($sql); //get a row from our result set

	$fname  = $result['full_name'];

	$role  = $result['role_id'];

	$mobile  = $result['mobile'];

	$email  = $result['email'];

	$gender  = $result['gender'];

	$user_id  = $result['user_id'];

	?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>add users</title>

<link href='http://fonts.googleapis.com/css?family=Ledger&subset=latin,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

<style type="text/css">

#servedby {		color:#fff;

		font:"Arial Black", Gadget, sans-serif, Helvetica, sans-serif;

}

fieldset

{

	width:451px;

	margin:auto;



	}

	#leg{

		font-family:'Ledger' , Arial, Helvetica, sans-serif;

		font-size:20px;



		}

</style>

<link rel="stylesheet" href="../css/validationEngine.jquery.css" href="../../css/validationEngine.jquery.css" type="text/css" />

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





			$("#users").validationEngine();



			//character cases

	$('#fname').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});

/*('#pptdetails').keyup(function(){

    this.value = this.value.toUpperCase();

});*/

//end character cases

		});

        </script>





<link href="admin/css/styles.css" rel="stylesheet" type="text/css" />





</head>



<body>





<form id="users"  name="users" class="formular" method="post"  action="edit_user_exec.php?user=<?php echo $user_id?>">

  <table width="450" border="0" align="right" cellpadding="8" cellspacing="0">

    <tr>

      <td height="24" colspan="4" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

"> User Registration</td>

    </tr>

    <tr>

      <td align="left" valign="top" bgcolor="#FFFFFF">Full Name<br />

      <input  type="text"  class="validate[required] text-input" id="fname" name="fname" value="<?php echo $fname?>" size="30" /></td>

      <td align="left" valign="top" bgcolor="#FFFFFF">Email<br />

        <input type="text"  class="validate[required,custom[email]]  text-input"  id="email" name="email" value="<?php echo $email?>" size="30" /></td>



      <td align="left" valign="top" bgcolor="#FFFFFF">Confirm Email<br />

        <input type="text"  class="validate[required,equals[email]] text-input" data-prompt-position="topRight:-100" id="c_email" name="c_name" value="<?php echo $email?>" size="30" /></td>

    </tr>

      <tr>

      <td align="left" valign="top" bgcolor="#FFFFFF">Telephone<br />

        <input type="text"  class="validate[optional, custom[phone]] text-input"  id="tel" name="tel" value="<?php echo $mobile?>" size="30" />        <br /></td>

      <td align="left" valign="top" bgcolor="#FFFFFF"><label for="userrole">User Role</label>

        <br />

        <select id="userrole" class="validate[required] text-input" name="userrole">

          <option value="" selected="selected">-- select one --</option>

          <?php  $sql = mysqli_query($conn,"SELECT * FROM tb_roles")or die(mysqli_error($conn)());

   while( $result= mysqli_fetch_array($sql))

   { 

	$role_name  = $result['role_name']; 

			$role_id  = $result['role_id']; 


		  if($role==$role_id){
			  echo "<option value=".$role_id." selected=\"selected\">".$role_name ."</option>";
		  }
		  else{
          	echo "<option value=".$role_id.">".$role_name ."</option>";
		  }

           } //end loop 

		   ?>

        </select></td>



      <td align="left" valign="top" bgcolor="#FFFFFF">Gender<br />

        <label>

        <input name="Gender" type="radio" class="validate[required]  radio" id="Gender_0" value="male"   <?php if($gender=="male") echo "checked='checked'";?> />

Male</label>

        <label>

        <input class="validate[required]  radio" type="radio" name="Gender" value="female" id="Gender_1"   <?php if($gender=="female") echo "checked='checked'";?> />

Female</label></td>

    </tr>



    <tr>

      <td height="35" colspan="4" align="left"><input type="hidden" name="initial_full_name" id="initial_full_name" value="<?php echo $fname?>" />        <input style="display:block" type="submit" name="button" id="button" value=" Register  " /></td>

    </tr>

    <tr id="servedby"class="italix">

      <td height="20" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

      <td height="20" colspan="3" align="center" bgcolor="#333333">Registered By:

        <?php echo $_SESSION['f_name']?></td>

    </tr>

  </table>



</form>



</body>

</html>

