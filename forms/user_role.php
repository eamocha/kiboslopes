<?php session_start();
//include connection to the database
include_once("../lib/config.php"); 

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

    </style>

<title>add role</title>

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<link   rel="stylesheet" href="../css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>

<script src="../js/js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="../js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script  src="../js/datepicker/jqueryui.js" type="text/javascript"></script>



        <!--Validation End-->

     <script>   $(document).ready(function(){



		

			$("#MyForm").validationEngine();

			

			//character cases

	$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});

$('#pptdetails').keyup(function(){

    this.value = this.value.toUpperCase();

});

//end character cases

		});

        </script>

        

      

<link href="css/styles.css" rel="stylesheet" type="text/css" />

</head>



<body><form id="MyForm"  name="MyForm" class="formular" method="post"   action="add_role_exec.php">

<table align="center" width="450px" border="0"  cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="2" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">User Roles</td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">User Role:<br />

          <input name="userrole" type="text"  class="validate[required,custom[onlyLetterSp]] text-input" id="userrole" value="" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Description<br />

        <input name="details" type="text"  class=" text-input" id="details" value="" size="30" /></td>

      </tr>

      <tr>

        <td height="35" colspan="2" align="left"><blockquote>

          <p>

            <input type="submit" name="button" id="button" value="  Save   " />

          </p>

        </blockquote></td>

    </tr>

      <tr id="servedby" class="italix">

        <td height="20" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" align="center" bgcolor="#333333">Served By: 

        <?php echo $_SESSION['f_name']?></td>

      </tr>

    </table>

</form>

</body>

</html>

