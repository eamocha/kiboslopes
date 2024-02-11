<?php

session_start();

include("auth.php");

include('lib/config.php'); 

//call functions

include('lib/functions.php');

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];







$tripID = $_GET['inc']; 

$trip_hotel=$_REQUEST['hot'];

 ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title></title>

<link href="css/styles.css" rel="stylesheet" type="text/css" />

 <!-- Validation Engine-->

 	<script src="js/jquery.min.js"></script>



    <script src="js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>

		<script src="js/validation/jquery.validationEngine.js" type="text/javascript"></script>

         <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />

		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

        <!--Validation End-->

        <!-- Color Box -->

        <link media="screen" rel="stylesheet" href="css/colorbox.css" />

        <script src="js/jquery.colorbox.js"></script> 

         <!-- Color Box End -->



        

     <script>   $(document).ready(function(){

			$("#MyForm").validationEngine();

				$('.example5').colorbox({ 

    onComplete : function() { 

       $(this).colorbox.resize(); 

    }    

});

$.colorbox.resize();



			

		});</script>

        <style>

       

			#logo{

			display:block;

			width:300px;

			float:right;

			}

        #logo >#print{

			height:20px;

			float:right;

			margin-top:0;

			margin-right:80px;

			width:40px;

			}

        </style>

        







<script>

function iprint(ptarget)

{

ptarget.focus();

ptarget.print();

}

</script> 





</head>



<body>

<table width="850px" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr><td height="1000px" width="1000px" valign="top">

<iframe name="theiframe" id="theiframe" width="100%" height="100%" src="print_hotel.php?inc=<?php echo $tripID?>&hot=<?php echo $trip_hotel?>&f_name=<?php echo $fullName?>"></iframe>

<input type="button" value="Print Report" onclick="iprint(theiframe);" /></td></tr></table>

</body> 

</body>

</html>