<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];





$tripID = $_REQUEST['inc'];



/*
$inc = $_REQUEST['inc'];
$hot = $_REQUEST['hot'];
$f_name = $_REQUEST['f_name'];
*/

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$htmllink = str_ireplace("print_hotel_html.php","print_hotel.php",$actual_link);

 ?>
<script type="text/javascript">

function iprint(ptarget)

{

ptarget.focus();

ptarget.print();

}
</script> 
<table width="1000px" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr><td height="600px" width="1000px" valign="top">

<iframe name="theiframe" id="theiframe" width="100%" height="100%" src="<?php echo $htmllink?>"></iframe>

<input type="button" value="Print Voucher" onClick="iprint(theiframe);" /></td></tr></table>




